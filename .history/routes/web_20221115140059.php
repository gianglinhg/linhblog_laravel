<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;

Route::get('/', function () {
    return view('index');
});
Route::prefix('admin')->group(function (){
        Route::middleware(['auth'])->group(function () {
            Route::get('/users/login', [LoginController::class, 'index'])->name('login');
            Route::post('/users/login/store', [LoginController::class, 'store']);
            // Route::get('/main',[MainController::class,'index']);
            Route::get('/admin',[MainController::class,'index']) ->name('admin');
        });
        Route::get('/logout',[LoginController::class,'logout'])->name('logout');
        Route::prefix('menus')->group(function (){
            Route::get('add',[MenuController::class,'create'])->name('create');
        });
    });