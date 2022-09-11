<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ArtistProfile;

class Posts extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'artist_profile_id',
        'name',
        'information',
        'place',
        'holding_time',
        'finish_time',
        'file_path',
        'created_at',
        'updated_at',
    ];

    public function artistProfile()
    {
        return $this->belongsTo(ArtistProfile::class); //紐づいているモデルを取得する
    }
}
