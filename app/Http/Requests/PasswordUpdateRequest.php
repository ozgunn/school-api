<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordUpdateRequest extends FormRequest
{
    protected $operation = 'create';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'old_password' => 'required',
            'new_password' => 'required|string|min:6',
        ];

        return $rules;
    }

}
