<?php

namespace App\Http\Controllers\User;

use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use App\Models\Follow;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;


class UserProfileController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ユーザー情報取得
        $profile = Auth::user();

        return view('user.profile.index',compact('profile'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //プロフィール画像アップロード
        $dir = 'userProfile';
        $file_name = $request->image->getClientOriginalName();
        $file_path = 'storage/' . $dir . '/' . $file_name;
        $request->file('image')->storeAs('public/' . $dir, $file_name);

        $user = Auth::user();

        //更新
        $user->sns_account = $request->twitter_account;
        $user->information = $request->information;
        $user->file_path = $file_path;
        $user->save();

        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $profile = Auth::user();
        return view('user.profile.edit',compact('profile'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         //画像アップロード処理
         $dir = 'userProfile';
         $file_name = $request->image->getClientOriginalName();
         $file_path = 'storage/' . $dir . '/' . $file_name;

         // dd($request);
         $profile = Auth::user();
         $profile->name = $request->name;
         $profile->information = $request->information;
         $profile->sns_account = $request->sns_account;
         $profile->file_path = $file_path;

         //保存することができる
         $profile->save();

         return redirect()
         ->route('user.profile.index')
         ->with(['message' => 'プロフィール情報を更新しました。','status' => 'info']);
    }


    /**
     * ポイント購入ページ
     *
     * @return \Illuminate\Http\Response
     */
    public function showPoint()
    {
        $user = Auth::user();
        $user_gold = $user->gold;

        return view('user.showPoint',compact('user_gold'));
    }

    /**
     * 単発決済用のコード
     *
     * @return \Illuminate\Http\Response
     */
    public function charge(Request $request)
    {
        $user = Auth::user();

        //決済処理のプログラム
        try {
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            $customer = Customer::create(array(
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken
            ));

            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => $request->money,
                'currency' => 'jpy'
            ));

            //ゴールドを加算する
            $user->gold = $user->gold + $request->gold;
            $user->save();

            return back()
            ->with(['message' => "{$request->gold}Gold加算されました",
            'status' => 'info']);
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * ユーザーの通知確認のページ
     *
     * @return \Illuminate\Http\Response
     */
    public function notification()
    {
        //自分がフォローしているアーティストのIDを取得
        $followArtistsId = Follow::where('user_id', Auth::id())->get();

        if($followArtistsId->count()){
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
            //フォロー中のアーティストの投稿を投稿日時が最新順で取得
            array_multisort( array_map( "strtotime", array_column( $followArtistPostsList, "created_at" ) ), SORT_DESC, $followArtistPostsList ) ;
        }else {
            $followArtistPostsList = null;
        }



        return view('user.notification',compact('followArtistPostsList'));
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
