<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'license_plate' => 'required|string|min:3|max:20',
            'school_id' => 'required|integer',
            'teacher_id' => 'nullable|integer',
            'start_time' => 'nullable|string',
            'end_time' => 'nullable|string',
            'status' => 'required|integer',
        ];

        return $rules;
    }


}
