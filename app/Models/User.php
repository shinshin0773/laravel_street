<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Posts;
use App\Models\Artist;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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

    public function posts()
    {
        //->withPivotで中間テーブルのid,quantityも取得できる
        // 第2引数で中間テーブル名
        // 中間テーブルのカラム取得
        // デフォルトでは関連付けるカラム(user_idと product_id)のみ取得
        return $this->belongsToMany(Posts::class, 'likes')
        ->withPivot(['id']);
    }

    public function followArtist()
    {
        return $this->belongsToMany(Artist::class, 'follows')->withPivot(['created_at']);
    }


    //belongsToMany()第二引数に中間テーブル名
    public function artist()
    {
        return $this->belongsToMany(Artist::class,'gold_presents')->withPivot(['artist_id','present_gold','created_at']);
    }
}
