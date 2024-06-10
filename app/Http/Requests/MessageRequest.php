<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MessageRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'message' => 'required|string|min:1|max:1024',
            'student_id' => 'nullable|integer',
        ];

//        if (str_contains($this->getPathInfo(), 'teacher')) {
//            $rules['teacher_id'] = ['required', 'integer',
//                Rule::exists('users', 'id')->where(function ($query) {
//                    return $query->where('role', User::ROLE_TEACHER);
//                }),
//            ];
//        } else if (str_contains($this->getPathInfo(), 'school')) {
//            $rules['school_id'] = 'required|integer|exists:schools,id';
//        }

        return $rules;
    }
}
