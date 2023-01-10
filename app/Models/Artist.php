<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable; //  ここ
use App\Models\ArtistProfile;
use App\Models\User;

class Artist extends Authenticatable
{
    use HasFactory, SoftDeletes,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'userId',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function artistProfile()
    {
        return $this->hasOne(ArtistProfile::class); //紐づいているモデルを取得する
    }

    public function user()
    {
        return $this->belongsToMany(User::class,'gold_presents')->withPivot(['user_id','present_gold','created_at']);
    }
}
