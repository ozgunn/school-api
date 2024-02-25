<?php

namespace App\Http\Requests;

use App\Models\Files;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewspaperRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'pdf' => 'nullable|mimes:pdf|max:10240',
            'school_id' => 'required|integer',
            'group_id' => 'nullable|integer',
            'class_id' => 'nullable|integer',
            'publish_year' => 'required|integer',
            'publish_month' => 'required|integer',
            'type' => ['required', Rule::in(Files::TYPES)],
            'lang' =>  ['nullable', Rule::in(config('app.languages'))],
        ];

        return $rules;
    }
}
