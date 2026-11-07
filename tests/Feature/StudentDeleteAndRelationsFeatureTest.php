<?php

use App\Models\Book;
use App\Models\Card;
use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

it('prevents nonowners from deleting students', function () {
    $owner = User::factory()->create();
    $other = User::factory()->create();
    $student = Student::create([
        'name' => 'Protected Student',
        'email' => 'not-deleted@example.com',
        'age' => 20,
        'stage' => 'First',
        'user_id' => $owner->id,
    ]);

    $this->actingAs($other)->delete(route('students.destroy', $student))
        ->assertForbidden();

    $this->assertDatabaseHas('students', ['id' => $student->id]);
});

it('allows the owner to delete a student and their image', function () {
    Storage::fake('public');
    Storage::disk('public')->put('students/deleted.png', 'image bytes');
    $owner = User::factory()->create();
    $student = Student::create([
        'name' => 'Deleted Student',
        'email' => 'delete@example.com',
        'age' => 20,
        'stage' => 'First',
        'image' => 'students/deleted.png',
        'user_id' => $owner->id,
    ]);

    $this->actingAs($owner)->delete(route('students.destroy', $student))
        ->assertRedirect(route('students.index'));

    $this->assertDatabaseMissing('students', ['id' => $student->id]);
    Storage::disk('public')->assertMissing('students/deleted.png');
});

it('loads the student card books and courses on the show page', function () {
    $user = User::factory()->create();
    $student = Student::create([
        'name' => 'Relations Student',
        'email' => 'relations@example.com',
        'age' => 20,
        'stage' => 'Second',
        'user_id' => $user->id,
    ]);
    Card::create(['student_id' => $student->id, 'card_number' => 'CARD-100']);
    Book::create([
        'student_id' => $student->id,
        'title' => 'Laravel Basics',
        'author' => 'Test Author',
        'pages' => 100,
    ]);
    $course = Course::create(['name' => 'Database Fundamentals']);
    $student->courses()->attach($course->id);

    $this->actingAs($user)->get(route('students.show', $student))
        ->assertOk()
        ->assertSee('Relations Student')
        ->assertSee('CARD-100')
        ->assertSee('Laravel Basics')
        ->assertSee('Database Fundamentals');
});

it('deletes dependent card and book records with a student', function () {
    $owner = User::factory()->create();
    $student = Student::create([
        'name' => 'Dependent Student',
        'email' => 'dependent@example.com',
        'age' => 20,
        'stage' => 'Second',
        'user_id' => $owner->id,
    ]);
    $card = Card::create(['student_id' => $student->id, 'card_number' => 'CARD-200']);
    $book = Book::create([
        'student_id' => $student->id,
        'title' => 'Testing',
        'author' => 'Test Author',
        'pages' => 50,
    ]);

    $this->actingAs($owner)->delete(route('students.destroy', $student))
        ->assertRedirect(route('students.index'));

    $this->assertDatabaseMissing('cards', ['id' => $card->id]);
    $this->assertDatabaseMissing('books', ['id' => $book->id]);
});
