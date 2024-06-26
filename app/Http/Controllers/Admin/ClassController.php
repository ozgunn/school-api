<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\ClassRequest;
use App\Http\Resources\ClassResource;
use App\Models\SchoolClass;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ClassController extends BaseController
{
    /**
     * List items
     */
    public function index(Request $request)
    {
        $items = $this->findClasses();
        $data = [
            'classes' => ClassResource::collection($items),
        ];

        return $this->sendResponse($data);
    }

    /**
     * Display item
     */
    public function show(int $id)
    {
        $item = $this->findClass($id);

        $data = new ClassResource($item);

        return $this->sendResponse($data);
    }

    /**
     * Create item
     */
    public function store(ClassRequest $request)
    {
        $user = auth()->user();

        $validated = $request->validated();
        // School control
        $schools = $user->getSchoolIds();
        if (!in_array($validated['school_id'], $schools)) {
            return $this->sendError(__('Not allowed'), __('You are unauthorized'), 403);
        }

        $item = SchoolClass::create($validated);

        if ($item) {
            Log::channel('db')->info('Class created', ['id' => $item->id]);
            return $this->sendResponse(new ClassResource($item), __('Created successfully'));
        } else {
            Log::channel('db')->error('Class create failed');
            return $this->sendError(__("Create Failed"), __('Create Failed'));
        }
    }

    /**
     * Update item.
     */
    public function update(ClassRequest $request, int $id)
    {
        $user = auth()->user();
        $validated = $request->validated();

        $item = SchoolClass::where(['id' => $id, 'school_id' => $validated['school_id']])->firstOrFail();
        // School control
        $schools = $user->getSchoolIds();
        if (!in_array($item->school_id, $schools)) {
            return $this->sendError(__('Not allowed'), __('You are unauthorized'), 403);
        }

        $item->update($validated);
        Log::channel('db')->info('Class updated', ['id' => $item->id]);

        return $this->sendResponse(new ClassResource($item), __('Updated successfully.'));
    }

    /**
     * Remove item
     */
    public function destroy(int $id)
    {
        $user = auth()->user();

        $item= $this->findClass($id);

        $studentCount = $item->students()->count();

        if ($user->role < User::ROLE_SUPERADMIN && $studentCount) {
            return $this->sendError(__('Delete failed'), __("Class has students ({$studentCount})"));
        }

        try {
            $item->delete();
            Log::channel('db')->info('Class deleted', ['id' => $item->id]);

            return $this->sendResponse(__('Deleted'), __('Deleted successfully'));
        } catch (\Exception $e) {
            return $this->sendError(__('Delete failed'), $e->getMessage());
        }
    }

    private function findClasses()
    {
        $user = auth()->user();
        if ($user->role === User::ROLE_SUPERADMIN) {
            $items = SchoolClass::all();
        } else {
            $items = SchoolClass::whereIn('school_id', $user->getSchoolIds())->get();
        }

        return $items;
    }

    private function findClass(int $id)
    {
        $user = auth()->user();
        if ($user->role === User::ROLE_SUPERADMIN) {
            $group = SchoolClass::where('id', $id)->firstOrFail();
        } else {
            $group = SchoolClass::where('id', $id)->whereIn('school_id', $user->getSchoolIds())->firstOrFail();
        }

        return $group;
    }
}
