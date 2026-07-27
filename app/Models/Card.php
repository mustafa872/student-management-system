<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Card extends Model
{
    protected $fillable = [
        'card_number',
        'student_id',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
