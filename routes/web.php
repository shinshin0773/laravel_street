<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LifeCycleTestController;
use App\Http\Controllers\User\FollowController;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\User\ItemController;
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

Route::get('/', function () {
    return view('user.welcome');
});

//ログインしていないとアクセスできない
Route::prefix('user')->
    middleware('auth:users')->group(function(){
        Route::get('/profile',[UserProfileController::class,'index'])->name('profile.index');
        Route::get('/profile/create',[UserProfileController::class,'create'])->name('profile.create');
        Route::post('/profile/store',[UserProfileController::class,'store'])->name('profile.store');
        Route::get('/profile/edit',[UserProfileController::class,'edit'])->name('profile.edit');
        Route::post('/profile/update',[UserProfileController::class,'update'])->name('profile.update');

        Route::post('show/{item}/like',[ItemController::class, 'like'])->name('items.like');
        Route::post('show/{item}/unlike',[ItemController::class, 'unlike'])->name('items.unlike');
        Route::post('show/{item}/follow',[FollowController::class, 'follow'])->name('items.follow');
        Route::post('show/{item}/unfollow',[FollowController::class, 'unfollow'])->name('items.unfollow');
        Route::get('/followList',[FollowController::class, 'index'])->name('items.followList');
        Route::get('/showPoint',[UserProfileController::class, 'showPoint'])->name('items.showPoint');
        Route::get('/followList/{artist_id}/profile',[FollowController::class, 'show'])->name('items.artist_profile');
        Route::post('/charge',[UserProfileController::class, 'charge'])->name('items.charge');
        Route::post('/present',[ItemController::class, 'present'])->name('items.present');
        Route::get('/notification',[UserProfileController::class, 'notification'])->name('profile.notification');
        Route::post('/notification/read',[UserProfileController::class, 'read'])->name('profile.read');
        Route::post('/notification/readAll',[UserProfileController::class, 'readAll'])->name('profile.readAll');

});

Route::get('/',[ItemController::class,'index'])->name('items.index');


Route::get('/placeMap',[ItemController::class,'placeMap'])->name('items.placeMap');
Route::get('show/{item}/{artist_id}',[ItemController::class, 'show'])->name('items.show');
Route::get('map/{item}',[ItemController::class, 'showMap'])->name('items.showMap');
Route::get('userArtistProfile/{artist_id}',[ItemController::class, 'showArtist'])->name('artist.profile');



// Route::get('/followArtist',[FollowController::class, 'show'])->name('items.followArtist');

// Route::get('/show/{item}/map', function() {
//     return view("user.showMap");
//   })->name('items.showMap');

Route::get('/servicecontainertest', [LifeCycleTestController::class, 'showServiceContainerTest']);


require __DIR__.'/auth.php';
