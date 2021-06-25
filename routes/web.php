<?php


use App\Http\Controllers\Achievements\AchievementController;
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
    return view('pages/welcome');
});
Route::get('/login-company', function () {
    return view('pages/companies/LoginCompanyPage');
});
Route::get('/register-company', function () {
    return view('pages/companies/RegistrationCompanyPage');
});
Route::get('/products', function () {
    return view('pages/products/ProductsPage');
});
Route::get('/user-profile', function () {
    return view('pages/userProfile/userProfilePage');
});
Route::get('/user-settings', function () {
    return view('pages/userProfile/userSettingsPage');
});
Route::get('/achievements', function () {
    return view('pages/userProfile/achievements/achievementPage');
});
Route::get('/achievements/{id}', [AchievementController::class, 'getAchievement']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'guest'], function () {

    Route::get('/auth/{driver}', [SocialController::class, 'index']);

    Route::get('/auth/{driver}/callback', [SocialController::class, 'callback']);
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
