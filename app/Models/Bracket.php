<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bracket extends Model
{
    public $fillable = [
        // 'id',
        'name',
        'lower_limit',
        'upper_limit',
    ];
}
