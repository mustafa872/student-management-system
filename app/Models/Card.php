<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Card extends Model
{
    protected $fillable = [
        'card_number',
        'student_id',
    ];

    /**
     * A card belongs to one student.
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
