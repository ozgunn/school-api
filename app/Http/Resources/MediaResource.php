<?php

namespace App\Http\Resources;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MediaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $response = [
            'day' => date('Y-m-d', strtotime($this->publish_date)),
            'id' => $this->id,
            'type' => Media::TYPES[$this->type],
            'file' => $this->file,
            'url' => $this->getFileUrl(),
            'school_id' => $this->school_id,
            'class_id' => $this->class_id,
            'group_id' => $this->group_id,
            'user_id' => $this->user_id,
            'publish_date' => $this->publish_date,
            'description' => $this->description,
        ];

        return $response;
    }

    public function getFileUrl()
    {
        $prefix = config('app.url');
        $fileUrl =  $prefix . Media::PATH . $this->file;

        return $fileUrl;
    }

}
