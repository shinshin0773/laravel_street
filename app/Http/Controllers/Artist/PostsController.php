<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use App\Models\ArtistProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Posts;

use function Symfony\Component\String\s;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $text) {
            // dd($request->route()->parameter('shop')); //文字列
            // dd(Auth::id()); //数字
            $this->middleware(function($request, $next){
                $id = $request->route()->parameter('artists'); //shopのid取得
                if(!is_null($id)){ // null判定
                    $ArtistProfileId = Posts::findOrFail($id)->artistprofile->artist->id;
                    $profileId = (int)$ArtistProfileId; // キャスト 文字列→数値に型変換
                    $artistId = Auth::id();
                    if($profileId !== $artistId){ // 同じでなかったら
                    abort(404); // 404画面表示
                }
                }
                return $next($request);
                });
            return $text($request);
        });


    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ログインしているアーティストが作っているPostsが全権取得できる
        $posts = Artist::findOrFail(Auth::id())->artistProfile->Posts;
        // dd($posts);

        return view('artist.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artist_profile = ArtistProfile::where('artist_id', Auth::id())
        ->select('id','name')
        ->get();


        return view('artist.posts.create',
        compact('artist_profile'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $now_date = now()->format('Y-m-d H:i:s');
        // バリデーション
        $request->validate([
            // 'name' => 'required|string|max:50',
            // 'information' => 'required|string|max:1000',
            // 'holding_time' => 'required|date|after:${now_date}',
            // // 'finish_time' => 'after:"now"',
        ]);


        // $file_path = 'storage/' . $dir . '/' .$file_name;

        //データベースに保存する処理
        try{
            DB::transaction(function() use($request) {

                // dd($request->file());
                //画像アップロード処理
                $dir = 'postImage';

                // アップロードされたファイル名を取得
                $file_name = $request->file('image')->getClientOriginalName();

                $request->file('image')->storeAs('public/' . $dir, $file_name);
                $post = Posts::create([
                    'name' => $request->name,
                    'artist_profile_id' => $request->profile_id,
                    'information' => $request->information,
                    'place' => $request->place,
                    'lat' => $request->lat,
                    'lng' => $request->lng,
                    'holding_time' => $request->holdingTime,
                    'finish_time' => $request->finishTime,
                    'file_path' => 'storage/' . $dir . '/' . $file_name ,
                ]);
            });
        }catch(Throwable $e){
            Log::error($e);
            throw $e;
        }

        return redirect()
        ->route('artist.posts.index')
        ->with(['message' => '投稿が完了しました。',
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
        Posts::findOrFail($id)->delete();

        return redirect()
        ->route('artist.posts.index')
        ->with(['message' => '投稿を削除しました。',
        'status' => 'alert']);
    }
}
