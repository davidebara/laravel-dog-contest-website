<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    public $fillable = [
        // 'id',
        'name',
        'birth_year',
        'owner_id',
        'image',
        'description',
    ];
}
