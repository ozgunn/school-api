<?php

namespace App\Http\Resources;

use App\Models\DailyNote;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DailyAllResource extends JsonResource
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

        $response = [
            'id' => $this->id,
            'date' => date('Y-m-d', strtotime($this->date)),
            'read_at' => $this->read_at,
            'confirmed_at' => $this->confirmed_at,
        ];

        if ($user->role >= User::ROLE_MANAGER) {
            $noteData = [
                "note" => $this->note
            ];
            $teacherData = $this->user ? [
                "teacher" => [
                    "id" => $this->user->id,
                    "name" => "asd asd",
                ]
            ] : [];
            $studentData = $this->student ? [
                "student" => [
                    "id" => $this->student->id,
                    "name" => "1asd 1asd",
                ]
            ] : [];
            $response = array_merge($response, $noteData, $teacherData, $studentData);
        }

        return $response;
    }

}
