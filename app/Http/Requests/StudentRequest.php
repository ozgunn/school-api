<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'name' => 'required|string|min:3|max:100',
            'school' => 'required|integer',
            'class_id' => 'nullable|integer',
            'parent_id' => 'required|integer',
            'morning_bus_id' => 'nullable|integer',
            'evening_bus_id' => 'nullable|integer',
        ];

        return $rules;
    }


}
