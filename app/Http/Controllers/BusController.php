<?php

namespace App\Http\Controllers;

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

        $data = null;

        if ($user->role == User::ROLE_TEACHER) {
            $buses = $user->buses;
            $data = BusResource::collection($buses);
        } else {
            $student = $user->getParentsStudent();
            $bus1 = $student->getMorningBus;
            $bus2 = $student->getEveningBus;

            if ($time && $time === 1 && $bus1)
                $data =  new BusResource($bus1);
            else if ($time && $time == 2 && $bus2)
                $data = new BusResource($bus2);
            else {
                $busArr = [];
                if ($bus1) $busArr[] = $bus1;
                if ($bus2) $busArr[] = $bus2;

                $data = BusResource::collection($busArr);
            }
        }

        return $this->sendResponse($data);
    }

    public function sendPosition(Request $request, int $id)
    {
        $user = auth()->user();

        if ($user->role != User::ROLE_TEACHER)
            abort(404);

        $bus = Bus::where(['id' => $id, 'teacher_id' => $user->id])->firstOrFail();
        $previousStatus = $bus->status;

        $request->validate([
            'status' => ['integer','required', Rule::in([Bus::STATUS_PASSIVE, Bus::STATUS_ACTIVE])],
            'lat' => 'numeric|between:-90,90|nullable',
            'long' => 'numeric|between:-90,90|nullable',
        ]);

        $result = $bus->update([
            'status' => $request->status,
            'lat' => $request->lat,
            'long' => $request->long,
        ]);

        if ($result) {
            // Bus started to move
            if ($previousStatus == Bus::STATUS_PASSIVE && $request->status == Bus::STATUS_ACTIVE) {
                // TODO: Servisi kullanan tüm kullanıcıların tüm devicelarına notification gönderilecekse, queue yapısı kurulmalı.
                // $user->sendPushNotification('Servis harekete geçti', 'Servisiniz harekete geçmiştir', 'schoolbus');
            }

            // Bus arrived
            if ($previousStatus == Bus::STATUS_ACTIVE && $request->status == Bus::STATUS_PASSIVE) {
                // $user->sendPushNotification('Servis harekete geçti', 'Servisiniz harekete geçmiştir', 'schoolbus');
            }

            return $this->sendResponse($result);
        }

        return $this->sendResponse($result);
    }

}
