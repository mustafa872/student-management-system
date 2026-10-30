<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Student::class);

        $students = Student::with(['card', 'user'])
            ->latest()
            ->paginate(5);

        return view('students.index', compact('students'));
    }

    public function create()
    {
        $this->authorize('create', Student::class);

        $courses = Course::orderBy('name')->get();

        return view('students.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Student::class);

        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|max:255|unique:students,email',
            'age' => 'required|integer|min:1|max:100',
            'stage' => 'required|in:First,Second,Third,Fourth',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',

            'courses' => 'nullable|array',
            'courses.*' => 'integer|exists:courses,id',
        ], [
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
        ]);

        $path = $request->file('image')->store('students', 'public');

        try {
            DB::transaction(function () use ($validated, $path) {

                $student = Student::create([
                    'name' => $validated['name'],
                    'email' => $validated['email'],
                    'age' => $validated['age'],
                    'stage' => $validated['stage'],
                    'image' => $path,
                    'user_id' => Auth::id(),
                ]);

                $student->courses()->sync($validated['courses'] ?? []);
            });
        } catch (\Throwable $exception) {
            Storage::disk('public')->delete($path);

            throw $exception;
        }

        return redirect()
            ->route('students.index')
            ->with('success', 'Student added successfully.');
    }

    public function show(Student $student)
    {
        $this->authorize('view', $student);

        $student->load([
            'card',
            'books',
            'courses',
            'user',
        ]);

        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $this->authorize('update', $student);

        $student->load('courses');

        $courses = Course::orderBy('name')->get();

        return view('students.edit', compact('student', 'courses'));
    }

    public function update(Request $request, Student $student)
    {
        $this->authorize('update', $student);

        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|max:255|unique:students,email,' . $student->id,
            'age' => 'required|integer|min:1|max:100',
            'stage' => 'required|in:First,Second,Third,Fourth',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',

            'courses' => 'nullable|array',
            'courses.*' => 'integer|exists:courses,id',
        ]);

        $oldImage = $student->image;
        $newPath = null;

        if ($request->hasFile('image')) {
            $newPath = $request->file('image')->store('students', 'public');
        }

        try {
            DB::transaction(function () use ($validated, $student, $newPath) {

                if ($newPath) {
                    $student->image = $newPath;
                }

                $student->name = $validated['name'];
                $student->email = $validated['email'];
                $student->age = $validated['age'];
                $student->stage = $validated['stage'];

                $student->save();

                $student->courses()->sync($validated['courses'] ?? []);
            });
        } catch (\Throwable $exception) {
            if ($newPath) {
                Storage::disk('public')->delete($newPath);
            }

            throw $exception;
        }

        if ($newPath && $oldImage) {
            Storage::disk('public')->delete($oldImage);
        }

        return redirect()
            ->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $this->authorize('delete', $student);

        $image = $student->image;

        DB::transaction(function () use ($student) {
            $student->delete();
        });

        if ($image) {
            Storage::disk('public')->delete($image);
        }

        return redirect()
            ->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }
}
