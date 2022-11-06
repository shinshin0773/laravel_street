<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LifeCycleTestController;
use App\Http\Controllers\User\FollowController;
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

Route::get('/',[ItemController::class,'index'])->name('items.index');
Route::get('/placeMap',[ItemController::class,'placeMap'])->name('items.placeMap');
Route::get('show/{item}/{artist_id}',[ItemController::class, 'show'])->name('items.show');
Route::get('show/{item}/map',[ItemController::class, 'showMap'])->name('items.showMap');
Route::post('show/{item}/like',[ItemController::class, 'like'])->name('items.like');
Route::post('show/{item}/unlike',[ItemController::class, 'unlike'])->name('items.unlike');
Route::post('show/{item}/follow',[FollowController::class, 'follow'])->name('items.follow');
Route::get('/followList',[FollowController::class, 'index'])->name('items.followList');


Route::get('/servicecontainertest', [LifeCycleTestController::class, 'showServiceContainerTest']);


require __DIR__.'/auth.php';
