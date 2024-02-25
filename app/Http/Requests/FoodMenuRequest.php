<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FoodMenuRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'date' => 'required|date',
            'school_id' => 'nullable|integer',
            'lang' => ['required', Rule::in(config('app.languages'))],
            'first_meal' => 'nullable|string',
            'second_meal' => 'nullable|string',
            'third_meal' => 'nullable|string',
        ];

        return $rules;
    }


}
