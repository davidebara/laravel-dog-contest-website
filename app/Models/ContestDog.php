<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContestDog extends Model
{
    protected $table = 'contests_dogs';

    protected $fillable = [
        'dog_id', 'contest_id',
    ];

    // You can add additional methods or configuration here
}