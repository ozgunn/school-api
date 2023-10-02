<?php

namespace App\Http\Controllers\Admin;

use App\Http\Components\Paginator;
use App\Http\Controllers\BaseController;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserDataRequest;
use App\Http\Resources\UserResource;
use App\Models\School;
use App\Models\User;
use App\Models\UserData;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $schools = $user->schools()->get()->pluck('id')->toArray();

        $filters = $request->validate([
            'school_id' => [
                'integer',
                Rule::in($schools),
            ],
            'role' => [
                'integer',
                Rule::in(array_keys(User::ROLES)),
            ],
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
            })->with('schools');
        }

        if (isset($filters['role'])) {
            $users->where('role', $filters['role']);
        }
dd($users->get());
        $allowedSort = ['id', 'name', 'email', 'created_at'];
        $users = Paginator::sort($request, $users, $allowedSort)->paginate(config('app.defaults.pageSize'));

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

        $user = $this->getUser();
        if ($validated['role'] >= $user->role) {
            return $this->sendError(__('Not allowed'), __('You are unauthorized'), 403);
        }

        $schools = $user->schools()->get()->pluck('id')->toArray();

        $validated = array_merge($validated, $request->validate([
            'school_id' => [
                'integer',
                Rule::in($schools),
            ],
        ]));

        try {
            $result = DB::transaction(function () use ($validated, $userData) {
                $user = User::create($validated);
                $user->userData()->create($userData);
                if ($school_id = $validated['school_id']) {
                    $school = School::find($school_id)->firstOrFail();

                    $school->users()->attach($user, [
                        'role' => $user->role,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
                }

                return new UserResource($user);
            });

            return $this->sendResponse($result, 'User created successfully');
        } catch (\Exception $exception) {
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
    public function update(UserRequest $request, UserDataRequest $userDataRequest, int $id)
    {
        /** @var User $user */
        $user = User::findOrFail($id);

        $validated = $request->validated();
        $userData = $userDataRequest->validated();

        $authuser = auth()->user();

        if ($validated['role'] >= $authuser->role) {
            return $this->sendError(__('Not allowed'), __('You are unauthorized'), 403);
        }

        // user school kontrolü
        // TODO: Bir user birden çok okulda kullanıcı ise ne olacak?
        //  A kurumumun müdürü olarak B kurumunda da kayıtlı olan bir userı güncelleyebilmeli miyim?
        //  multi user sistemini kaldırmalı mıyım?

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