<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'role' => User::ROLES[$this->role],
            'language' => $this->language,
            'status' => $this->status,
            'phone_country_code' => $this->phone_country_code,
            'phone_number' => $this->phone_number,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user_data' => $this->getUserData(),
            'school' => $this->getSchoolData(),
        ];
    }

    public function getUserData()
    {
        // Ortak alanlar
        $userData = [
            "first_name" => $this->userData->first_name,
            "last_name" => $this->userData->last_name,
            "address" => $this->userData->address,
        ];

        if ($this->role === User::ROLE_ADMIN) {
            /*return [
                "role" => "admin",
                "first_name" => $this->,

            ];*/

        }

        return $userData;
    }

    public function getSchoolData()
    {
        $school = [];
        if ($this->getSchool()) {
            $school = [
                'id' => $this->getSchool()->id,
                'name' => $this->getSchool()->name,
            ];
        }
        return $school;
    }
}
