<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Resources\DailyAllResource;
use App\Http\Resources\DailyResource;
use App\Models\DailyReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DailyController extends BaseController
{
    public function index(Request $request)
    {
        $reports = $this->findResource();

        $data = DailyAllResource::collection($reports);

        return $this->sendResponse($data);
    }

    public function show(int $id)
    {
        $report = $this->findResource($id);

        $data = new DailyResource($report);

        return $this->sendResponse($data);
    }

    public function destroy(int $id)
    {
        $item = $this->findResource($id);

        try {
            $item->delete();
            Log::channel('db')->info('Daily Report deleted', ['id' => $item->id]);

            return $this->sendResponse(__('Deleted'), __('Deleted successfully'));
        } catch (\Exception $e) {
            return $this->sendError(__('Delete failed'), $e->getMessage());
        }    }

    private function findResource($id = null)
    {
        $user = auth()->user();
        $schools = $user->getSchoolIds();

        if ($id) {
            $resource = DailyReport::where('id', $id)
                ->whereIn('school_id', $schools)
                ->firstOrFail();
        } else {
            $resource = DailyReport::whereIn('school_id', $schools)
                ->with('user')
                ->orderByDesc('id')
                ->take(100)->get();
        }

        return $resource;
    }
}
