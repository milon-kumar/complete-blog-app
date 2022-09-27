<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if (Auth::check() && Auth::user()->is_admin == true){
        return redirect()->route('backend.dashboard');
    }elseif (Auth::check() && Auth::user()->is_admin == false){
        return redirect()->route('frontend.dashboard');
    }else{
        return redirect()->route('frontend.dashboard');
    }
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
