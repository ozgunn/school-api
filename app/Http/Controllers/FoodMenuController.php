<?php

namespace App\Http\Controllers;

use App\Http\Resources\FoodMenuResource;
use App\Models\FoodMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FoodMenuController extends BaseController
{
    /**
     * List current month's menu
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        $startDate = now()->startOfMonth();
        $endDate = now()->endOfMonth();

        $student = $user->getParentsStudent();

        $menu = FoodMenu::where('school_id', $student->school_id)
            ->whereNull('parent_id')
            ->whereDate('date', '>=', $startDate)
            ->whereDate('date', '<=', $endDate)
            ->orderByDesc('date')
            ->with('parent')
            ->get();

        $data = [
            'menu' => FoodMenuResource::collection($menu),
        ];

        return $this->sendResponse($data);
    }

    /**
     * Display menu from specific date. (format: YYYY-MM-DD)
     */
    public function show(string $date)
    {
        $validator = Validator::make(['date' => $date], [
            'date' => 'date',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Invalid date');
        }

        $user = auth()->user();

        $student = $user->getParentsStudent();

        $menu = FoodMenu::where('school_id', $student->school_id)
            ->whereNull('parent_id')
            ->whereDate('date', '=', $date)
            ->with('parent')
            ->first();

        $data = [
            'menu' => new FoodMenuResource($menu),
        ];

        return $this->sendResponse($data);
    }

}
