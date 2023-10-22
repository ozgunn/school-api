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
            'date' => date('Y-m-d', strtotime($this->date)),
            'note' => $this->note,
        ];

        $response = array_merge($response, $this->decorateNotes($this->selected_notes));


        return $response;
    }

    public function decorateNotes(string $selected_notes)
    {
        $selectedNotes = explode(',', $selected_notes);

        $responseData = [
            'mood' => [
                'title' => 'Bugün Ben',
                'items' => []
            ],
            'activity' => [
                'title' => 'Bugün Yaptıklarım',
                'items' => []
            ],
            'meal' => [
                'title' => 'Yemek',
                'items' => []
            ],
            'sleep' => [
                'title' => 'Uyku',
                'items' => []
            ],
        ];

        $dailyNotes = DailyNote::whereIn('id', $selectedNotes)->get();

        foreach ($dailyNotes as $note) {
            switch ($note->parent->type) {
                case 'mood':
                    $responseData['mood']['items'][] = $note->option;
                    break;
                case 'activity':
                    $responseData['activity']['items'][] = $note->option;
                    break;
                case 'sleep':
                    unset($responseData['sleep']['items']);
                    $responseData['sleep']['value'] = $note->option;
                    break;
                case 'food':
                    $responseData['meal']['items'][] = [
                        'title' => $note->parent->title,
                        'value' => $note->option,
                    ];
                    break;
            }
        }

        return $responseData;
    }

}
