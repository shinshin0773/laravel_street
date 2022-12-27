<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ArtistProfile;
use App\Models\Follow;
use App\Models\GoldPresent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Posts;
use App\Models\User;
use App\Models\Likes;


class ItemController extends Controller
{
    public function __construct()
    {
      //終了時刻になったら投稿を削除する
      $now_date = now()->format('Y-m-d H:i:s');
      Posts::where('finish_time', '<=', $now_date)->delete();
    }

    //formで渡ってきた検索順をRequestで受け取る
    public function index(Request $request)
    {
        //指定されたパラメーターを取得
        $params = $request->all();
        //全件取得
        $posts = Posts::sortOrder($request->sort)
        ->searchKeyword($request->keyword)
        ->searchDate($request->holdingDate)
        ->paginate(8);

        $holdingDate = $request->holdingDate;

        return view('user.index', compact('posts','params','holdingDate'));
    }

    //ルートパラメーターで$idが入ってくる
    public function show($id, $artist_id)
    {
        //一つだけ取得
        $post = Posts::findOrFail($id);

        //パラメータで取得したポストを自分がいいねしているか確認
        $like = Likes::where('post_id', $id)->where('user_id', Auth::id())->first();

        //パラメータで取得したポストを自分がフォローしているか確認
        $follow = Follow::where('artist_id', $artist_id)->where('user_id', Auth::id())->first();

        //いいね数をカウント
        $likeCount = Likes::where('post_id', $id)->count();

        //Likesテーブルに指定のポストIDとログイン中のユーザーIDがあれば
        $likeCheck = false;
        if($like) {
            $likeCheck = true;
        } else {
            $likeCheck = false;
        }

        //Followテーブルに指定のアーティストIDとログイン中のユーザーIDがあれば
        $followCheck = false;
        if($follow) {
            $followCheck = true;
        } else {
            $followCheck = false;
        }

        return view('user.show', compact('post','likeCheck','likeCount','followCheck'));
    }

    public function showMap($id)
    {
        //一つだけ取得
        $post = Posts::findOrFail($id);

        $lat = $post->lat;
        $lng = $post->lng;

        return view('user.showMap',compact('lat','lng'));
    }

    public function placeMap()
    {
        // //一つだけ取得
        $posts = Posts::all();

        return view('user.placeMap',compact('posts'));
    }

    //ユーザーがアーティストに投げ銭をした時
    public function present(Request $request)
    {
        $user = Auth::user();

        if($user->gold >= $request->gold){
            GoldPresent::create([
                'user_id' => Auth::id(),
                'artist_id' => $request->artist_id,
                'present_gold' => $request->gold,
            ]);

            //ユーザーのゴールドを減らす
            $user->gold = $user->gold - $request->gold;
            $user->save();

            return back()
            ->with(['message' => "アーティストに対して{$request->gold}Goldプレゼントしました。",
            'status' => 'info']);
        }else {
            return back()
            ->with(['message' => "ゴールドが足りませんでした。ゴールドを購入してください",
            'status' => 'alert']);
        }

    }

    //いいねした時
    public function like(Request $request,$id)
    {
        // dd($request->artist_id);
        $post = Posts::findOrFail($id);

        $post->like = $post->like + 1;

        $post->save();

        Likes::create([
            'user_id' => Auth::id(),
            'post_id' => $id,
            'artist_id' => $request->artist_id,
          ]);

        return redirect()
        ->back();
    }

    //いいねを解除した時
    public function unlike($id)
    {
        $post = Posts::findOrFail($id);

        $post->like = $post->like - 1;

        $post->save();

        $like = Likes::where('post_id', $id)->where('user_id', Auth::id())->first();
        $like->delete();

        return redirect()->back();
    }

}
