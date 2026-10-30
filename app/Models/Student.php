<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'age',
        'stage',
        'image',
        'user_id',
    ];

    /**
     * A student has one card.
     */
    public function card(): HasOne
    {
        return $this->hasOne(Card::class);
    }

    /**
     * A student has many books.
     */
    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }

    /**
     * A student belongs to many courses.
     */
    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class);
    }

    /**
     * A student belongs to one user (creator).
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
