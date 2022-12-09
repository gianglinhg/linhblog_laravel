<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\FixxTinController;
use App\Http\Controllers\Admin\LoaiTinController;
use App\Http\Controllers\Client\TinController;
use App\Http\Controllers\AuthController;


/* Admin */

Route::prefix('admin')->group(function (){
    Route::middleware(['auth'])->name('admin.')->group(function () {
        Route::get('/',[MainController::class,'index']);
        Route::get('/main',[MainController::class,'index']);
        Route::get('/profile',[MainController::class,'index']) ->name('profile');
    });
    Route::prefix('users')->group(function(){



        // Route::get('/users/login', [LoginController::class, 'index'])->name('login');
        // Route::post('/users/login/store', [LoginController::class, 'store']);
    });

    Route::prefix('tin')->name('tin.')->group(function () {
        Route::get('/',[FixxTinController::class,'index'])->name('index');
        Route::get('/list',[FixxTinController::class,'list'])->name('list');
        Route::get('/add',[FixxTinController::class,'add'])->name('add');
        Route::post('/add',[FixxTinController::class,'postAdd'])->name('post_add');
        Route::get('/update/{id}',[FixxTinController::class,'update'])->name('update');
        Route::post('/update',[FixxTinController::class,'postUpdate'])->name('post_update');
        Route::get('/delete/{id}',[FixxTinController::class,'delete'])->name('delete');

        Route::get('/search',[FixxTinController::class,'search'])->name('search');
        // Route::get('/thongbao', function(){return view('tin.thongbao');})->name('thongbao');

    });
    Route::prefix('loaitin')->name('loaitin.')->group(function(){
        Route::get('/',[LoaiTinController::class,'index'])->name('index');
        Route::get('/list',[LoaiTinController::class,'list'])->name('list');
        Route::get('/add',[LoaiTinController::class,'add'])->name('add');
        Route::post('/add',[LoaiTinController::class,'postAdd'])->name('post_add');
        Route::get('/edit/{id}',[LoaiTinController::class,'edit'])->name('update');
        Route::post('/update',[LoaiTinController::class,'postEdit'])->name('post_update');
        Route::get('/delete/{id}',[LoaiTinController::class,'delete'])->name('delete');
    });
});

/***************************************** End Admin *************************************/
Route::prefix('auth')->name('auth.')->group(function(){

    Route::get('/register', [LoginController::class,'register'])->name('register');
    Route::post('/register', [LoginController::class,'post_register'])->name('post_register');

    Route::get('/login', [LoginController::class,'login'])->name('login');
    Route::post('/login', [LoginController::class,'post_login'])->name('post_login');

    Route::get('/password', [LoginController::class,'password'])->name('password');
    Route::post('/password', [LoginController::class,'post_password'])->name('post_password');

    Route::get('/logout',[LoginController::class,'logout'])->name('logout');
});


/***************************************** Client *************************************/

Route::get('/',[TinController::class,'index']);
Route::prefix('/')->group(function (){
    Route::get('/search',[TinController::class,'search'])->name('search');
    Route::get('/tin/{id}', [TinController::class, 'chitiet']);
    Route::get('/loai/{idLT}', [TinController::class, 'tintrongloai']);
    });

/***************************************** End Client *************************************/
