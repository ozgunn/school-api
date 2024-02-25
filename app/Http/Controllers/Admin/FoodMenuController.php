<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\FoodMenuRequest;
use App\Http\Resources\FoodMenuResource;
use App\Models\FoodMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class FoodMenuController extends BaseController
{
    /**
     * List current month's menu
     */
    public function index(Request $request)
    {
        $menu = FoodMenu::whereNull('parent_id')
            ->orderByDesc('date')
            ->get();

        $data = FoodMenuResource::collection($menu);

        return $this->sendResponse($data);
    }

    /**
     * Display menu
     */
    public function show(int $id)
    {
        $menu = $this->findResource($id);

        $data = new FoodMenuResource($menu);

        return $this->sendResponse($data);
    }

    public function store(FoodMenuRequest $request)
    {
        $validated = $request->validated();

        $model = FoodMenu::create($validated);
        Log::channel('db')->info('Food Menu created', ['id' => $model->id]);
        $data = new FoodMenuResource($model);

        return $this->sendResponse($data);
    }

    public function update(FoodMenuRequest $request, int $id)
    {
        $validated = $request->validated();

        $model = $this->findResource($id);

        $result = $model->update($validated);

        Log::channel('db')->info('Food Menu updated', ['id' => $model->id]);
        $data = new FoodMenuResource($model);

        return $this->sendResponse($data);
    }

    public function destroy(int $id)
    {
        $model = $this->findResource($id);

        $model->delete();

        Log::channel('db')->info('Food Menu deleted', ['id' => $model->id]);

        return $this->sendResponse(trans('Deleted successfully'));
    }

    private function findResource($id = null)
    {
        if ($id) {
            $resource = FoodMenu::where('id', $id)
                ->firstOrFail();
        } else {
            $resource = FoodMenu::orderByDesc('id')
                ->get();
        }

        return $resource;
    }

}
