<?php

namespace App\Services;

use App\Models\Student;

class StudentStatisticsService
{
    public function getTotalStudents(): int
    {
        return Student::count();
    }

    public function getFirstStageStudents(): int
    {
        return Student::where('stage', 'First')->count();
    }
}
