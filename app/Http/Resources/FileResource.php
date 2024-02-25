<?php

namespace App\Http\Resources;

use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class FileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $response = [
            'id' => $this->id,
            'file' => $this->file,
            'url' => $this->getFileUrl(),
            'school_id' => $this->school_id,
            'publish_year' => $this->publish_year,
            'publish_month' => $this->publish_month,
            'title' => $this->description ?? $this->getTitle(),
            'type' => $this->type,
            'lang' => $this->lang,
            'group' => $this->group ? [
                'id' => $this->group->id,
                'name' => $this->group->name,
            ] : null,
            'created_at' => $this->created_at,
        ];

        return $response;
    }

    public function getTitle()
    {
        $userLang = app()->getLocale();

        return Carbon::create()->month($this->publish_month)->locale($userLang)->monthName . ' ' .
            $this->publish_year . ' ' .
            trans($this->type == Files::TYPE_PDF_PARENTS ? 'Parents Newspaper' : 'Group Newspaper');
    }

    public function getFileUrl()
    {
        $prefix = $this->is_url ? '' : config('app.url');
        $fileUrl =  $prefix . Files::PATH . $this->file;

        return $fileUrl;
    }

}
