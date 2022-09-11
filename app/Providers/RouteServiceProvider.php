<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/';
    public const ARTIST_HOME = '/artist/dashboard';
    public const ADMIN_HOME = '/admin/dashboard';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    //サービスプロバイダが読み込まれた後に実行
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            //フロント側を全てJavascriptで作るパターン
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            //Userのルート情報 ->group()グループの中の全てに割り当てる as()別名
            Route::prefix('/')
                ->as('user.')
                ->middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            //Artistのルート情報 ->group()グループの中の全てに割り当てる ::prefix()頭にartistというURLがつく as()別名
            Route::prefix('artist')
                ->as('artist.')
                ->middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/artist.php'));

            //Adminのルート情報 ->group()グループの中の全てに割り当てる ::prefix()頭にartistというURLがつく as()別名
            Route::prefix('admin')
                ->as('admin.')
                ->middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/admin.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
