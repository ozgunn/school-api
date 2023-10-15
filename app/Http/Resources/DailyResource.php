<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DailyResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $response = [
            'date' => $this->date,
            'mood' => $this->mood,
            'activity' => $this->activity,
            'meal' => $this->meal,
            'sleep' => $this->sleep,
            'note' => $this->note,
        ];

        return $response;
    }

}
