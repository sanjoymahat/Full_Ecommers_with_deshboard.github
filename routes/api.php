<?php

use App\Http\Controllers\api\AddressController;
use App\Http\Controllers\api\ApiCategoryController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/category', [ApiCategoryController::class, 'getCategory']);
Route::get('/subcategory', [ApiCategoryController::class, 'getsubcategory']);
Route::get('/childcategory', [ApiCategoryController::class, 'getchildcategory']);

Route::get('/country', [AddressController::class, 'getCountry']);
Route::get('/state', [AddressController::class, 'getState']);
Route::get('/city', [AddressController::class, 'getCity']);
