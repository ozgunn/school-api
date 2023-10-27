<?php

namespace App\Http\Resources;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $user_id = auth()->user()->id;
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
