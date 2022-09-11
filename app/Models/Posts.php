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


    //スコープ
    public function scopeSortOrder($query, $sortOrder)
    {
        //おすすめ順
        // if($sortOrder === null || $sortOrder === \Constant::SORT_ORDER['recommend']){
        //     return $query->orderBy('RANDOM()');
        //  }
         //新しい順
         if($sortOrder === \Constant::SORT_ORDER['later']){
            return $query->orderBy('posts.created_at', 'desc') ;
         }
         //古い順
         if($sortOrder === \Constant::SORT_ORDER['older']){
            return $query->orderBy('posts.created_at', 'asc') ;
         }
         //開催日時が近い順
         if($sortOrder === \Constant::SORT_ORDER['near']){
            return $query->orderBy('posts.holding_time', 'asc') ;
        }
    }

    public function scopeSearchKeyword($query, $keyword)
    {
        if($keyword)
        {
          //全角スペースを半角に
           $spaceConvert = mb_convert_kana($keyword,'s');

           //空白で区切る
           $keywords = preg_split('/[\s]+/', $spaceConvert,-1,PREG_SPLIT_NO_EMPTY);

           //単語をループで回す
           foreach($keywords as $word)
           {
               //whereは検索
               $query->where('posts.name','like','%'.$word.'%')->orWhere('posts.place','like','%'.$word.'%');
            //    $query->where('posts.place','like','%'.$word.'%');
           }

           return $query;
        } else {
            // dd('nullでした');
            return;
        }
    }
}
