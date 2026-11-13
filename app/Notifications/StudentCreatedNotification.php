<?php

namespace App\Notifications;

use App\Models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class StudentCreatedNotification extends Notification
{
    use Queueable;

    public function __construct(
        public Student $student
    ) {}

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'New Student Created',
            'message' => 'A new student has been added.',
            'student_id' => $this->student->id,
            'student_name' => $this->student->name,
            'created_by' => $this->student->user_id,
        ];
    }
}
