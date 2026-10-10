<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Card;
use App\Models\Book;

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
    public function card()
    {
        return $this->hasOne(Card::class);
    }
    public function books()
    {
        return $this->hasMany(Book::class);
    }
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
