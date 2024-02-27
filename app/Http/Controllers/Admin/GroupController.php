<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\GroupRequest;
use App\Http\Resources\GroupResource;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GroupController extends BaseController
{
    /**
     * List groups
     */
    public function index(Request $request)
    {
        $groups = $this->findGroups();
        $data = [
            'groups' => GroupResource::collection($groups),
        ];

        return $this->sendResponse($data);
    }

    /**
     * Display group
     */
    public function show(int $id)
    {
        $group = $this->findGroup($id);

        $data = new GroupResource($group);

        return $this->sendResponse($data);
    }

    /**
     * Create group
     */
    public function store(GroupRequest $request)
    {
        $user = auth()->user();

        $validated = $request->validated();
        // School control
        $schools = $user->getSchoolIds();
        if (!in_array($validated['school_id'], $schools)) {
            return $this->sendError(__('Not allowed'), __('You are unauthorized'), 403);
        }

        $group = Group::create($validated);

        if ($group) {
            Log::channel('db')->info('Group created', ['id' => $group->id]);

            return $this->sendResponse(new GroupResource($group), __('Created successfully'));
        } else {
            return $this->sendError(__("Create Failed"), __('Create Failed'));
        }
    }

    /**
     * Update group.
     */
    public function update(GroupRequest $request, int $id)
    {
        $user = auth()->user();
        $validated = $request->validated();

        $group = Group::where(['id' => $id, 'school_id' => $validated['school_id']])->firstOrFail();
        // School control
        $schools = $user->getSchoolIds();
        if (!in_array($group->school_id, $schools)) {
            return $this->sendError(__('Not allowed'), __('You are unauthorized'), 403);
        }

        $group->update($validated);
        Log::channel('db')->info('Group updated', ['id' => $group->id]);

        return $this->sendResponse(new GroupResource($group), __('Updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $user = auth()->user();

        $group = $this->findGroup($id);

        $classCount = $group->classes()->count();

        if ($user->role < User::ROLE_SUPERADMIN && $classCount) {
            return $this->sendError(__('Delete failed'), __("Group has classes ({$classCount})"));
        }

        try {
            $group->delete();
            Log::channel('db')->info('Group deleted', ['id' => $group->id]);

            return $this->sendResponse(__('Deleted'), __('Deleted successfully'));
        } catch (\Exception $e) {
            return $this->sendError(__('Delete failed'), $e->getMessage());
        }
    }

    private function findGroups()
    {
        $user = auth()->user();
        if ($user->role === User::ROLE_SUPERADMIN) {
            $groups = Group::all();
        } else {
            $groups = Group::whereIn('school_id', $user->getSchoolIds())->get();
        }

        return $groups;
    }

    private function findGroup(int $id)
    {
        $user = auth()->user();
        if ($user->role === User::ROLE_SUPERADMIN) {
            $group = Group::where('id', $id)->firstOrFail();
        } else {
            $group = Group::where('id', $id)->whereIn('school_id', $user->getSchoolIds())->firstOrFail();
        }

        return $group;
    }

}
