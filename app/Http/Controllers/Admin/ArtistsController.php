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
        // $date_now = Carbon::now();
        // $date_parse = Carbon::parse(now());
        // echo $date_now;
        // echo $date_parse;
        // echo $date_now->year; //年だけ取得

        // $e_all = Artist::all(); //エロくアントで全て取得
        // $q_get = DB::table('artists')->select('name','created_at')->get(); //nameを指定して取得
        // $q_first = DB::table('artists')->select('name')->first(); //一つ目のデータだけ取ってくる

        // $c_test = collect([
        //     'name' => 'テスト'
        // ]);

         // var_dump($q_first);
        // dd($e_all, $q_get, $q_first, $c_test);
        $artists = Artist::select('name','email','created_at')->get();
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
        //
    }
}
