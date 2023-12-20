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
            'first_name' => 'required|string|min:3|max:50',
            'last_name' => 'required|string|min:2|max:50',
            'address' => 'nullable|string',
        ];

        if ($this->input('role') === User::ROLE_TEACHER) {
            $rules = [];
        }

        return $rules;
    }

}
