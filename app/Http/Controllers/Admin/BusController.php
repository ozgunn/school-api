<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\BusRequest;
use App\Http\Resources\BusResource;
use App\Models\Bus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BusController extends BaseController
{
    /**
     * List student's buses
     */
    public function index(Request $request, int $time = null)
    {
        $user = auth()->user();
        $request->validate([
            'status' => ['integer', Rule::in([Bus::STATUS_PASSIVE, Bus::STATUS_ACTIVE])],
        ]);

        if ($user->role == User::ROLE_SUPERADMIN) {
            $buses = Bus::find()->with('school')->with('teacher');
        } else {
            $schools = $user->getSchools()->pluck('id')->toArray();
            $buses = Bus::whereIn('school_id', $schools);
        }

        if (isset($request->status)) {
            $buses = $buses->where('status', $request->status);
        }

        $data = BusResource::collection($buses->get());

        return $this->sendResponse($data);
    }

    /**
     * Display
     */
    public function show(int $id)
    {
        $bus = $this->findUserBus($id);

        $data = new BusResource($bus);

        return $this->sendResponse($data);
    }

    /**
     * Create school
     */
    public function store(BusRequest $request)
    {
        $validated = $request->validated();

        $bus = Bus::create($validated);

        if ($bus) {
            return $this->sendResponse(new BusResource($bus), __('Bus created successfully'));
        } else {
            return $this->sendError(__("Create Failed"), __('Create Failed'));
        }
    }

    /**
     * Update
     */
    public function update(BusRequest $request, int $id)
    {
        $bus = $this->findUserBus($id);
        $validated = $request->validated();

        $bus->update($validated);

        return $this->sendResponse(new BusResource($bus), __('Bus updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $bus = $this->findUserBus($id);

        try {
            $bus->delete();

            return $this->sendResponse(__('Deleted'), __('Bus deleted successfully.'));
        } catch (\Exception $e) {
            return $this->sendError(__('Delete failed'), $e->getMessage());
        }
    }

    private function findUserBus(int $id)
    {
        $user = auth()->user();
        $schools = $user->getSchools()->pluck('id')->toArray();

        if ($user->role === User::ROLE_SUPERADMIN) {
            $bus = Bus::where(['id' => $id])->firstOrFail();
        } else {
            $bus = Bus::with(['teacher', 'school'])
                ->where(['id' => $id])->whereIn('school_id', $schools)->firstOrFail();
        }

        return $bus;
    }

}
