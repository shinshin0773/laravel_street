<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Follow;
use App\Models\Posts;
use App\Models\User;

class FollowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //フォロー処理
    public function follow($id)
    {
        Follow::create([
            'user_id' => Auth::id(),
            'artist_id' => $id,
        ]);

        return redirect()->back();
    }

    //フォローを外す処理
    public function unfollow($id)
    {
        //GetのアーティストIDと自分のユーザーIDが一致しているものを取得
        $follow = Follow::where('artist_id',$id)->where('user_id', Auth::id())->first();

        //削除
        $follow->delete();

        return redirect()->back();
    }

    public function index()
    {
        // $user = User::findOrFail(Auth::id());
        // $artists = $user->followArtist;

        //自分がフォローしているアーティストのIDを取得
        $followArtistsId = Follow::where('user_id', Auth::id())->get();

        //フォロー中のアーティストIDと一致した投稿を取得
        $followArtistPosts = $followArtistsId->map(function ($item, $key) {
            $posts =  Posts::where('artist_profile_id', $item->artist_id)->get();
            return $posts;
        });

        return view('user.followList',compact('followArtistPosts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
