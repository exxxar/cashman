<?php

use App\Http\Controllers\Achievements\AchievementController;
use App\Http\Controllers\Companies\CompanyProfileController;
use App\Http\Controllers\HistoryAction\HistoryActionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\News\NewsController;
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
    return view('auth/companyAuth/LoginCompanyPage');
});
Route::get('/register-company', function () {
    return view('auth/companyAuth/RegistrationCompanyPage');
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

Route::get('/achievements/achievements-{id}', [AchievementController::class, 'getAchievement']);

Route::get('/history/action-{id}', [HistoryActionController::class, 'getActionDetail']);

Route::get('/achievements', function () {
    return view('pages/userProfile/achievements/achievementPage');
});
Route::get('/history', function () {
    return view('pages/userProfile/actions/userActionHistoryPage');
});
Route::get('/friends', function () {
    return view('pages/userProfile/friends/userFriendsPage');
});
Route::get('/friends-tree', function () {
    return view('pages/userProfile/friends/usersFriendsTreePage');
});

Route::get('/news/{id}', [NewsController::class, 'getNewsItem']);

Route::get('/news', function () {
    return view('pages/userProfile/news/newsPage');
});

Route::get('/promo-code', function () {
    return view('pages/promoCodePage');
});

Route::get('/about-project', function () {
    return view('pages/aboutProjectPage');
});

Route::get('/landing-page', function () {
    return view('pages/landingPage');
});

Route::get('/company-profile', [CompanyProfileController::class, 'getCompanyData']);

Route::get('/add-advertising', function(){
    return view('pages/companyProfile/addCompanyAdvertising');
});

Route::get('/search-company', function(){
    return view('pages/companies/searchCompanyPage');
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'guest'], function () {

    Route::get('/auth/{driver}', [SocialController::class, 'index']);

    Route::get('/auth/{driver}/callback', [SocialController::class, 'callback']);
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
