<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'school_id' => 'required|integer',
            'group_id' => 'nullable|integer',
            'student_id' => 'nullable|integer',
            'target' => 'required|integer',
            'lang' => 'nullable|string',
            'content' => 'required|string',
            'class_id' => 'required|integer',
        ];

//        $rules['class_id'] = 'integer|required_if:target,'. Announcement::TARGET_STUDENT;
//        $rules['teacher_id'] = 'integer|required_if:target,'. Announcement::TARGET_TEACHER;

        return $rules;
    }


}
