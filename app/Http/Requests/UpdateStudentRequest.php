<?php

namespace App\Http\Requests;

use App\Models\Student;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        $student = $this->route('student');

        return $student instanceof Student
            && $this->user()->can('update', $student);
    }

    public function rules(): array
    {
        $student = $this->route('student');

        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('students', 'email')->ignore($student),
            ],

            'age' => ['required', 'integer', 'min:6', 'max:100'],

            'stage' => ['required', 'in:First,Second,Third,Fourth'],

            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],

            'courses' => ['nullable', 'array'],

            'courses.*' => ['integer', 'exists:courses,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'يرجى إدخال اسم الطالب.',
            'name.min' => 'يجب أن يتكون الاسم من 3 أحرف على الأقل.',

            'email.required' => 'يرجى إدخال البريد الإلكتروني.',
            'email.email' => 'صيغة البريد الإلكتروني غير صحيحة.',
            'email.unique' => 'هذا البريد الإلكتروني مستخدم مسبقاً.',

            'age.required' => 'يرجى إدخال العمر.',
            'age.integer' => 'العمر يجب أن يكون رقماً صحيحاً.',
            'age.min' => 'العمر يجب ألا يقل عن 6 سنوات.',

            'stage.required' => 'يرجى اختيار المرحلة الدراسية.',

            'image.image' => 'الملف المختار يجب أن يكون صورة.',
            'image.mimes' => 'الصورة يجب أن تكون بصيغة JPG أو PNG.',
            'image.max' => 'حجم الصورة يجب ألا يتجاوز 2 ميغابايت.',

            'courses.array' => 'اختيار المواد غير صالح.',
            'courses.*.exists' => 'إحدى المواد المختارة غير موجودة.',
        ];
    }
}
