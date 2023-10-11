<?php

namespace App\Http\Resources;

use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserSchoolResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $response = null;
        if ($this->pivot && $this->pivot->role <= auth()->user()->role) {
            $role = [$this->pivot->role, User::ROLES[$this->pivot->role]];
            $response = [
                'id' => $this->id,
                'parent_id' => $this->parent_id,
                'name' => $this->name,
                'role' => $role ?? null,
            ];
        }
        return $response;
    }

}
