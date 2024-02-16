<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
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
            $buses = Bus::find();
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

}
