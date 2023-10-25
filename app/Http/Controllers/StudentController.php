<?php

namespace App\Http\Controllers;

use App\Http\Resources\DailyResource;
use App\Http\Resources\StudentResource;
use App\Models\DailyReport;
use Illuminate\Http\Request;

class StudentController extends BaseController
{
    /**
     * List user's students
     */
    public function index(Request $request)
    {
        $user = auth()->user();

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

        $student = $user->getParentsStudent();

        $data = new StudentResource($student);

        return $this->sendResponse($data);
    }

    public function daily(int $id)
    {
        $user = auth()->user();

        $student = $user->getParentsStudent();

        $report = DailyReport::where(['student_id' => $student->id, 'date' => now()->toDateString()])->first();

        $data = new DailyResource($report);

        return $this->sendResponse($data);

    }
}
