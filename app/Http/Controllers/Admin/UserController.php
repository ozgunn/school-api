<?php

namespace App\Http\Controllers\Admin;

use App\Http\Components\Paginator;
use App\Http\Controllers\BaseController;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserDataRequest;
use App\Http\Resources\ParentResource;
use App\Http\Resources\UserResource;
use App\Models\School;
use App\Models\User;
use App\Models\UserData;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UserController extends BaseController
{
    /**
     * List users
     */
    public function index(Request $request)
    {
        $user = $this->getUser();
        $schools = $user->getSchoolIds();

        $filters = $request->validate([
            'school_id' => [
                'integer',
                Rule::in($schools),
            ],
            'role' => [
                'integer',
                Rule::in(array_keys(User::ROLES)),
            ],
            'minimal' => 'nullable|integer',
        ]);

        if ($user->role === User::ROLE_SUPERADMIN) {
            $users = User::query();
        } else {
            $users = User::whereHas('allSchools', function ($query) use ($schools, $filters) {
                if (isset($filters['school_id'])) {
                    $query->where('school_id', $filters['school_id']);
                } else {
                    $query->whereIn('school_id', $schools);
                }
            });
        }

        if (isset($filters['role'])) {
            $users->where('role', $filters['role']);
        }

        $users = Paginator::sort($request, $users, ['id', 'name'], 'asc');

        $data = [
            'users' => $filters['role'] == User::ROLE_PARENT ? ParentResource::collection($users->get()) : UserResource::collection($users->get()),
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

        $validated['name'] = $userData ? $userData['first_name'] . ' ' . $userData['last_name'] : $validated['name'] ?? null;

        $user = $this->getUser();
        if ($user->role < User::ROLE_ADMIN && $validated['role'] >= $user->role) {
            return $this->sendError(__('Not allowed'), __('You are unauthorized'), 403);
        }

        $schools = $user->getSchoolIds();

        if (isset($validated['school_ids']) && array_diff($validated['school_ids'], $schools)) {
            return $this->sendError(__('Not allowed'), __('Invalid school'), 403);
        }

        if (isset($validated['school_id'])) {
            $validated['school_ids'][] = $validated['school_id'];
        }

        try {
            $result = DB::transaction(function () use ($validated, $userData) {
                $user = User::create($validated);
                if (!empty($userData)) $user->userData()->create($userData);
                foreach ($validated['school_ids'] as $school_id) {
                    $school = School::findOrFail($school_id); // TODO: kontrol et

                    $school->users()->attach($user, [
                        'role' => $user->role,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
                }

                Log::channel('db')->info('User created', ['id' => $user->id]);
                return new UserResource($user);
            });

            return $this->sendResponse($result, 'User created successfully');
        } catch (\Exception $exception) {
            Log::channel('db')->error('User create failed', ['error' => $exception->getMessage()]);
            return $this->sendError(__('Create failed'), 'User create failed.'. $exception->getMessage());
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
    public function update(UserRequest $request, int $id, UserDataRequest $userDataRequest)
    {
        /** @var User $user */
        $user = User::findOrFail($id);

        $validated = $request->validated();
        $userData = null;

        if ($user->role == User::ROLE_PARENT) {
            $userData = $userDataRequest->validated();
        }

        $authuser = auth()->user();

        if ($authuser->role < User::ROLE_ADMIN && $user->role >= $authuser->role) {
            return $this->sendError(__('Not allowed'), __('You are unauthorized'), 403);
        }

        // user school kontrolü && school update
        // TODO: Bir user birden çok okulda kullanıcı ise ne olacak?
        //  A kurumumun müdürü olarak B kurumunda da kayıtlı olan bir userı güncelleyebilmeli miyim?
        //  multi user sistemini kaldırmalı mıyım?

        if ($request->filled('password')) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        $validated['name'] = $userData ? $userData['first_name'] . ' ' . $userData['last_name'] :
            ($validated['name'] ?? null) ;

        if (!$validated['name']) {
            return $this->sendError(__('Validation error'), __('Enter a name'), 422);
        }

        try {
            $result = DB::transaction(function () use ($user, $validated, $userData) {
                $user->update($validated);
                if ($userData) $user->userData()->update($userData);
                Log::channel('db')->info('User updated', ['id' => $user->id]);

                return new UserResource($user);
            });

            return $this->sendResponse($result, 'User updated successfully');
        } catch (\Exception $exception) {
            Log::channel('db')->error('User update failed', ['error' => $exception->getMessage()]);
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
            Log::channel('db')->info('User deleted', ['id' => $user->id]);

            return $this->sendResponse(__('Deleted'), __('User deleted successfully.'));
        } catch (\Exception $e) {
            Log::channel('db')->error('User delete failed', ['error' => $e->getMessage()]);

            return $this->sendError(__('Delete failed'), $e->getMessage());
        }
    }
}
