<?php


use App\Http\Controllers\Social\SocialController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use TCG\Voyager\Facades\Voyager;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'guest'], function () {

    Route::get('/auth/{driver}', [SocialController::class, 'index']);

    Route::get('/auth/{driver}/callback', [SocialController::class, 'callback']);
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
