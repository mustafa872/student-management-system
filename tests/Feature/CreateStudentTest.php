<?php

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

it('creates a student without courses', function () {

    Storage::fake('public');

    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(
        route('students.store'),
        [
            'name' => 'Test Student',
            'email' => 'student@example.com',
            'age' => 20,
            'stage' => 'First',
            'image' => UploadedFile::fake()->image('student.jpg'),
        ]
    );

    $response->assertRedirect(route('students.index'));

    $this->assertDatabaseHas('students', [
        'name' => 'Test Student',
        'email' => 'student@example.com',
        'user_id' => $user->id,
    ]);
});

it('rejects duplicate student emails', function () {

    Storage::fake('public');

    $user = User::factory()->create();

    \App\Models\Student::create([
        'name' => 'First Student',
        'email' => 'duplicate@example.com',
        'age' => 20,
        'stage' => 'First',
        'user_id' => $user->id,
    ]);

    $response = $this->actingAs($user)
        ->from(route('students.create'))
        ->post(route('students.store'), [
            'name' => 'Second Student',
            'email' => 'duplicate@example.com',
            'age' => 22,
            'stage' => 'Second',
            'image' => UploadedFile::fake()->image('student.jpg'),
        ]);

    $response->assertSessionHasErrors('email');

    $this->assertDatabaseCount('students', 1);
});

it('prevents blocked users from creating students', function () {

    Storage::fake('public');

    $user = User::factory()->create([
        'is_blocked' => true,
    ]);

    $response = $this->actingAs($user)
        ->post(route('students.store'), [
            'name' => 'Blocked Test',
            'email' => 'blocked.student@example.com',
            'age' => 20,
            'stage' => 'First',
            'image' => UploadedFile::fake()->image('student.jpg'),
        ]);

    $response->assertForbidden();

    $this->assertDatabaseCount('students', 0);
});
