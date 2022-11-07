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
    public function follow($id)
    {
        Follow::create([
            'user_id' => Auth::id(),
            'artist_id' => $id,
        ]);

        // $artist_name = User::find(1)->followArtist()->orderBy('name')->get();

        // dd($artist_name);

        // $user = User::find(1);

        // $follows = $user->followArtist->all();

        // foreach($follows as $follow) {
        //     dd($follow);
        //     dd(Posts::where('artist_id',$follow)->get());
        // }

        return redirect()->back();
    }

    //フォローを外す処理
    public function unfollow($id)
    {
        $follow = Follow::where('artist_id',$id)->where('user_id', Auth::id())->first();
        $follow->delete();

        return redirect()->back();
    }

    public function index()
    {
        $user = User::findOrFail(Auth::id());
        $artists = $user->followArtist;

        // dump($artists);

        // foreach($artists as $artist){
        //     dump($artist->id);
        // }
        // $user = User::findOrFail(Auth::id());
        // $followArtists = $user->followArtist;

        $followArtistsId = Follow::where('user_id', Auth::id())->get();
        // dump($followArtists->)
        // dd($followArtistsId);

        // $timeLinePost = Posts::where('artist_profile_id', $followArtistsId)->get();

        // $timeLinePost = [];

        $timeLinePost = $followArtistsId->map(function ($item, $key) {
            $posts =  Posts::where('artist_profile_id', $item->artist_id)->get();
            return $posts;
        });

        // dd($timeLinePost);

        // list($followPosts , $keys ) = $timeLinePost;
        // dd($followArtists

        // $arrayKey = array_keys($keys);
        // foreach($posts as $post){
        //     // dd($posts[$keys][0]['name']);
        //     foreach($keys as $key){
        //         dd($key[0]);
        //     }
        // }

        // // dump($timeLinePost->values());
        // $followPosts = $timeLinePost->map(function ($item, $key) {
        //     $posts = $item[$key];
        //     return $posts;
        // });
        // dd($timeLinePost->toArray()[0][0]);
        // foreach($timeLinePost as $post){
        //     // dump($post[0]['artist_profile_id']);
        //     // dump($post[0]['information']);
        //     // $post_id = $post[0]['post_id'];
        //     // $artist_profile_id = $post[0]['artist_profile_id'];
        // }
        return view('user.followList',compact('timeLinePost'));
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
