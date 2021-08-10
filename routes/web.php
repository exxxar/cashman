<?php

use App\Http\Controllers\Achievements\AchievementController;
use App\Http\Controllers\Admin\AdvertisementController;
use App\Http\Controllers\Admin\CompanyActionMenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Companies\CompanyAuthController;
use App\Http\Controllers\Companies\CompanyEditSectionController;
use App\Http\Controllers\Companies\CompanyListController;
use App\Http\Controllers\Companies\CompanyProfileController;
use App\Http\Controllers\HistoryAction\HistoryActionController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\Promocode\PromocodeController;
use App\Http\Controllers\Region\RegionMapController;
use App\Http\Controllers\Social\SocialController;
use App\Http\Controllers\Users\UserProfileController;

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
/* Группа всех пользователей */
Route::group(['middleware' => ['web']], function () {
    /* Рекламная страница приложения */
    Route::get('/landing-page', function () {
        return view('pages/landingPage');
    });
    /* Главная страница */
    Route::get('/', [\App\Http\Controllers\Users\UserController::class, 'getAuthUser']);
    /* О нас */
    Route::get('/about-project', function () {
        return view('pages/aboutProjectPage');
    });
    /* Товары (продающая страница) */
    Route::get('/products', function () {
        return view('pages/products/ProductsPage');
    });
    /* Новости (рекламные банеры) */
    Route::get('/news', function () {
        return view('pages/userProfile/news/newsPage');
    });
    Route::get('/news/{id}', [NewsController::class, 'getNewsItem']);
    /* Страница компаний */
    Route::get('/search-company', [CompanyListController::class, 'getSearchPage']);
    Route::get('/qr-handler/data={data}', [PromocodeController::class, 'qrHandler'])->name('qr-handler');
    /* Авторизация через социальные сети */
    Route::get('/auth/{driver}', [SocialController::class, 'index']);
    Route::get('/auth/{driver}/callback', [SocialController::class, 'callback']);
    Route::get('/complete-register-{email}', [SocialController::class, 'complete']);
    /*Страница с картой*/
    Route::get('/region-map/{id}', [RegionMapController::class, 'getMap']);
    /* Группа авторизованных пользователей */
    Route::group(['middleware' => ['auth']], function () {
        /* Профиль пользователя */
        Route::get('/user-profile',[UserProfileController::class, 'getAuthUser']);
        Route::get('/company/add-{id}', [CompanyListController::class, 'addUserCompany']);
        /* Настройки профиля пользователя */
        Route::get('/user-settings', [UserProfileController::class, 'getUserSettings']);
        /*Страница редактирования данных о профиле пользователя*/
        Route::get('/user-edit', [UserProfileController::class, 'index']);
        /* Достижения пользователя */
        Route::get('/achievements', function () {
            return view('pages/userProfile/achievements/achievementPage');
        });
        Route::get('/achievements/achievements-{id}', [AchievementController::class, 'getAchievement']);
        /* История действий пользователя */
        Route::get('/history', function () {
            return view('pages/userProfile/actions/userActionHistoryPage');
        });
        Route::get('/history/action-{id}', [HistoryActionController::class, 'getActionDetail']);
        /* Друзья пользователя */
        Route::get('/friends', function () {
            return view('pages/userProfile/friends/userFriendsPage');
        });
        /* Дерево друзей пользователя */
        Route::get('/friends-tree', function () {
            return view('pages/userProfile/friends/usersFriendsTreePage');
        });
        /* Страница ввода промокода */
        Route::get('/promo-code/{user}/{company}', [PromocodeController::class, 'getUserPromocode'])->name('user-qr');
        /* Регистрация компании */
        Route::get('/register-company', function () {
            return view('auth/companyAuth/RegistrationCompanyPage');
        });
        Route::post('/register-company', [CompanyAuthController::class, 'register']);
        Route::post('/login-company', [CompanyAuthController::class, 'login']);
        /* Авторизация компании */
        Route::get('/login-company', function () {
            return view('auth/companyAuth/LoginCompanyPage');
        });
        /* Надо добавить ещё один middleware для авторизованых пользователей которые авторизовались в компании */
        /* Профиль компании */
        Route::get('/company-profile-{id}', [CompanyProfileController::class, 'getCompanyData'])->name('company-profile');
        /* Страница добавления рекламы (Степер) */
        Route::get('/add-advertising', function () {
            return view('pages/companyProfile/addCompanyAdvertising');
        });
        /* Страница редактирования данных о компании */
        Route::get('/company-edit-{id}', [CompanyEditSectionController::class, 'index']);
        /* Меню админа компании */
        Route::get('/company-admin-menu-{id}', function(){
            return view('pages/companyProfile/Admin/companyAdminMenuPage');
        })->name('company-admin');
        /*CRUD продукты*/
        Route::get('/company-admin-products', [ProductController::class, 'index']);
        /*CRUD реклама*/
        Route::get('/company-admin-advertisement', [AdvertisementController::class, 'index']);
        /*Просмотр пользователей админом*/
        Route::get('/company-admin-users', [UserController::class, 'index']);
        /*Страница историй админа*/
        Route::get('/story-admin-menu', [AdvertisementController::class, 'getAdvertisement']);
        /*Страница действий компании*/
        Route::get('/company-action-menu', [CompanyActionMenuController::class, 'index']);
        /*Страница списка администраторов компании*/
        Route::get('/company-group-admin', function(){
            return view('pages/companyProfile/Admin/CompanyGroupAdmin');
        });
        /*Страница добавления промокода*/
        Route::get('/add-promocode', [PromocodeController::class, 'index']);
    });

    Auth::routes();

    Route::group(['prefix' => 'admin'], function () {
        Voyager::routes();
    });
});
