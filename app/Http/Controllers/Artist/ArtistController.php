<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\Follow;
use App\Models\GoldPresent;
use App\Models\Likes;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::id());
        $start_date = date('m-n-1');
        $end_date = date('Y-m-d',strtotime('last day of this month'));

        //present_goldテーブルから アーティストIDに一致した月始から月末までの情報を取得
        $presents_info = GoldPresent::whereBetween('created_at',[$start_date,$end_date])->where('artist_id', Auth::id())->get();

        //月始から月末までのゴールドを加算
        $within_sum_gold = 0;
        foreach($presents_info as $present){
            $within_sum_gold += $present->present_gold;
        }

        return view('artist.dashboard',compact('within_sum_gold'));
    }

    /**
     *  通知リストの処理
     *
     * @return \Illuminate\Http\Response
     */
    public function notification(){
        $presents_collection = GoldPresent::where('artist_id', Auth::id())->get();
        $likes_collection = Likes::where('artist_id', Auth::id())->get();
        $followers_collection = Follow::where('artist_id', Auth::id())->get();

        if($presents_collection->count()){
            foreach($presents_collection as $presents_user){
                $array_users[] = User::where('id', $presents_user->user_id)->get();
                $array_presents[] = $presents_user->present_gold;
            }
        }else {
            $array_users[] = null;
            $array_presents[] = null;
        }


        if($likes_collection->count()){
            foreach($likes_collection as $collection){
                $array_likes[] = User::where('id', $collection->user_id)->get();
                $array_posts[] = Posts::where('id', $collection->post_id)->get();
            }
        }else {
            $array_likes[] = null;
            $array_posts[] = null;
        }

        if($followers_collection->count()){
            foreach($followers_collection as $collection){
                $array_followers[] = User::where('id', $collection->user_id)->get();
            }
        }else {
            $array_followers[] = null;
        }

        // function collectionToArray($collections){
        //     foreach($collections as $collection){
        //         $array_collection[] = User::where('id', $collection->user_id)->get();
        //         return $array_collection;
        //     }
        // }
        // dd($follow_array_collection);

        // $array_likes = collectionToArray($likes_collection);
        // $array_followers = collectionToArray($followers_collection);

        // dd($array_likes);

        return view('artist.notification',compact('array_users','array_presents','array_likes','array_posts','array_followers'));
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
    public function store(Request $request)
    {
        //
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
