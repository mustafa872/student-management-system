<?php

namespace App\Listeners;

use App\Events\StudentCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class LogStudentCreation implements ShouldQueue
{
    public function handle(StudentCreated $event): void
    {
        $student = $event->student;

        Log::info('A new student was created', [
            'student_id' => $student->id,
            'student_name' => $student->name,
            'created_by' => $student->user_id,
        ]);
    }
}
