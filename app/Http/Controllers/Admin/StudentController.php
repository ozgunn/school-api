<?php

namespace App\Http\Controllers\Admin;

use App\Http\Components\Paginator;
use App\Http\Controllers\BaseController;
use App\Http\Requests\SchoolRequest;
use App\Http\Requests\StudentRequest;
use App\Http\Resources\SchoolResource;
use App\Http\Resources\StudentResource;
use App\Models\School;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentController extends BaseController
{
    /**
     * List user's schools
     */
    public function index(Request $request)
    {
        $query = $this->findUserStudents();

        $data = [
            'students' => StudentResource::collection($query),
        ];

        return $this->sendResponse($data);
    }

    /**
     * Display user's school
     */
    public function show(int $id)
    {
        $school = $this->findUserSchool($id);

        $data = new SchoolResource($school);

        return $this->sendResponse($data);
    }

    /**
     * Create school
     */
    public function store(StudentRequest $request)
    {
        $user = auth()->user();

        $validated = $request->validated();

        $student = Student::create($validated);

        if ($student) {
            return $this->sendResponse(new StudentResource($student), __('Student created successfully'));
        } else {
            return $this->sendError(__("Create Failed"), __('Create Failed'));
        }
    }

    /**
     * Update user.
     */
    public function update(SchoolRequest $request, int $id)
    {
        $user = auth()->user();
        if ($user->role < User::ROLE_ADMIN) {
            return $this->sendError(__('Not allowed'), __('You are unauthorized'), 403);
        }

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
        $user = auth()->user();
        if ($user->role < User::ROLE_ADMIN) {
            return $this->sendError(__('Not allowed'), __('You are unauthorized'), 403);
        }

        $school = $this->findUserSchool($id);
        $userCount = $school->users()->count();
        $studentCount = $school->students()->count();

        if ($user->role < User::ROLE_SUPERADMIN && ( $userCount || $studentCount )) {
            return $this->sendError(__('Delete failed'), __("School has users ({$userCount}) or students ({$studentCount})"));
        }

        try {
            $school->delete();

            return $this->sendResponse(__('Deleted'), __('School deleted successfully.'));
        } catch (\Exception $e) {
            return $this->sendError(__('Delete failed'), $e->getMessage());
        }
    }

    private function findUserStudents()
    {
        $user = auth()->user();
        $schools = $user->getSchools()->pluck('id')->toArray();

        if ($user->role === User::ROLE_SUPERADMIN) {
            $students = Student::with(['school', 'class', 'parent', 'class.teacher', 'morningBus', 'eveningBus'])->all();
        } else {
            $students = Student::with(['school', 'class', 'parent', 'class.teacher', 'morningBus', 'eveningBus'])->whereIn('school_id', $schools)->get();
        }

        return $students;
    }

    private function findUserSchool(int $id)
    {
        $user = auth()->user();
        if ($user->role === User::ROLE_SUPERADMIN) {
            $school = School::where(['id' => $id])->firstOrFail();
        } else {
            $school = $user->schools()->whereNotNull('parent_id')->where(['school_id' => $id])->firstOrFail();
        }

        return $school;
    }
}
