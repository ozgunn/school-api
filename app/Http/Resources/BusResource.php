<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BusResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $response = [
            'id' => $this->id,
            'license_plate' => $this->license_plate,
            'lat' => $this->lat,
            'long' => $this->long,
            'teacher' => $this->teacher?->name,
            'start_time' => $this->start_time,
            'end_time' => $this->start_time,
            'status' => $this->status,
        ];

        return $response;
    }

}
