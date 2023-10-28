<?php

namespace App\Http\Controllers;

use App\Http\Resources\DailyAllResource;
use App\Http\Resources\DailyResource;
use App\Models\DailyReport;
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
}
