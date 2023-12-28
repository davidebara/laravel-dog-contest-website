<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    public $fillable = [
        // 'id',
        'name',
        'date',
        'prize',
        'bracket_id'
    ];

    public function bracket()
    {
        return $this->belongsTo(Bracket::class);
    }

    public function dogs()
    {
        return $this->belongsToMany(Dog::class, 'contests_dogs');
    }

}
