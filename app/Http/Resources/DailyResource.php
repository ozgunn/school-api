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

        $response = array_merge($response, $this->decorateNotes());

        return $response;
    }

    private function decorateNotes()
    {
        $dailyNotes = DailyNote::all();

        $groupedNotes = $dailyNotes->groupBy('parent_id');

        $responseData = [];
        foreach ($groupedNotes[0] as $i) {
            $arr = $groupedNotes[$i->id]->toArray();
            foreach ($arr as $key => $value) {
                if (!$value['option']) {
                    $item = $groupedNotes[$value['id']]->toArray();
                    $arr[$key]['items'] = $this->decorateItems($item);
                }
            }
            $responseData[$i->type]['title'] = $i['title'];
            $responseData[$i->type]['items'] = $this->decorateItems($arr);
        }

        return $responseData;
    }

    private function decorateItem($item)
    {
        $decorated = [];
        $selectedIds = explode(',' , $this->selected_notes);

        $decorated['id'] = $item['id'];
        if (isset($item['title'])) $decorated['title'] = $item['title'];
        if (isset($item['option'])) $decorated['title'] = $item['option'];
        if (isset($item['items'])) $decorated['items'] = $item['items'];
        $decorated['selected'] = (in_array($item['id'], $selectedIds));

        return $decorated;
    }

    private function decorateItems($arr)
    {
        $decorated = [];
        foreach ($arr as $item) {
            $decorated[] = $this->decorateItem($item);
        }

        return $decorated;
    }

    /*
    private function decorateNotesPrevious(string $selected_notes = null)
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
    */

}
