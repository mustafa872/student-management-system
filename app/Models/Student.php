<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Card;

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
}
