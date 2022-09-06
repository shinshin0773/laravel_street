<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{
    //user.loginなどは Prodviders/RouteServiceProviderから取ってきている
    protected $user_route = 'user.login';
    protected $artist_route = 'artist.login';
    protected $admin_route = 'admin.login';

    /**
     * もし認証されていない場合にリダイレクトする処理を書く
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {

        if (! $request->expectsJson()) {
            //owner 関連の全てのページで登録されていなかったらログインページに飛ばす
            if(Route::is('owner.*')){
                return route($this->artist_route);
            } elseif(Route::is('admin.*')){ //admin関連の全てのページで登録されていなかったらログインページに飛ばす
                return route($this->admin_route);
            } else {
                return route($this->user_route);
            }
        }
    }
}
