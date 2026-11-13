<?php

namespace App\Listeners;

use App\Events\StudentCreated;
use App\Models\User;
use App\Notifications\StudentCreatedNotification;

class NotifyAdmin
{
    public function handle(StudentCreated $event): void
    {
        // Find all unblocked administrators.
        $admins = User::query()
            ->where('is_admin', true)
            ->where('is_blocked', false)
            ->get();

        // Send each administrator a notification.
        foreach ($admins as $admin) {
            $admin->notify(
                new StudentCreatedNotification($event->student)
            );
        }
    }
}
