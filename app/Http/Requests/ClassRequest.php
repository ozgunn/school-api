<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassRequest extends FormRequest
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
            'group_id' => 'required|integer',
            'teacher_id' => 'nullable|integer',
        ];

        return $rules;
    }


}
