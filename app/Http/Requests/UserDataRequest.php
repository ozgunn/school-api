<?php
namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class UserDataRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'first_name' => 'nullable|string|min:3|max:50',
            'last_name' => 'nullable|string|min:2|max:50',
            'country' => 'nullable|integer',
            'city' => 'nullable|integer',
            'address' => 'nullable|string',
        ];

        if ($this->input('role') === User::ROLE_TEACHER) {
            $rules = [];
        }

        return $rules;
    }

}
