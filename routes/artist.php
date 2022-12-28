<?php

use App\Http\Controllers\Artist\ArtistController;
use App\Http\Controllers\Artist\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Artist\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Artist\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Artist\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Artist\Auth\NewPasswordController;
use App\Http\Controllers\Artist\Auth\PasswordResetLinkController;
use App\Http\Controllers\Artist\Auth\RegisteredUserController;
use App\Http\Controllers\Artist\Auth\VerifyEmailController;
use App\Http\Controllers\Artist\ArtistProfileController;
use App\Http\Controllers\Artist\PostsController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('artist.welcome');
// });

Route::prefix('profile')->
    middleware('auth:artists')->group(function(){
        Route::get('index', [ArtistProfileController::class,'index'])->name('profile.index');
        Route::get('create', [ArtistProfileController::class,'create'])->name('profile.create');
        Route::post('store', [ArtistProfileController::class,'store'])->name('profile.store');
        Route::get('edit/{profile}',[ArtistProfileController::class,'edit'])->name('profile.edit');
        Route::post('update/{profile}',[ArtistProfileController::class,'update'])->name('profile.update');
});


Route::get('/dashboard', [ArtistController::class,'index'])
                ->middleware(['auth:artists'])
                ->name('dashboard'); //middleware(['auth:artists'])->name('dashboard') artistsの権限を持っていたらdashboardを表示

Route::get('/notifications', [ArtistController::class,'notification'])
                ->middleware(['auth:artists'])
                ->name('profile.notifications'); //middleware(['auth:artists'])->name('dashboard') artistsの権限を持っていたらdashboardを表示

Route::get('/settings', [ArtistProfileController::class,'settings'])
                ->middleware(['auth:artists'])
                ->name('profile.settings'); //middleware(['auth:artists'])->name('dashboard') artistsの権限を持っていたらdashboardを表示

Route::post('/settingUpdate', [ArtistProfileController::class,'settingUpdate'])
                ->middleware(['auth:artists'])
                ->name('profile.settingUpdate'); //middleware(['auth:artists'])->name('dashboard') artistsの権限を持っていたらdashboardを表示

// Route::resource('profile', ArtistProfileController::class)
// ->middleware(['auth:artists'])->except(['show']);

Route::resource('posts', PostsController::class)
->middleware(['auth:artists'])->except(['show']);

Route::get('/register', [RegisteredUserController::class, 'create'])
                ->middleware('guest')
                ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
                ->middleware('guest');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest');

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->middleware('guest')
                ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->middleware('guest')
                ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->middleware('guest')
                ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
                ->middleware('guest')
                ->name('password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->middleware('auth:artists')
                ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['auth:artists', 'signed', 'throttle:6,1'])
                ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware(['auth:artists', 'throttle:6,1'])
                ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->middleware('auth:artists')
                ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
                ->middleware('auth:artists');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth:artists')
                ->name('logout');

