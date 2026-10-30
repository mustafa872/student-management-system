<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'pages',
        'student_id',
    ];

    /**
     * A book belongs to one student.
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
