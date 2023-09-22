<?php
namespace App\Http\Requests;

use App\Models\School;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SchoolRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'name' => 'required|string|min:3|max:100',
            'logo' => 'nullable|string|max:255',
            'status' => ['nullable', 'integer', Rule::in(array_keys(School::STATUSES))],
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|string|max:100',
            'country' => 'nullable|integer',
            'city' => 'nullable|integer',
            'town' => 'nullable|integer',
            'address' => 'nullable|string',
        ];

        return $rules;
    }


}
