<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    public $fillable = [
        // 'id',
        'first_name',
        'last_name',
        'country',
    ];
}
