<?php

namespace App\Http\Controllers;

use App\Http\Components\Paginator;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserDataRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserController extends BaseController
{
    /**
     * List users
     */
    public function index(Request $request)
    {
        $allowedSort = ['id', 'name', 'email', 'created_at'];
        $users = User::query();
        $users = Paginator::sort($request, $users, $allowedSort)->paginate(1);

        $data = [
            'users' => UserResource::collection($users),
            'pagination' => Paginator::paginate($users)
        ];
        return $this->sendResponse($data);
    }

    /**
     * Create user
     */
    public function store(UserRequest $request, UserDataRequest $userDataRequest)
    {
        $validated = $request->validated();
        $userData = $userDataRequest->validated();
        $validated['password'] = $request->filled('password')
            ? bcrypt($validated['password'])
            : bcrypt(Str::random(32));

        $user = auth()->user();
        if ($validated['role'] >= $user->role) {
            return $this->sendError(__('Not allowed'), __('You dont authorized'), 403);
        }

        try {
            $result = DB::transaction(function () use ($validated, $userData) {
                $user = User::create($validated);
                $user->userData()->create($userData);

                return new UserResource($user);
            });

            return $this->sendResponse($result, 'User created successfully');
        } catch (\Exception $exception) {
            return $this->sendError(__('Create failed'), 'User create failed.');
        }
    }

    /**
     * Display user
     */
    public function show(int $id)
    {
        $user = User::findOrFail($id);
        $data = [
            'users' => new UserResource($user),
        ];

        return $this->sendResponse($data);
    }

    /**
     * Update user.
     */
    public function update(UserRequest $request, UserDataRequest $userDataRequest, int $id)
    {
        /** @var User $user */
        $user = User::findOrFail($id);

        $validated = $request->validated();
        $userData = $userDataRequest->validated();

        $user = auth()->user();

        if ($validated['role'] >= $user->role) {
            return $this->sendError(__('Not allowed'), __('You dont authorized'), 403);
        }

        $validated['password'] = $request->filled('password') ? bcrypt($validated['password']) : null;
        $validated['status'] = $request->filled('status') ? $validated['status'] : null;

        try {
            $result = DB::transaction(function () use ($user, $validated, $userData) {
                $user->update($validated);
                $user->userData()->update($userData);

                return new UserResource($user);
            });

            return $this->sendResponse($result, 'User updated successfully');
        } catch (\Exception $exception) {
            return $this->sendError(__('Update failed'), 'User update failed.' . $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $user = User::findOrFail($id);

        try {
            $user->delete();

            return $this->sendResponse(__('Deleted'), __('User deleted successfully.'));
        } catch (\Exception $e) {
            return $this->sendError(__('Delete failed'), $e->getMessage());
        }
    }
}
