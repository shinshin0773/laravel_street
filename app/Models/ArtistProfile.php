<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Artist;

class ArtistProfile extends Model
{
    use HasFactory;

    public function artist()
    {
        return $this->belongsTo(Artist::class); //紐づいているモデルを取得する
    }
}
