<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Films extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'synopsis',
        'director',
        'release_date',
        'country'
    ];
    protected $casts = [
        'release_date' => 'date:d-m-Y'
    ];
}
