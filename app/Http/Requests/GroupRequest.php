<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'name' => 'required|string|min:3|max:100',
            'school_id' => 'required|integer',
            'age_group' => 'required|integer|min:1|max:7',
        ];

        return $rules;
    }


}
