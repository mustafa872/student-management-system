<?php

use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

it('allows an owner to update a student without changing their email or image', function () {
    $owner = User::factory()->create();
    $student = Student::create([
        'name' => 'Original Name',
        'email' => 'original@example.com',
        'age' => 20,
        'stage' => 'First',
        'image' => 'students/old.png',
        'user_id' => $owner->id,
    ]);

    $this->actingAs($owner)->put(route('students.update', $student), [
        'name' => 'Updated Name',
        'email' => $student->email,
        'age' => 20,
        'stage' => 'First',
    ])->assertRedirect(route('students.index'))->assertSessionHasNoErrors();

    $student->refresh();
    expect($student->name)->toBe('Updated Name');
    expect($student->image)->toBe('students/old.png');
});

it('prevents another user from updating a student', function () {
    $owner = User::factory()->create();
    $other = User::factory()->create();
    $student = Student::create([
        'name' => 'Protected Name',
        'email' => 'protected@example.com',
        'age' => 20,
        'stage' => 'First',
        'user_id' => $owner->id,
    ]);

    $this->actingAs($other)->put(route('students.update', $student), [
        'name' => 'Unauthorized Change',
        'email' => $student->email,
        'age' => 20,
        'stage' => 'First',
    ])->assertForbidden();

    expect($student->fresh()->name)->toBe('Protected Name');
});

it('rejects changing a student email to another student email', function () {
    $owner = User::factory()->create();
    $student = Student::create([
        'name' => 'First Student',
        'email' => 'first@example.com',
        'age' => 20,
        'stage' => 'First',
        'user_id' => $owner->id,
    ]);
    Student::create([
        'name' => 'Second Student',
        'email' => 'second@example.com',
        'age' => 21,
        'stage' => 'Second',
        'user_id' => $owner->id,
    ]);

    $this->actingAs($owner)->put(route('students.update', $student), [
        'name' => 'Changed Name',
        'email' => 'second@example.com',
        'age' => 20,
        'stage' => 'First',
    ])->assertSessionHasErrors('email');

    expect($student->fresh()->email)->toBe('first@example.com');
});

it('synchronizes selected courses when updating a student', function () {
    $owner = User::factory()->create();
    $student = Student::create([
        'name' => 'Course Student',
        'email' => 'sync@example.com',
        'age' => 20,
        'stage' => 'First',
        'user_id' => $owner->id,
    ]);
    $first = Course::create(['name' => 'First Course']);
    $second = Course::create(['name' => 'Second Course']);
    $third = Course::create(['name' => 'Third Course']);
    $student->courses()->sync([$first->id, $second->id]);

    $this->actingAs($owner)->put(route('students.update', $student), [
        'name' => $student->name,
        'email' => $student->email,
        'age' => $student->age,
        'stage' => $student->stage,
        'courses' => [$second->id, $third->id],
    ])->assertRedirect(route('students.index'));

    expect($student->courses()->pluck('courses.id')->sort()->values()->all())
        ->toBe([$second->id, $third->id]);
});

it('replaces the student image and removes the old file', function () {
    Storage::fake('public');
    Storage::disk('public')->put('students/old.png', 'old image');
    $owner = User::factory()->create();
    $student = Student::create([
        'name' => 'Image Student',
        'email' => 'image@example.com',
        'age' => 20,
        'stage' => 'First',
        'image' => 'students/old.png',
        'user_id' => $owner->id,
    ]);

    $this->actingAs($owner)->put(route('students.update', $student), [
        'name' => $student->name,
        'email' => $student->email,
        'age' => $student->age,
        'stage' => $student->stage,
        'image' => UploadedFile::fake()->image('replacement.jpg'),
    ])->assertRedirect(route('students.index'));

    $newPath = $student->fresh()->image;
    expect($newPath)->not->toBe('students/old.png');
    Storage::disk('public')->assertExists($newPath);
    Storage::disk('public')->assertMissing('students/old.png');
});
