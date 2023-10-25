<?php

namespace App\Http\Resources;

use App\Models\Message;
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
        return [
            'id' => $this->id,
            'message' => $this->message,
            'role' => ($this->user_id === $user_id) ? Message::ROLE_SENDER : Message::ROLE_RECIPIENT,
            'read_at' => $this->read_at,
            'created_at' => $this->created_at,
        ];
    }
}
