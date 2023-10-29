<?php

namespace App\Http\Resources;

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
            'teacher' => $this->getTeacher(),
        ];

        return $response;
    }

    public function getTeacher()
    {
        return [
            'id' => $this->class->teacher_id,
            'name' => $this->class->teacher->getFullName(),
            'image' => $this->class->teacher->getProfileImageUrl(),
        ];
    }

}
