<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\TinController;

Route::get('/', function () {
    return view('index');
});
// Route::prefix('client')->group(function (){
    Route::get('/chitiet', Route::get('/main',[TinController::class,'index']);
// });
Route::prefix('admin')->group(function (){
    Route::middleware(['auth'])->group(function () {
        Route::get('/main',[MainController::class,'index']);
        Route::get('/',[MainController::class,'index']) ->name('admin');
    });
    Route::get('/users/login', [LoginController::class, 'index'])->name('login');
    Route::post('/users/login/store', [LoginController::class, 'store']);
    Route::get('/logout',[LoginController::class,'logout'])->name('logout');
    Route::prefix('menus')->group(function (){
        Route::get('add',[MenuController::class,'create'])->name('create');
        Route::post('add',[MenuController::class,'create'])->name('create');
        Route::get('add',[MenuController::class,'list'])->name('list');
    });
});
