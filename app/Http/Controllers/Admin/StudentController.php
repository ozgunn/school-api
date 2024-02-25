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
use Illuminate\Support\Facades\Log;

class StudentController extends BaseController
{
    /**
     * List user's schools
     */
    public function index(Request $request)
    {
        $query = $this->findUserStudents();

        $data = [
            'students' => StudentResource::collection($query->get()),
        ];

        return $this->sendResponse($data);
    }

    /**
     * Display student
     */
    public function show(int $id)
    {
        $student = $this->findUserStudent($id);

        $data = new StudentResource($student);

        return $this->sendResponse($data);
    }

    /**
     * Create school
     */
    public function store(StudentRequest $request)
    {
        $validated = $request->validated();

        $student = Student::create($validated);

        if ($student) {
            Log::channel('db')->info('Student created', ['id' => $student->id]);

            return $this->sendResponse(new StudentResource($student), __('Student created successfully'));
        } else {
            Log::channel('db')->error('Student create failed');

            return $this->sendError(__("Create Failed"), __('Create Failed'));
        }
    }

    /**
     * Update user.
     */
    public function update(StudentRequest $request, int $id)
    {
        $student = $this->findUserStudent($id);
        $validated = $request->validated();

        $student->update($validated);
        Log::channel('db')->info('Student updated', ['id' => $student->id]);

        return $this->sendResponse(new StudentResource($student), __('Student updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $student = $this->findUserStudent($id);

        try {
            $student->delete();
            Log::channel('db')->info('Student deleted', ['id' => $student->id]);

            return $this->sendResponse(__('Deleted'), __('Student deleted successfully.'));
        } catch (\Exception $e) {
            Log::channel('db')->error('Student delete failed', ['error' => $e->getMessage()]);

            return $this->sendError(__('Delete failed'), $e->getMessage());
        }
    }

    private function findUserStudents()
    {
        $user = auth()->user();
        $schools = $user->getSchools()->pluck('id')->toArray();

        if ($user->role === User::ROLE_SUPERADMIN) {
            $students = Student::with(['school', 'class', 'parent', 'class.teacher', 'morningBus', 'eveningBus']);
        } else {
            $students = Student::with(['school', 'class', 'parent', 'class.teacher', 'morningBus', 'eveningBus'])->whereIn('school_id', $schools);
        }

        return $students;
    }

    private function findUserStudent(int $id)
    {
        $user = auth()->user();
        $schools = $user->getSchools()->pluck('id')->toArray();

        if ($user->role === User::ROLE_SUPERADMIN) {
            $student = Student::where(['id' => $id])->firstOrFail();
        } else {
            $student = Student::with(['school', 'class', 'parent', 'class.teacher', 'morningBus', 'eveningBus'])
                ->where(['id' => $id])->whereIn('school_id', $schools)->first();
        }

        return $student;
    }
}
