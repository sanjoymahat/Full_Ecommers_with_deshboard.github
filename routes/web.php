<?php

use App\Http\Controllers\AdminListingController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChildcategoryController;
use App\Http\Controllers\FontendController;
use App\Http\Controllers\FrontAdsController;
use App\Http\Controllers\FraduController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaveAdController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\SendMessageController;
use App\Http\Controllers\SocialLoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;


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

// Route::get('/home', function () {
//     return view('home');
// });
Route::get('/dashboard',[DashboardController::class,'index']);
//admin
Route::group(['prefix'=>'auth','middleware'=>'admin'],function(){
    Route::get('/', function () {
        return view('backend.admin.index');
    });
    Route::resource('/category',CategoryController::class);
    Route::resource('/subcategory',SubcategoryController::class);
    Route::resource('/childcategory',ChildcategoryController::class);
    //admin listing
    Route::get('/allads',[AdminListingController::class,'index'])->name('all.ads');
    //admin listing
    Route::get('/reported-ads',[FraduController::class,'index'])->name('all.reported.ads');
});
Route::get('/', [FrontAdsController::class,'index']);

Route::get('/ads/create',[AdvertisementController::class,'create'])->name('ads.create')->middleware('auth');
Route::post('/ads/store',[AdvertisementController::class,'store'])->middleware('auth')->name('ads.store');
Route::get('/ads', [AdvertisementController::class,'index'])->name('ads.index')->middleware('auth');
Route::get('/ads/{id}/edit', [AdvertisementController::class,'edit'])->name('ads.edit')->middleware('auth');
Route::put('/ads/{id}/update', [AdvertisementController::class,'update'])->name('ads.update')->middleware('auth');
Route::delete('/ads/{id}/delete', [AdvertisementController::class,'destroy'])->name('ads.destroy')->middleware('auth');
Route::get('/ad-pending',[AdvertisementController::class,'pendingAds'])->name('pending.ad');

//profile
Route::get('/profile', [ProfileController::class,'index'])->name('profile')->middleware('auth');
Route::post('/profile', [ProfileController::class,'updateProfile'])->name('profile.update')->middleware('auth');


//fontend
//user ads
Route::get('/ads/{userId}/view',[FontendController::class,'viewUserAds'])->name('show.user.ads');
//frontend
Route::get( '/product/{categorySlug}', [FontendController::class,'findBasedOnCategory'])->name('category.show');
Route::get('/product/{categorySlug}/{subcategorySlug}', [FontendController::class,'findBasedOnSubcategory']) ->name('subcategory.show');
Route::get('/product/{categorySlug}/{subcategorySlug}/{childCategorySlug}', [FontendController::class,'findBasedOnChildcategory'])->name('childcategory.show');
Route::get('/products/{id}/{slug}',[FontendController::class,'show'])->name('product.view');

//Message
Route::post('/send/message',[SendMessageController::class,'store'])->middleware('auth');
Route::get('messages',[SendMessageController::class,'index'])->name('messages')->middleware('auth');
Route::get('/users',[SendMessageController::class,'chatWithThisUser']);
Route::get('/message/user/{id}',[SendMessageController::class,'showMessages']);
Route::post('/start-conversation',[SendMessageController::class,'startConversation']);

// login with facebook
Route::get('auth/facebook', [SocialLoginController::class,'facebookRedirect']);

Route::get('auth/facebook/callback', [SocialLoginController::class,'loginWithFacebook']);


//Save ad
Route::post('/ad/save',[SaveAdController::class,'saveAd']);
Route::post('/ad/remove',[SaveAdController::class,'removeAd'])->name('ad.remove');
Route::get('/saved-ads',[SaveAdController::class,'getMyads'])->name('saved.ad');

//report this ad
Route::post('/report-this-ad',[FraduController::class,'store'])->name('report.ad');


// // //read me route
// Route::get('/instructor',function(){
//     return view('info');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
