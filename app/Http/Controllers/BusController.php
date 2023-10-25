<?php

namespace App\Http\Controllers;

use App\Http\Resources\BusResource;
use App\Http\Resources\FoodMenuResource;
use App\Models\FoodMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BusController extends BaseController
{
    /**
     * List current month's menu
     */
    public function index(Request $request, int $time = null)
    {
        $user = auth()->user();

        $student = $user->getParentsStudent();

        if ($time && $time === 1)
            $data = new BusResource($student->getMorningBus()->first());
        else if ($time && $time == 2)
            $data = new BusResource($student->getEveningBus()->first());
        else
            $data = BusResource::collection($student->getBuses());

        return $this->sendResponse($data);
    }

}
