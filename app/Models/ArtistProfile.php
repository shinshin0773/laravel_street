<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Artist;
use App\Models\Posts;
use Illuminate\Support\Facades\Auth;

class ArtistProfile extends Model
{
    use HasFactory;

    // public function __construct()
    // {
    //     $this->middleware('auth:artists');

    //     $this->middleware(function ($request, $text) {
    //         // dd($request->route()->parameter('shop')); //文字列
    //         // dd(Auth::id()); //数字
    //         $this->middleware(function($request, $next){
    //             $id = $request->route()->parameter('artists'); //shopのid取得
    //             if(!is_null($id)){ // null判定
    //                 $ArtistProfileId = ArtistProfile::findOrFail($id)->artist->id;
    //                 $profileId = (int)$ArtistProfileId; // キャスト 文字列→数値に型変換
    //                 $artistId = Auth::id();
    //                 if($profileId !== $artistId){ // 同じでなかったら
    //                 abort(404); // 404画面表示
    //             }
    //             }
    //             return $next($request);
    //             });
    //         return $text($request);
    //     });
    // }

    protected $fillable = [
        'id',
        'artist_id',
        'name',
        'information',
        'sns_account',
        'file_path',
        'created_at',
        'updated_at',
    ];

    public function artist()
    {
        return $this->belongsTo(Artist::class); //紐づいているモデルを取得する
    }

    public function posts()
    {
        return $this->hasMany(Posts::class); //紐づいているモデルを取得する
    }
}
