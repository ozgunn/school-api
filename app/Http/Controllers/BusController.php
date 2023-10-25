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
        $data = null;

        if ($time && $time === 1 && $student->getMorningBus())
            $data =  new BusResource($student->getMorningBus()->first());
        else if ($time && $time == 2 && $student->getEveningBus())
            $data = new BusResource($student->getEveningBus()->first());
        else if (!empty($student->getBuses()))
            $data = BusResource::collection($student->getBuses());

        return $this->sendResponse($data);
    }

}
