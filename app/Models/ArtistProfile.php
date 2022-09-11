<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Artist;
use App\Models\Posts;

class ArtistProfile extends Model
{
    use HasFactory;

    public function artist()
    {
        return $this->belongsTo(Artist::class); //紐づいているモデルを取得する
    }

    public function posts()
    {
        return $this->hasMany(Posts::class); //紐づいているモデルを取得する
    }
}
