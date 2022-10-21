<?php

use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\ContractController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\LikeController;
use App\Http\Controllers\Frontend\SubscribeController;
use Illuminate\Support\Facades\Route;

Route::get('/',function (){
    return redirect()->route('login');
})->name('frontend.home');
Route::get('/details/{slug}',[BlogController::class,'details'])->name('frontend.blog.details');

Route::get('/category',[CategoryController::class,'category'])->name('frontend.category');
Route::get('/frontend/category/{slug}/{id}',[CategoryController::class,'categoryBlog'])->name('frontend.category.blog');
Route::post('/subscribe',[SubscribeController::class,'store'])->name('frontend.subscribe.store');
Route::post('/comment/store',[CommentController::class,'store'])->name('frontend.comment.store');

Route::get('/contract',[ContractController::class,'create'])->name('frontend.contract');
Route::post('/contract',[ContractController::class,'store'])->name('frontend.contract.store');
Route::post('/like',[LikeController::class,'store_like'])->name('frontend.like');
Route::group(['prefix'=>'frontend','as'=>'frontend.','middleware'=>['auth','user']],function (){
   Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');

   Route::get('/profile',[DashboardController::class,'profile'])->name('profile');
   Route::get('/comment',[DashboardController::class,'comment'])->name('comment');
   Route::get('/message',[DashboardController::class,'message'])->name('message');
   Route::get('/setting',[DashboardController::class,'setting'])->name('setting');

   Route::get('/change-email',[DashboardController::class,'changeEmail'])->name('change-email');
   Route::post('/update-email',[DashboardController::class,'updateEmail'])->name('update-email');

   Route::post('/change-password',[DashboardController::class,'changePassword'])->name('change-password');

   Route::get('/profile-delete',[DashboardController::class,'profileDelete'])->name('profile-delete');

   Route::delete('/delete-account',[DashboardController::class,'deleteAccount'])->name('delete-account');
});
