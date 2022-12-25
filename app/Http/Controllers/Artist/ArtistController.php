<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\GoldPresent;
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
