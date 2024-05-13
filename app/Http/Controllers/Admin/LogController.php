<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Resources\LogResource;
use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends BaseController
{
    /**
     * List parents newspaper
     */
    public function index(Request $request)
    {
        $result = $this->findResource();

        $data = LogResource::collection($result);

        return $this->sendResponse($data);
    }

    private function findResource($id = null)
    {
        if ($id) {
            $resource = Log::where('id', $id)
                ->with('user')
                ->firstOrFail();
        } else {
            $resource = Log::with('user')
                ->orderByDesc('id')
                ->take(500)->get();
        }

        return $resource;
    }

}
