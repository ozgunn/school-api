<?php

namespace App\Http\Resources;

use App\Models\FoodMenu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FoodMenuResource extends JsonResource
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
            'lang' => $this->lang,
            'school_id' => $this->school_id,
            'date' => date('Y-m-d', strtotime($this->date)),
            'items' => $this->decorateMeals(),
        ];

        return $response;
    }

    public function decorateMeals()
    {
        $userLang = app()->getLocale();
        $content = [];
        $translated = null;
        if ($userLang != $this->lang) {
            $translated = FoodMenu::where(['parent_id' => $this->id, 'lang' => $userLang])->first();
        }

        $content[] = [
            'title' => trans('first_meal'),
            'value' => $translated ? $translated->first_meal : $this->first_meal,
        ];
        $content[] = [
            'title' => trans('second_meal'),
            'value' => $translated ? $translated->second_meal : $this->second_meal,
        ];
        $content[] = [
            'title' => trans('third_meal'),
            'value' => $translated ? $translated->third_meal : $this->third_meal,
        ];

        return $content;
    }

}
