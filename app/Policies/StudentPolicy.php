<?php

namespace App\Policies;

use App\Models\Student;
use App\Models\User;

class StudentPolicy
{
    /**
     * Allow authenticated users to view the students list.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Allow authenticated users to view student details.
     */
    public function view(User $user, Student $student): bool
    {
        return true;
    }

    /**
     * Allow authenticated users to create students.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Only the student owner can update the student.
     */
    public function update(User $user, Student $student): bool
    {
        return $user->id === $student->user_id;
    }

    /**
     * Only the student owner can delete the student.
     */
    public function delete(User $user, Student $student): bool
    {
        return $user->id === $student->user_id;
    }

    public function restore(User $user, Student $student): bool
    {
        return false;
    }

    public function forceDelete(User $user, Student $student): bool
    {
        return false;
    }
}
