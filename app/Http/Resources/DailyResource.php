<?php

namespace App\Http\Resources;

use App\Models\DailyNote;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DailyResource extends JsonResource
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
            'date' => date('Y-m-d', strtotime($this->date)),
            'note' => $this->note,
            'read_at' => $this->read_at,
            'confirmed_at' => $this->confirmed_at
        ];

        $response = array_merge($response, $this->decorateNotes($this->selected_notes));

        return $response;
    }

    public function decorateNotes(string $selected_notes)
    {
        $selectedNotes = explode(',', $selected_notes);

        $responseData = [
            'mood' => [
                'title' => trans('Bugün Ben'),
                'items' => []
            ],
            'activity' => [
                'title' => trans('Bugün Yaptıklarım'),
                'items' => []
            ],
            'meal' => [
                'title' => trans('Yemek'),
                'items' => []
            ],
            'sleep' => [
                'title' => trans('Uyku'),
                'items' => []
            ],
        ];

        $dailyNotes = DailyNote::whereIn('id', $selectedNotes)->get();

        foreach ($dailyNotes as $note) {
            switch ($note->parent->type) {
                case 'mood':
                    $responseData['mood']['items'][] = trans($note->option);
                    break;
                case 'activity':
                    $responseData['activity']['items'][] = trans($note->option);
                    break;
                case 'sleep':
                    unset($responseData['sleep']['items']);
                    $responseData['sleep']['value'] = trans($note->option);
                    break;
                case 'food':
                    $responseData['meal']['items'][] = [
                        'title' => trans($note->parent->title),
                        'value' => trans($note->option),
                    ];
                    break;
            }
        }

        return $responseData;
    }

}
