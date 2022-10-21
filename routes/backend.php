<?php


use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CommentController;
use App\Http\Controllers\Backend\ContractController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\SubscriberController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\WorksController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'backend','as'=>'backend.','middleware'=>['auth','admin']],function (){

    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');

    Route::resource('/tags',TagController::class);
    Route::resource('/category',CategoryController::class);
    Route::resource('/blog',BlogController::class);
    Route::resource('/comment',CommentController::class);
    Route::resource('/contract',ContractController::class);
    Route::resource('/subscriber',SubscriberController::class);
    Route::resource('/service',ServiceController::class);
    Route::resource('/works',WorksController::class);

    Route::group(['prifix'=>'setting'],function (){
        Route::get('/',[SettingController::class,'index'])->name('setting.index');
        Route::post('/general/store',[SettingController::class,'generalStore'])->name('setting.generalstore');
        Route::get('/appearance',[SettingController::class,'appearance'])->name('setting.appearance');
        Route::post('/appearance/store',[SettingController::class,'appearanceStore'])->name('setting.appearance.store');
        Route::get('/table',[SettingController::class,'table'])->name('setting.table');
        Route::post('/appearance/store',[SettingController::class,'appearanceStore'])->name('setting.appearancestore');
        Route::post('/appearance-frontend/store',[SettingController::class,'appearanceStoreFrontend'])->name('setting.appearancestore-fotntend');
        Route::post('/published-logo',[SettingController::class,'publishedLogo'])->name('setting.published-logo');
    });
});
