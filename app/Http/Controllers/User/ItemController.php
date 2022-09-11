<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;

class ItemController extends Controller
{
    public function index()
    {
        //全件取得
        $posts = Posts::all();
        // dd($posts);
        return view('user.index', compact('posts'));
    }
}
