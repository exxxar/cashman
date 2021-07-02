<?php

use App\Http\Controllers\Admin\AdvertisementController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Callback\CallbackController;
use App\Http\Controllers\Companies\CompanyAuthController;
use App\Http\Controllers\Companies\CompanyEditSectionController;
use App\Http\Controllers\Stories\StoryController;
use App\Http\Controllers\Subscription\BuySubscriptionController;
use App\Http\Controllers\Users\UserProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('company/register', [CompanyAuthController::class, 'register']);
Route::post('company/login', [CompanyAuthController::class, 'login']);
Route::post('buy/subscription', [BuySubscriptionController::class, 'index']);
Route::post('send/message', [CallbackController::class, 'index']);
Route::post('/add-story', [StoryController::class, 'addStory']);

Route::post('company/settings', [CompanyEditSectionController::class, 'updateCompanyData']);
Route::post('user/settings', [UserProfileController::class, 'updateUserProfileData']);

Route::APIresource('admin/products', ProductController::class);
Route::resource('admin/advertisement', AdvertisementController::class);
Route::resource('admin/users', UserController::class);
