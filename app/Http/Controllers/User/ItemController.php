<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;

class ItemController extends Controller
{
    //formで渡ってきた検索順をRequestで受け取る
    public function index(Request $request)
    {
        // dd($request->keyword);
        //全件取得
        $posts = Posts::sortOrder($request->sort)
        ->searchKeyword($request->keyword)
        ->get();
        // dd($posts);
        return view('user.index', compact('posts'));
    }

    //ルートパラメーターで$idが入ってくる
    public function show($id)
    {
        //一つだけ取得
        $post = Posts::findOrFail($id);

        return view('user.show', compact('post'));
    }
}
