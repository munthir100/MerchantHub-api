<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StoreCountryController;
use App\Http\Controllers\DefinitionPageController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\ShippingMethodController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('auth')->group(function () {
    Route::middleware('guest:merchant')->group(function () {
        Route::post('login', [LoginController::class, 'login']);
        Route::post('register', [RegisterController::class, 'register']);
    });
});
Route::middleware('auth:merchant')->group(function () {
    Route::post('logout', [LoginController::class, 'logout']);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('brands', BrandController::class);
    Route::apiResource('products', ProductController::class);
    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('coupons', CouponController::class);
    Route::apiResource('orders', OrderController::class);
    Route::prefix('settings')->group(function () {
        Route::prefix('profile')->group(function(){
            Route::get('/', [MerchantController::class, 'profile']);
        });
        Route::apiResource('shippingMethods', ShippingMethodController::class);
        Route::apiResource('definitionPages', DefinitionPageController::class);
        Route::apiResource('store', StoreController::class)->only(['index']);
        Route::prefix('store')->group(function(){
            Route::get('/', [StoreController::class, 'index']);
            Route::put('update', [StoreController::class, 'update']);
            Route::get('socialLinks', [StoreController::class, 'socialLinks']);
        });
        Route::apiResource('storeCountries', StoreCountryController::class)->except(['update']);
        Route::put('storeCountries/{storeCountry}/default', [StoreCountryController::class, 'setAsDefault']);
        Route::put('socialLinks', [StoreController::class, 'updateSocialLinks']);
    });
});
