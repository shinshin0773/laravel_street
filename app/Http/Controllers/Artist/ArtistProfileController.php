<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\ArtistProfile;

class ArtistProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Artist::findOrFail(Auth::id())->artistProfile;
        return view('artist.profile.index',compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artist.profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // バリデーション
        //  $request->validate([
        //     'name' => 'required|string|max:50',
        //     'information' => 'required|string|max:1000',
        //     // 'holding_time' => 'required|date|after:yesterday',
        //     // 'finish_time' => 'required|date|after:holding_time',
        // ]);

        //データベースに保存する処理
        try{
            DB::transaction(function() use($request) {
                //画像アップロード処理
                $dir = 'postImage';

                // アップロードされたファイル名を取得
                $file_name = $request->file('image')->getClientOriginalName();

                $request->file('image')->storeAs('public/' . $dir, $file_name);

                $profile = ArtistProfile::create([
                    'name' => $request->name,
                    'artist_id' => Auth::id(),
                    'information' => $request->information,
                    'sns_account' => $request->sns_account,
                    'file_path' => 'storage/' . $dir . '/' . $file_name ,
                ]);
            });
        }catch(Throwable $e){
            Log::error($e);
            throw $e;
        }

        return redirect()
        ->route('artist.profile.index')
        ->with(['message' => 'プロフィール登録が完了しました',
        'status' => 'info']);

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
        //idに一致する部分だけ
        $profile = ArtistProfile::findOrFail($id);
        return view('artist.profile.edit',compact('profile'));
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
         //画像アップロード処理
        $dir = 'postImage';
        $file_name = $request->image->getClientOriginalName();
        $file_path = 'storage/' . $dir . '/' . $file_name;

        // dd($request);
        $profile = ArtistProfile::findOrFail($id);
        $profile->name = $request->name;
        $profile->information = $request->information;
        $profile->sns_account = $request->sns_account;
        $profile->file_path = $file_path;

        //保存することができる
        $profile->save();

        return redirect()
        ->route('artist.profile.index')
        ->with(['message' => 'プロフィール情報を更新しました。','status' => 'info']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
