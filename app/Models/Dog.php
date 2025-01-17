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
        'weight',
        'owner_id',
        'image',
        'description',
        'verification',
    ];
}
