<?php

use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

it('creates a student without selecting courses', function () {
    Storage::fake('public');
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route('students.store'), [
        'name' => 'Test Student',
        'email' => 'student@example.com',
        'age' => 20,
        'stage' => 'First',
        'image' => UploadedFile::fake()->image('student.jpg'),
    ]);

    $response->assertRedirect(route('students.index'))->assertSessionHasNoErrors();
    $student = Student::where('email', 'student@example.com')->firstOrFail();

    expect($student->user_id)->toBe($user->id);
    expect($student->courses()->count())->toBe(0);
    Storage::disk('public')->assertExists($student->image);
});

it('creates a student with selected courses', function () {
    Storage::fake('public');
    $user = User::factory()->create();
    $first = Course::create(['name' => 'Laravel']);
    $second = Course::create(['name' => 'PHP']);

    $this->actingAs($user)->post(route('students.store'), [
        'name' => 'Student Courses',
        'email' => 'courses@example.com',
        'age' => 21,
        'stage' => 'Second',
        'image' => UploadedFile::fake()->image('student.png'),
        'courses' => [$first->id, $second->id],
    ])->assertRedirect(route('students.index'))->assertSessionHasNoErrors();

    $student = Student::where('email', 'courses@example.com')->firstOrFail();
    expect($student->courses()->pluck('courses.id')->sort()->values()->all())
        ->toBe([$first->id, $second->id]);
});

it('rejects duplicate student email addresses', function () {
    Storage::fake('public');
    $user = User::factory()->create();
    Student::create([
        'name' => 'Existing Student',
        'email' => 'duplicate@example.com',
        'age' => 19,
        'stage' => 'First',
        'user_id' => $user->id,
    ]);

    $this->actingAs($user)->post(route('students.store'), [
        'name' => 'Another Student',
        'email' => 'duplicate@example.com',
        'age' => 22,
        'stage' => 'Second',
        'image' => UploadedFile::fake()->image('student.jpg'),
    ])->assertSessionHasErrors('email');

    $this->assertDatabaseCount('students', 1);
});

it('rejects unknown courses', function () {
    Storage::fake('public');
    $user = User::factory()->create();

    $this->actingAs($user)->post(route('students.store'), [
        'name' => 'Invalid Course Student',
        'email' => 'invalid-course@example.com',
        'age' => 20,
        'stage' => 'First',
        'image' => UploadedFile::fake()->image('student.jpg'),
        'courses' => [999999],
    ])->assertSessionHasErrors('courses.0');

    $this->assertDatabaseCount('students', 0);
});

it('rejects ages below six', function () {
    Storage::fake('public');
    $user = User::factory()->create();

    $this->actingAs($user)->post(route('students.store'), [
        'name' => 'Too Young',
        'email' => 'young@example.com',
        'age' => 5,
        'stage' => 'First',
        'image' => UploadedFile::fake()->image('student.jpg'),
    ])->assertSessionHasErrors('age');

    $this->assertDatabaseCount('students', 0);
});
