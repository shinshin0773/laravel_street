<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable; //  ここ

class Follow extends Model
{
    use HasFactory,Notifiable;

    protected $fillable = [
        'user_id',
        'artist_id'
    ];

    public function users(){
        return $this->hasMany(User::class);
    }
}
