<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    const PATH = '/images/';
    const DEFAULT = 'default.png';

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
            'birth_date' => $this->birth_date,
            'image' => config('app.server_url') . ($this->image ? self::PATH . $this->image : self::PATH . self::DEFAULT),
            'school_id' => $this->school_id,
            'class_id' => $this->class_id,
            'class' => $this->class ? $this->class->name : null,
            'parent_id' => $this->parent_id,
        ];

        if (auth()->user()->role === User::ROLE_PARENT)
            $response['teacher'] = $this->getTeacher();

        if (auth()->user()->role >= User::ROLE_MANAGER) {
            $response['teacher'] = $this->getTeacher();
            $response['school'] = $this->getSchool();
            $response['group'] = $this->getGroup();
            $response['class'] = $this->getSchoolClass();
            $response['parent'] = $this->getParent();
            $response['morning_bus'] = $this->getBus(1);
            $response['evening_bus'] = $this->getBus(2);
        }

        return $response;
    }

    public function getTeacher()
    {
        return [
            'id' => $this->class?->teacher_id,
            'name' => $this->class?->teacher?->getFullName(),
            'image' => $this->class?->teacher?->getProfileImageUrl(),
        ];
    }

    public function getSchool()
    {
        return [
            'id' => $this->school->id,
            'name' => $this->school->name,
        ];
    }

    public function getSchoolClass()
    {
        return [
            'id' => $this->class?->id,
            'name' => $this->class?->name,
        ];
    }

    public function getGroup()
    {
        return [
            'id' => $this->class?->group?->id,
            'name' => $this->class?->group?->name,
        ];
    }

    public function getParent()
    {
        return [
            'id' => $this->parent->id,
            'name' => $this->parent->userData?->first_name . ' ' . $this->parent->userData?->last_name,
        ];
    }

    public function getBus($type=1)
    {
        if ($type==1) {
            return [
                'id' => $this->morningBus?->id,
                'license_plate' => $this->morningBus?->license_plate,
            ];
        } else {
            return [
                'id' => $this->eveningBus?->id,
                'license_plate' => $this->eveningBus?->license_plate,
            ];
        }
    }

}
