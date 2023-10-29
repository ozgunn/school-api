<?php

namespace App\Http\Resources;

use App\Models\DailyNote;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DailyAllResource extends JsonResource
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
            'date' => date('Y-m-d', strtotime($this->date)),
            'read_at' => $this->read_at,
            'confirmed_at' => $this->confirmed_at,
        ];

        return $response;
    }

}
