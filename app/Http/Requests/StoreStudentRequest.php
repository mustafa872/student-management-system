<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Student;

class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', Student::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:students,email'],
            'age' => ['required', 'integer', 'min:6', 'max:100'],
            'stage' => ['required', 'in:First,Second,Third,Fourth'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
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
            'email.unique' => 'هذا البريد الإلكتروني مستخدم مسبقًا.',
            'age.required' => 'يرجى إدخال العمر.',
            'age.integer' => 'العمر يجب أن يكون رقمًا صحيحًا.',
            'stage.required' => 'يرجى اختيار المرحلة.',
            'image.required' => 'يرجى اختيار صورة الطالب.',
            'image.image' => 'الملف المختار يجب أن يكون صورة.',
            'image.mimes' => 'الصورة يجب أن تكون بصيغة JPG أو PNG.',
            'image.max' => 'حجم الصورة يجب ألا يتجاوز 2 ميغابايت.',
            'courses.array' => 'اختيار المواد غير صالح.',
            'courses.*.exists' => 'إحدى المواد المختارة غير موجودة.',

        ];
    }
};
