<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AnnouncementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var User $user */
        $user = auth()->user();
        if ($user->role < User::ROLE_MANAGER) {
            $response = [
                'id' => $this->id,
                'content' => $this->announcement->contents->first()->content,
                'date' => $this->created_at,
            ];
        } else {
            $response = [
                'id' => $this->id,
                'target' => $this->target,
                'content' => $this->announcement->contents->first()->content,
                'school_id' => $this->school_id,
                'group_id' => $this->group_id,
                'class_id' => $this->class_id,
                'user_id' => $this->user_id,
                'teacher_id' => $this->teacher_id,
                'student_id' => $this->student_id,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ];
        }

        return $response;
    }

}
