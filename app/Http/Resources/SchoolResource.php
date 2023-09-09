<?php

namespace App\Http\Resources;

use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SchoolResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if ($this->pivot) {
            $role = $this->pivot->role;
            $roleDesc = User::ROLES[$this->pivot->role];
        }

        $response = [
            'id' => $this->id,
            //'parent_id' => $this->parent,
            'name' => $this->name,
            'status' => $this->status,
            'phone' => $this->phone,
            'email' => $this->email,
            'logo' => $this->logo,
            'country' => $this->country,
            'city' => $this->city,
            'town' => $this->town,
            'address' => $this->address,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'role' => $roleDesc ?? null,
        ];

        if ($this->parent_id) {
            $response['parent_id'] = $this->parent_id;
        }

        if ($this->parent_id === null && $role == User::ROLE_ADMIN) {
            $schools = School::where(['parent_id' => $this->id])->get();

            $response['schools'] = SchoolResource::collection($schools);
        }

        return $response;
    }

}
