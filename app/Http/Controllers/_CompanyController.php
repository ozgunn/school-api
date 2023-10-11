<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolRequest;
use App\Http\Resources\SchoolResource;
use App\Models\School;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CompanyController extends BaseController
{
    /**
     * List companies
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
     * Display company
     */
    public function show(int $id)
    {
        $school = $this->findUserSchool($id);

        $data = [
            'schools' => $school,
        ];

        return $this->sendResponse($data);
    }

    /**
     * Create company
     */
    public function store(SchoolRequest $request)
    {
        $user = auth()->user();
        if ($user->role !== User::ROLE_SUPERADMIN) {
            return $this->sendError(__('Not allowed'), __('You are unauthorized'), 403);
        }

        $validated = $request->validated();
        $validated['parent_id'] = null;

        $school = School::create($validated);

        if ($school) {
            $school->admins()->attach($user, [
                'role' => User::ROLE_ADMIN,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            return $this->sendResponse(new SchoolResource($school), __('Company created successfully'));
        } else {
            return $this->sendError(__("Create Failed"), __('Create Failed'));
        }
    }

    /**
     * Update company.
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

            return $this->sendResponse(__('Deleted'), __('Company deleted successfully.'));
        } catch (\Exception $e) {
            return $this->sendError(__('Delete failed'), $e->getMessage());
        }
    }

    public function userAdd(int $id, Request $request)
    {
        $user = auth()->user();
        if ($user->role !== User::ROLE_SUPERADMIN) {
            return $this->sendError(__('Not allowed'), __('You are unauthorized'), 403);
        }

        $userToAdd = User::where(['id' => $request->get('user_id'), 'role' => User::ROLE_ADMIN])->firstOrFail();
        $school = $this->findUserSchool($id);

        if (in_array($userToAdd->id, $school->admins()->get()->pluck('id')->toArray())) {
            return $this->sendError(__('Already Exists'), __('User already exists as company admin.'));
        }

        $school->admins()->attach($userToAdd, [
            'role' => User::ROLE_ADMIN,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return $this->sendResponse(__('User added'), __('User added to company as admin.'));

    }

    private function findUserSchools()
    {
        $user = auth()->user();
        if ($user->role === User::ROLE_SUPERADMIN) {
            $schools = School::where(['parent_id' => null])->get();

        } else {
            $schools = $user->schools()->where(['parent_id' => null])->get();
        }

        return $schools;
    }

    private function findUserSchool(int $id)
    {
        $user = auth()->user();
        if ($user->role === User::ROLE_SUPERADMIN) {
            $school = School::where(['parent_id' => null, 'id' => $id])->firstOrFail();
        } else {
            $school = $user->schools()->where(['parent_id' => null, 'schools.id' => $id])->firstOrFail();
        }

        return $school;
    }
}
