<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StoreThemeController;
use App\Http\Controllers\DefinitionPageController;
use App\Http\Controllers\ShippingMethodController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\StoreCountryController;
use App\Http\Controllers\SubscriptionPlanController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




// Status Controller
Route::get('statuses', [StatusController::class, 'index']);

Route::get('languages', [LanguageController::class, 'index']);
Route::get('currencies', [CurrencyController::class, 'index']);
Route::apiResource('countries', CountryController::class)->only(['index', 'show']);
Route::apiResource('cities', CityController::class)->only(['index', 'show']);
Route::apiResource('subscriptionPlans', SubscriptionPlanController::class)->only(['index', 'show']);
Route::get('storeThemes', [StoreThemeController::class, 'index']);




