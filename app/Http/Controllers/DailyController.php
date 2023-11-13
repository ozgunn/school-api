<?php

namespace App\Http\Controllers;

use App\Http\Requests\DailyReportRequest;
use App\Http\Resources\DailyAllResource;
use App\Http\Resources\DailyResource;
use App\Models\DailyNote;
use App\Models\DailyReport;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DailyController extends BaseController
{
    public function daily(Request $request, $date)
    {
        $parsedDate = Carbon::createFromFormat('Y-m-d', $date);

        if (!$parsedDate || !$parsedDate->isValid() || $parsedDate->format('Y-m-d') !== $date) {
            return $this->sendError('Invalid date', 422);
        }

        $date = $parsedDate->format('Y-m-d');

        $user = auth()->user();
        if ($user->role != User::ROLE_PARENT)
            abort(404);

        $student = $user->getParentsStudent();

        $report = DailyReport::where(['student_id' => $student->id])
            ->where('date', $date)
            ->first();

        if ($report && $report->read_at == null) {
            $report->read_at = now();
            $report->save();
        }

        $data = $report ? new DailyResource($report) : null;

        return $this->sendResponse($data);

    }

    public function dailyAll(int $year, int $month)
    {
        if ($year > 2100 || $year < 2020 || $month < 1 || $month > 12) {
            abort(404);
        }

        $user = auth()->user();
        if ($user->role != User::ROLE_PARENT)
            abort(404);

        $student = $user->getParentsStudent();

        $report = DailyReport::where(['student_id' => $student->id])
            ->whereYear('date', $year)
            ->whereMonth('date', $month)
            ->get();

        $data = DailyAllResource::collection($report);

        return $this->sendResponse($data);

    }

    public function approve(int $id)
    {
        $user = auth()->user();
        if ($user->role != User::ROLE_PARENT)
            abort(404);

        $student = $user->getParentsStudent();

        $report = DailyReport::where(['id' => $id, 'student_id' => $student->id])
            ->whereNull('confirmed_at')
            ->firstOrFail();

        $report->confirmed_at = now();
        if ($report->save()) {
            return $this->sendResponse('approved');
        }

        return $this->sendError('error');

    }

    public function studentDaily(Request $request, int $id, $date)
    {
        $parsedDate = Carbon::createFromFormat('Y-m-d', $date);

        if (!$parsedDate || !$parsedDate->isValid() || $parsedDate->format('Y-m-d') !== $date) {
            return $this->sendError('Invalid date', 422);
        }

        $date = $parsedDate->format('Y-m-d');

        $user = auth()->user();
        if ($user->role != User::ROLE_TEACHER)
            abort(404);

        $student = Student::where(['id' => $id, 'class_id' => $user->teachersClass->id])->firstOrFail();

        $report = DailyReport::where(['student_id' => $student->id])
            ->where('date', $date)
            ->first();

        if (!$report) {
            $report = new DailyReport();
        }
        $data = $report ? new DailyResource($report) : null;

        return $this->sendResponse($data);

    }

    public function studentDailyAll(int $id, int $year, int $month)
    {
        if ($year > 2100 || $year < 2020 || $month < 1 || $month > 12) {
            abort(404);
        }
        $user = auth()->user();

        if ($user->role != User::ROLE_TEACHER)
            abort(404);

        $student = Student::where(['id' => $id, 'class_id' => $user->teachersClass->id])->firstOrFail();

        $report = DailyReport::where(['student_id' => $student->id])
            ->whereYear('date', $year)
            ->whereMonth('date', $month)
            ->get();

        $data = DailyAllResource::collection($report);

        return $this->sendResponse($data);

    }

    public function studentDailyStore(DailyReportRequest $request, int $id, $date)
    {
        $parsedDate = Carbon::createFromFormat('Y-m-d', $date);

        if (!$parsedDate || !$parsedDate->isValid() || $parsedDate->format('Y-m-d') !== $date) {
            return $this->sendError('Invalid date', 422);
        }

        $date = $parsedDate->format('Y-m-d');

        $user = auth()->user();
        if ($user->role != User::ROLE_TEACHER)
            abort(404);

        $validated = $request->validated();

        if ($request->selected_notes && !empty($request->selected_notes)) {
            $idArray = $request->selected_notes;
            $existingIds = DailyNote::whereIn('id', $idArray)->pluck('id')->toArray();

            $nonExistingIds = array_diff($idArray, $existingIds);

            if (!empty($nonExistingIds)) {
                return $this->sendError('Invalid note ids '.json_encode($nonExistingIds));
            }
        }

        $student = Student::where(['id' => $id, 'class_id' => $user->teachersClass->id])->firstOrFail();
        $report = DailyReport::where(['student_id' => $student->id, 'date' => $date])->first();

        try {
            if ($report) {
                $report->update([
                    'note' => $request->note,
                    'selected_notes' => implode(',', $request->selected_notes),
                ]);
            } else {
                $report = DailyReport::create([
                    'user_id' => $user->id,
                    'student_id' => $student->id,
                    'school_id' => $student->school_id,
                    'class_id' => $student->class_id,
                    'note' => $request->note,
                    'date' => $date,
                    'selected_notes' => implode(',', $request->selected_notes),
                ]);
            }

        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage());
        }

        return $this->sendResponse(['id' => $report->id]);

    }
}
