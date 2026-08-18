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
    ];
    public function card()
    {
        return $this->hasOne(Card::class);
    }
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
