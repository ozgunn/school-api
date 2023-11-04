<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends BaseController
{
    /**
     * List user's students
     */
    public function index(Request $request)
    {
        $user = auth()->user();

        if ($user->role == User::ROLE_TEACHER)
            $students = $user->teachersClass->students;
        else
            $students = $user->getParentsStudents()->get();

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
        $user = auth()->user();
        if ($user->role == User::ROLE_TEACHER) {
            $student = Student::where(['id' => $id, 'class_id' => $user->teachersClass->id])->firstOrFail();
        } else {
            $student = $user->getParentsStudent();
        }

        $data = $student ? new StudentResource($student) : null;

        return $this->sendResponse($data);
    }

}
