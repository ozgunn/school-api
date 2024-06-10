<?php

namespace App\Http\Resources;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $user = auth()->user();
        $user_id = $user->id;

        if ($user->role >= User::ROLE_MANAGER) {
            return [
                'id' => $this->id,
                'message' => $this->message,
                'sender' => ($this->user->role >= User::ROLE_MANAGER) ? 'school' : (($this->user->role == User::ROLE_TEACHER) ? 'teacher' : 'parent'),
                'student' => [
                    'id' => $this->student->id,
                    'name' => $this->student->name,
                ],
                'parent' => [
                    'id' => $this->student->parent->id,
                    'name' => $this->student->parent->name,
                ],
                'user' => [
                    'id' => $this->user->id,
                    'name' => $this->user->name,
                ],
                'read_at' => $this->read_at,
                'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i'),
            ];
        }

        if ($this->student_id) {
            return [
                'id' => $this->id,
                'message' => $this->message,
                'student' => new StudentResource($this->student),
                'user_id' => $this->user_id,
                'role' => ($this->user_id === $user_id) ? Message::ROLE_SENDER : Message::ROLE_RECIPIENT,
                'read_at' => $this->read_at,
                'created_at' => $this->created_at,
//                'last_created_at' => $this->last_created_at,
//                'last_read_at' => $this->last_read_at,
            ];
        }

        $response = [
            'id' => $this->id,
            'message' => $this->message,
            'user_id' => $this->user_id,
            'profile_image' => $this->getProfileImage(),
            'name' => $this->user->getFullName(),
            'role' => ($this->user_id === $user_id) ? Message::ROLE_SENDER : Message::ROLE_RECIPIENT,
            'read_at' => $this->read_at,
            'created_at' => $this->created_at,
        ];
        if ($this->read_at == null && $this->user_id !== $user_id) {
            // mark as read
            $message = Message::where('id', $this->id)->update(['read_at' => new \DateTime() ]);
        }

        return $response;
    }

    public function getProfileImage()
    {
        $user = $this->user;
        $defaultImg = $user->role == User::ROLE_TEACHER ? User::IMAGE_DEFAULT_TEACHER : User::IMAGE_DEFAULT_USER;
        $image = config('app.url') . User::PATH . ($this->user->image ?? $defaultImg);

        return $image;
    }
}
