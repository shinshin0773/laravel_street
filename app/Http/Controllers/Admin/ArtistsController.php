<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artist; //エロクアント
use Illuminate\Support\Facades\DB; //クエリビルダ
use Carbon\Carbon; //日付ライブラリ

class ArtistsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $artists = Artist::select('name','email','created_at','recognized','id')->paginate(3);
        return view('admin.artists.index',compact('artists'));
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
        Artist::findOrFail($id)->delete();//ソフトデリート

        return redirect()
        ->route('admin.artists.index')
        ->with(['message' => 'アーティスト情報を削除しました',
        'status' => 'alert']);
    }

    /**
     * 管理者がアーティストを公認する
     *
     *
     * @param int $artist_id
     * @param パラメーターの$artist_idから取得したコレクション $artist
     * @return
     */
    public function recognizing($id){
        $artist = Artist::findOrFail($id);
        $artist->recognized = True;

        $artist->save();
        return redirect()
        ->route('admin.artists.index')
        ->with(['message' => 'アーティストを認証しました',
        'status' => 'info']);
    }

    /**
     * 管理者がアーティストを公認を解除する処理
     *
     *
     * @param int $artist_id
     * @param パラメーターの$artist_idから取得したコレクション $artist
     * @return
     */
    public function unrecognizing($id){
        $artist = Artist::findOrFail($id);
        $artist->recognized = False;

        $artist->save();
        return redirect()
        ->route('admin.artists.index')
        ->with(['message' => 'アーティストを認証を解除しました',
        'status' => 'info']);
    }

    public function expiredArtistIndex(){
        $expiredArtists = Artist::onlyTrashed()->get(); //ソフトデリートしたアーティストだけ
        return view('admin.expired-artists', compact('expiredArtists'));
    }

    public function expiredArtistDestroy($id){
        Artist::onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect()
        ->route('admin.expired-artists.index')
        ->with(['message' => 'アーティストを完全に削除しました',
        'status' => 'alert']);
    }
}
