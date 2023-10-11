<?php

namespace App\Http\Resources;

use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserSchoolsCollection extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $response = [];
        foreach ($this->collection as $item) {
            $response[] = new UserSchoolResource($item);
        }

        return $response;
    }

}
