<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Teacher;

class AddCourseFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth("admin")->check();
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'poster' => '/storage/courses/course-poster.jpg',
            'num_students' => '0',
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required'],
            'subject' => ['required', 'doesnt_start_with:none'],
            'price' => ['required'],
            'description' => ['required'],
            'teacher_id' => ['required', 'doesnt_start_with:none'],
            'exam_type' => ['required', 'doesnt_start_with:none'],
            'num_students' => [],
            'poster' => [],
        ];
    }
}
