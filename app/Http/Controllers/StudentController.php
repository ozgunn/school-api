<?php

namespace App\Http\Controllers;

use App\Http\Resources\SchoolResource;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends BaseController
{
    /**
     * List user's students
     */
    public function index(Request $request)
    {
        $students = Student::where('parent_id', $this->getUser()->id)->get();

        $data = [
            'students' => StudentResource::collection($students),
        ];

        return $this->sendResponse($data);
    }

    /**
     * Display user's student
     */
    public function show(int $id)
    {
        $student = Student::where('parent_id', $this->getUser()->id)
            ->where('id', $id)
            ->first();


        $data = new StudentResource($student);

        return $this->sendResponse($data);
    }

    private function findUserSchools()
    {
        $user = auth()->user();

        return $user->getSchools();
    }

    private function findUserSchool(int $id)
    {
        $user = auth()->user();

        return $user->schools()->whereNotNull('parent_id')->where(['school_id' => $id])->firstOrFail();
    }
}
