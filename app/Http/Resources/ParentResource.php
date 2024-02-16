<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ParentResource extends JsonResource
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
            'school' => $this->getSchoolData(),
            'student' => $this->getStudentData(),
        ];

        return $data;
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
