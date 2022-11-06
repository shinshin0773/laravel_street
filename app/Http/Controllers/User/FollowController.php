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
        // }

        return redirect()->back();
    }

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

        // $followArtists = Follow::where('user_id', Auth::id())->get();
        // dump($followArtists->)
        // dd($followArtistsId);

        // $timeLinePost = Posts::where('artist_profile_id', $followArtistsId)->get();

        // $timeLinePost = [];

        // foreach($followArtistsId as $followArtistId){
        //     $artist_id = $followArtistId->artist_id;
        //     dump(Posts::where('artist_profile_id', $artist_id)->get());
        // }

        $timeLinePost = $artists;
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
