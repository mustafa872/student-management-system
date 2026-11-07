<?php

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

it('redirects guests away from the students index', function () {
    $this->get(route('students.index'))->assertRedirect(route('login'));
});

it('allows authenticated unblocked users to view the students index', function () {
    $user = User::factory()->create();

    $this->actingAs($user)->get(route('students.index'))->assertOk();
});

it('prevents blocked users from creating students', function () {
    Storage::fake('public');
    $user = User::factory()->create();
    $user->forceFill(['is_blocked' => true])->save();

    $this->actingAs($user)->post(route('students.store'), [
        'name' => 'Blocked Student',
        'email' => 'blocked@example.com',
        'age' => 20,
        'stage' => 'First',
        'image' => UploadedFile::fake()->image('blocked.jpg'),
    ])->assertForbidden();

    $this->assertDatabaseCount('students', 0);
});

it('prevents blocked users from reading the students index', function () {
    $user = User::factory()->create();
    $user->forceFill(['is_blocked' => true])->save();

    $this->actingAs($user)->get(route('students.index'))->assertForbidden();
});

it('allows an admin to update another users student', function () {
    $owner = User::factory()->create();
    $admin = User::factory()->create();
    $admin->forceFill(['is_admin' => true])->save();
    $student = Student::create([
        'name' => 'Before Admin Update',
        'email' => 'admin-update@example.com',
        'age' => 20,
        'stage' => 'First',
        'user_id' => $owner->id,
    ]);

    $this->actingAs($admin)->put(route('students.update', $student), [
        'name' => 'After Admin Update',
        'email' => $student->email,
        'age' => $student->age,
        'stage' => $student->stage,
    ])->assertRedirect(route('students.index'));

    expect($student->fresh()->name)->toBe('After Admin Update');
});

it('prevents blocked admins from updating students', function () {
    $owner = User::factory()->create();
    $blockedAdmin = User::factory()->create();
    $blockedAdmin->forceFill([
        'is_admin' => true,
        'is_blocked' => true,
    ])->save();
    $student = Student::create([
        'name' => 'Before Attempt',
        'email' => 'blocked-admin@example.com',
        'age' => 20,
        'stage' => 'First',
        'user_id' => $owner->id,
    ]);

    $this->actingAs($blockedAdmin)->put(route('students.update', $student), [
        'name' => 'After Attempt',
        'email' => $student->email,
        'age' => $student->age,
        'stage' => $student->stage,
    ])->assertForbidden();

    expect($student->fresh()->name)->toBe('Before Attempt');
});
