<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoldPresent extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'artist_id',
        'present_gold'
    ];
}
