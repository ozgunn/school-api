<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MediaRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'files.*' => 'image|mimes:jpeg,png,jpg,gif|max:10240',
            'description' => 'nullable|string|max:255',
        ];

        return $rules;
    }
}
