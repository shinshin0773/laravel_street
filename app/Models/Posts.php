<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ArtistProfile;

class Posts extends Model
{
    use HasFactory;

    public function artistProfile()
    {
        return $this->belongsTo(ArtistProfile::class); //紐づいているモデルを取得する
    }
}
