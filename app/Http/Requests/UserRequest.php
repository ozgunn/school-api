<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $userId = \Auth::id();

        if ($this->isMethod('put')) {
            return [
                'name' => 'required|string|max:50',
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique('users')->ignore($userId),
                ],
                'password' => 'nullable|string|min:6',
                'phone_number' => [
                    'nullable',
                    'string',
                    'regex:/^[0-9]{10,12}$/',
                ],
                'phone_country_code' => [
                    'nullable',
                    'string',
                    'regex:/^\+[0-9]{1,4}$/',
                ],
                'language' => [
                    'required',
                    'string',
                    Rule::in(config('app.languages')),
                ]
            ];
        }

        return [
            'name' => 'required|string|max:50',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users'),
            ],
            'password' => 'required|string|min:6',
        ];
    }
}
