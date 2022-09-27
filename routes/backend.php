<?php


use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CommentController;
use App\Http\Controllers\Backend\ContractController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\SubscriberController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'backend','as'=>'backend.','middleware'=>['auth','admin']],function (){

    Route::get('/',[DashboardController::class,'dashboard'])->name('dashboard');

    Route::resource('/category',CategoryController::class);
    Route::resource('/blog',BlogController::class);
    Route::resource('/comment',CommentController::class);
    Route::resource('/contract',ContractController::class);
    Route::resource('/subscriber',SubscriberController::class);

    Route::get('/setting',[SettingController::class,'index'])->name('setting.index');
    Route::post('/setting/general/store',[SettingController::class,'generalStore'])->name('setting.generalstore');

    Route::get('/setting/appearance',[SettingController::class,'appearance'])->name('setting.appearance');
    Route::post('/setting/appearance/store',[SettingController::class,'appearanceStore'])->name('setting.appearance.store');
    Route::get('/setting.table',[SettingController::class,'table'])->name('setting.table');

    Route::post('/setting/appearance/store',[SettingController::class,'appearanceStore'])->name('setting.appearancestore');
    Route::post('/setting/appearance-frontend/store',[SettingController::class,'appearanceStoreFrontend'])->name('setting.appearancestore-fotntend');

    Route::post('/setting/published-logo',[SettingController::class,'publishedLogo'])->name('setting.published-logo');
});
