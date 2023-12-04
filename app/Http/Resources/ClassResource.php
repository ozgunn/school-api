<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClassResource extends JsonResource
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
            'name' => $this->name,
            'school' => [
                'id' => $this->school->id,
                'name' => $this->school->name,
            ],
            'group' => [
                'id' => $this->group->id,
                'name' => $this->group->name,
            ],
        ];

        return $response;
    }

}
