<?php

namespace App\Http\Controllers;

use App\Http\Components\Paginator;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

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
    public function store(UserRequest $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone_country_code = $request->input('phone_country_code');
        $user->phone_number = $request->input('phone_number');
        $user->language = $request->input('language');
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->status = $request->input('status');
        $user->role = $request->input('role');

        if ($user->save()) {
            return $this->sendResponse(new UserResource($user), 'User created successfully.');
        }

        return $this->sendError(__('Create failed'), 'User create failed.');

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
    public function update(UserRequest $request, int $id)
    {
        /** @var User $user */
        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone_country_code = $request->input('phone_country_code');
        $user->phone_number = $request->input('phone_number');
        $user->language = $request->input('language');
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        if ($request->filled('status')) {
            $user->status = $request->input('status');
        }

        if ($user->save()) {
            return $this->sendResponse(new UserResource($user), __('User updated successfully.'));
        }

        return $this->sendError(__('Update failed'), __('User update failed.'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $user = User::findOrFail($id);

        try  {
            $user->delete();

            return $this->sendResponse(__('Deleted'), __('User deleted successfully.'));
        } catch (\Exception $e) {
            return $this->sendError(__('Delete failed'), $e->getMessage());
        }
    }
}
