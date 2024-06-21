<?php

use App\Http\Controllers\Admin\RestaurantsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RestaurantController;

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

//  Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//      return $request->user();
//  });

Route::get('/restaurants', [RestaurantController::class, 'index']);
Route::get('/types', [RestaurantController::class, 'getTypes']);
Route::get('/restaurant-info/{id}', [RestaurantController::class, 'getRestaurantInfo']);
Route::get('/restaurants/type', [RestaurantController::class, 'getRestaurantsByType']);
Route::get('/search/{search}', [RestaurantController::class, 'getSearchRestaurants']);
