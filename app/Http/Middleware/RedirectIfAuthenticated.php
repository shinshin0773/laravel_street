<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    //privateはこのクラスでしか使わない変数を定義する
    //'users'などの値はconfig/auth.php で設定していたgaurd設定
    private const GUARD_USER = 'users';
    private const GUARD_ARTIST = 'artists';
    private const GUARD_ADMIN = 'admin';

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        // $guards = empty($guards) ? [null] : $guards;

        // foreach ($guards as $guard) {
        //     //ログインしていたらリダイレクトする
        //     if (Auth::guard($guard)->check()) {
        //         return redirect(RouteServiceProvider::HOME);
        //     }
        // }

        //ログインしていたらホーム画面にリダイレクトする
        //self::はプロパティにアクセスする
        if(Auth::guard(self::GUARD_USER)->check() && $request->routeIs('user.*')){
            return redirect(RouteServiceProvider::HOME);
        }

        //ログインしていたらホーム画面にリダイレクトする
        //self::はプロパティにアクセスする
        if(Auth::guard(self::GUARD_ARTIST)->check() && $request->routeIs('artist.*')){
            return redirect(RouteServiceProvider::ARTIST_HOME);
        }

        //ログインしていたらホーム画面にリダイレクトする
        //self::はプロパティにアクセスする
        if(Auth::guard(self::GUARD_ADMIN)->check() && $request->routeIs('admin.*')){
            return redirect(RouteServiceProvider::ADMIN_HOME);
        }

        return $next($request);
    }
}
