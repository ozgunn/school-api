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
        $data = [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'role' => User::ROLES[$this->role],
            'role_id' => $this->role,
            'language' => $this->language,
            'status' => $this->status,
            'phone_country_code' => $this->phone_country_code,
            'phone_number' => $this->phone_number,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user_data' => $this->getUserData(),
            'school' => $this->getSchoolData(),
            'company' => $this->getCompanyData(),
            'image' => $this->getProfileImageUrl(),
        ];
        if ($this->role == User::ROLE_TEACHER) {
            $data = array_merge($data, [
                'class' => $this->getClassData(),
            ]);
        }
        if ($this->role == User::ROLE_PARENT) {
            $data = array_merge($data, [
                'student' => $this->getStudentData(),
            ]);
        }

        return $data;
    }

    public function getUserData()
    {
        // Ortak alanlar
        $userData = [
            "first_name" => $this->userData?->first_name,
            "last_name" => $this->userData?->last_name,
            "address" => $this->userData?->address,
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

    public function getCompanyData()
    {
        $school = [];
        if ($company = $this->getCompany()) {
            $school = [
                'id' => $company->id,
                'name' => $company->name,
            ];
        }
        return $school;
    }

    public function getClassData()
    {
        $class = null;
        if ($c = $this->teachersClass) {
            $class = [
                'id' => $c->id,
                'name' => $c->name,
                'student_count' => $c->students->count(),
            ];
        }
        return $class;
    }

    public function getStudentData()
    {
        $students = $this->getParentsStudents()->get();
        $studentsArr = [];
        foreach ($students as $s) {
            $studentsArr[] = [
                'id' => $s->id,
                'name' => $s->name,
            ];
        }
        return $studentsArr;
    }
}
