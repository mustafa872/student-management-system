<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    protected $fillable = [
        'name',
    ];

    /**
     * A course belongs to many students.
     */
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class);
    }
}
