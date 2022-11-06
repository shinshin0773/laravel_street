<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Posts;
use App\Models\User;
use App\Models\Likes;


class ItemController extends Controller
{
    //formで渡ってきた検索順をRequestで受け取る
    public function index(Request $request)
    {
        // dd($request->keyword);
        //全件取得
        $posts = Posts::sortOrder($request->sort)
        ->searchKeyword($request->keyword)
        ->searchDate($request->holdingDate)
        ->paginate(8);

        return view('user.index', compact('posts'));
    }

    //ルートパラメーターで$idが入ってくる
    public function show($id, $artist_id)
    {
        //一つだけ取得
        $post = Posts::findOrFail($id);

        $like = Likes::where('post_id', $id)->where('user_id', Auth::id())->first();

        $follow = Follow::where('artist_id', $artist_id)->where('user_id', Auth::id())->first();

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

        // $lat = $post->lat;
        // $lng = $post->lng;

        return view('user.placeMap',compact('posts'));
    }

    //いいねした時
    public function like($id)
    {
        $post = Posts::findOrFail($id);

        $post->like = $post->like + 1;

        $post->save();

        Likes::create([
            'user_id' => Auth::id(),
            'artist_profile_id' => $id,
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
