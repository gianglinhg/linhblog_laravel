<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\FixxTinController;
use App\Http\Controllers\Client\TinController;

// Route::get('/',function(){
//     return view('client.home');
// });
Route::get('/',[TinController::class,'index']);
// Route::prefix('client')->group(function (){
    Route::get('/tin/{id}', [TinController::class, 'chitiet']);
    Route::get('/loai/{idLT}', [TinController::class, 'tintrongloai']);
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
        // Route::get('add',[MenuController::class,'list'])->name('list');
    });
    Route::prefix('tin')->name('admin_tin')->group(function () {
        // Route::get('/',[FixxTinController::class,'index'])->name('index');
        Route::get('/list',[FixxTinController::class,'list'])->name('list');
        Route::get('/add',[FixxTinController::class,'add'])->name('tin_add');
        Route::post('/add',[FixxTinController::class,'postAdd'])->name('post_tin_add');
        Route::get('/delete/{id}',[FixxTinController::class,'delete'])->name('tin_delete');
        Route::get('/update/{id}',[FixxTinController::class,'update'])->name('tin_update');
        Route::post('/update/{id}',[FixxTinController::class,'postUpdate'])->name('post_tin_update');
        // Route::get('/thongbao', function(){return view('tin.thongbao');})->name('thongbao');

    });
});

