<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Follow;
use App\Models\Posts;
use App\Models\ArtistProfile;
use App\Models\User;
use Illuminate\Database\Console\DumpCommand;

class FollowController extends Controller
{
    public function index()
    {
        // $user = User::findOrFail(Auth::id());
        // $artists = $user->followArtist;

        //自分がフォローしているアーティストのIDを取得
        $followArtistsId = Follow::where('user_id', Auth::id())->get();



       if($followArtistsId->count()){
           //フォロー中のアーティストのプロフィール情報を取得
            $followArtistProfileList = $followArtistsId->map(function ($item, $key) {
                $profiles =  ArtistProfile::where('artist_id', $item->artist_id)->get();
                return $profiles;
            });

            for($i=0; $i < count($followArtistProfileList); $i++){
                    $followArtistProfiles[] = $followArtistProfileList[$i][0];
                    // $collProfile = collect($followArtistProfiles[$i]);
                    // $followArtistProfiles = $this->paginate($collProfile, 2,null, ['path'=>'/followList']);
             }

            //フォロー中のアーティストIDと一致した投稿を取得
            $followArtistPosts = $followArtistsId->map(function ($item, $key) {
                $posts =  Posts::where('artist_profile_id', $item->artist_id)->get();
                return $posts;
            });
            for($i=0; $i < count($followArtistPosts); $i++){
                    for($j = 0; $j < count($followArtistPosts[$i]); $j++){
                        $followArtistPostsList[] = $followArtistPosts[$i][$j];
                    }
            }
            array_multisort( array_map( "strtotime", array_column( $followArtistPostsList, "holding_time" ) ), SORT_ASC, $followArtistPostsList ) ;

            //配列をコレクション型に変更してページネーションをできるようにする
            $coll = collect($followArtistPostsList);
            $posts = $this->paginate($coll, 8,null, ['path'=>'/followList']);
        }else {
            $posts = null;
            $followArtistProfiles = null;
        }


        return view('user.followList',compact('posts','followArtistProfiles'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //フォロー処理
    public function follow($id)
    {
        $information = Follow::create([
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
        $follow->delete();

        return redirect()->back();
    }



    private function paginate($items, $perPage , $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
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
        $artist_profile = ArtistProfile::findOrFail($id);
        // dd($artist_profile['name']);
        return view('user.artistProfile',compact('artist_profile'));
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
