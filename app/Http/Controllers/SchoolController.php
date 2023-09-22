<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolRequest;
use App\Http\Resources\SchoolResource;
use App\Models\School;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SchoolController extends BaseController
{
    /**
     * List user's schools
     */
    public function index(Request $request)
    {
        $schools = $this->findUserSchools();

        $data = [
            'schools' => SchoolResource::collection($schools),
        ];

        return $this->sendResponse($data);
    }

    /**
     * Display user's school
     */
    public function show(int $id)
    {
        $school = $this->findUserSchool($id);

        $data = [
            'schools' => new SchoolResource($school),
        ];

        return $this->sendResponse($data);
    }

    /**
     * Create school
     */
    public function store(SchoolRequest $request)
    {
        $user = auth()->user();
        if ($user->role < User::ROLE_ADMIN) {
            return $this->sendError(__('Not allowed'), __('You dont authorized'), 403);
        }
        $validated = $request->validated();

        // Parent_id (company) control
        $request->validate(['parent_id' => 'required']);
        $parentId = $request->get('parent_id');
        $userCompanies = $user->schools()->get()->pluck('id')->toArray();
        if (!in_array($parentId, $userCompanies)) {
            return $this->sendError(__('Not allowed'), __('You dont authorized'), 403);
        }

        $validated['parent_id'] = $request->get('parent_id');

        $school = School::create($validated);

        if ($school) {
            $school->admins()->attach($user, [
                'role' => User::ROLE_ADMIN,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            return $this->sendResponse(new SchoolResource($school), __('School created successfully'));
        } else {
            return $this->sendError(__("Create Failed"), __('Create Failed'));
        }
    }

    /**
     * Update user.
     */
    public function update(SchoolRequest $request, int $id)
    {
        $school = $this->findUserSchool($id);

        $validated = $request->validated();

        $school->update($validated);

        return $this->sendResponse(new SchoolResource($school), __('School updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $school = $this->findUserSchool($id);

        try {
            $school->delete();

            return $this->sendResponse(__('Deleted'), __('School deleted successfully.'));
        } catch (\Exception $e) {
            return $this->sendError(__('Delete failed'), $e->getMessage());
        }
    }

    /**
     * Add user to school
     */
    public function userAdd(int $id, Request $request)
    {
        $user = auth()->user();
        if ($user->role < User::ROLE_MANAGER) {
            return $this->sendError(__('Not allowed'), __('You dont authorized'), 403);
        }

        // validate role
        $validated = $request->validate([
            'role' => 'required|integer',
            'user_id' => 'required|integer'
        ]);

        $userRole = $validated['role'];

        if (!in_array($userRole, array_keys(User::ROLES)) || $userRole >= $user->role) {
            return $this->sendError(__('Not allowed'), __('You dont authorized'), 403);
        }
        $userToAdd = User::where(['id' => $validated['user_id']])->firstOrFail();
        $school = $this->findUserSchool($id);

        if (in_array($userToAdd->id, $school->users()->wherePivot('role', $userRole)->get()->pluck('id')->toArray())) {
            return $this->sendError(__('Already Exists'), __('User already exists in this position.'));
        }

        $school->users()->attach($userToAdd, [
            'role' => $userRole,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return $this->sendResponse(__('User added'), __('User added to school.'));

    }

    private function findUserSchools()
    {
        $user = auth()->user();
        if ($user->role === User::ROLE_SUPERADMIN) {
            $schools = School::whereNotNull('parent_id')->get()->sortBy('id');

        } else {
            $schools = $user->schools()->whereNotNull('parent_id')->get()->sortBy('id');
        }

        return $schools;
    }

    private function findUserSchool(int $id)
    {
        $user = auth()->user();
        if ($user->role === User::ROLE_SUPERADMIN) {
            $school = School::where(['parent_id' => null, 'id' => $id])->firstOrFail();
        } else {
            $school = $user->schools()->whereNotNull('parent_id')->where(['school_id' => $id])->firstOrFail();
        }

        return $school;
    }
}
