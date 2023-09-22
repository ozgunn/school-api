<?php
namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    protected $operation = 'create';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $userId = Auth::id();

        $rules = [
            'name' => 'nullable|string|max:50',
            'password' => 'nullable|string|min:6',
            'username' => [
                'nullable',
                'string',
                'min:5','max:20',
                $this->isMethod('put') ? Rule::unique('users')->ignore($userId) : Rule::unique('users'),
            ],
            'email' => [
                'nullable',
                'string',
                'email',
                'max:255',
                $this->isMethod('put') ? Rule::unique('users')->ignore($userId) : Rule::unique('users'),
            ],
            'phone_number' => [
                'nullable',
                'string',
                'regex:/^[0-9]{10,12}$/',
                $this->isMethod('put') ? Rule::unique('users')->ignore($userId) : Rule::unique('users'),
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
            ],
            'status' => [
                'required',
                Rule::in(User::STATUSES),
            ],
            'role' => [
                'required',
                Rule::in(array_keys(User::ROLES)),
            ]
        ];

        $userIdentifier = config('app.user_identifier');

        if ($userIdentifier === "email") {
            $rules['email'][0] = 'required';
        }
        if ($userIdentifier === "phone_number") {
            $rules['phone_number'][0] = 'required';
        }
        if ($userIdentifier === "username") {
            $rules['username'][0] = 'required';
        }

        if ($this->operation() === 'update') {
            // "update" işlemi için ek kurallar !!!test

        }

        return $rules;
    }

    public function setOperation($operation)
    {
        $this->operation = $operation;
    }

    public function operation()
    {
        return $this->operation;
    }
}
