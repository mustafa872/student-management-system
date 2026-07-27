<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('card')->paginate(5);

        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }


    public function store(Request $request)
    {
        $request->validate(
            [
                'name'  => 'required|string|min:3|max:255',
                'email' => 'required|email|unique:students,email',
                'age'   => 'required|integer|min:1|max:100',
                'stage' => 'required|in:First,Second,Third,Fourth',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ],
            [
                'name.required' => 'يرجى إدخال اسم الطالب.',
                'name.min' => 'يجب أن يتكون الاسم من 3 أحرف على الأقل.',
                'email.required' => 'يرجى إدخال البريد الإلكتروني.',
                'email.email' => 'صيغة البريد الإلكتروني غير صحيحة.',
                'email.unique' => 'هذا البريد الإلكتروني مستخدم مسبقًا.',
                'age.required' => 'يرجى إدخال العمر.',
                'age.integer' => 'العمر يجب أن يكون رقمًا صحيحًا.',
                'stage.required' => 'يرجى اختيار المرحلة.',

            ]
        );
        $image = $request->file('image');

        $path = $image->store('students', 'public');

        Student::create([
            'name'  => $request->name,
            'email' => $request->email,
            'age'   => $request->age,
            'stage' => $request->stage,
            'image' => $path,
        ]);


        return redirect()
            ->route('students.index')
            ->with('success', 'Student added successfully.');
    }

    public function show(Student $student) {}

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'age' => 'required|integer|min:1|max:100',
            'stage' => 'required|in:First,Second,Third,Fourth',
            'image' => 'nullable|image',
        ]);

        $student->name = $request->name;
        $student->email = $request->email;
        $student->age = $request->age;
        $student->stage = $request->stage;

        if ($request->hasFile('image')) {

            if ($student->image) {
                Storage::disk('public')->delete($student->image);
            }

            $path = $request->file('image')->store('students', 'public');

            $student->image = $path;
        }

        $student->save();

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully.');
    }
    public function destroy(Student $student)
    {
        if ($student->image) {
            Storage::disk('public')->delete($student->image);
        }

        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }
}
