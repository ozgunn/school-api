<?php
namespace App\Http\Requests;

use App\Models\School;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DailyReportRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'note' => 'required|string|min:3|max:255',
            'selected_notes' => 'nullable|array|max:40',
            'selected_notes.*' => 'integer|distinct',
        ];

        return $rules;
    }


}
