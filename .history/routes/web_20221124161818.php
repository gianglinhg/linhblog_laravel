<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\FixxTinController;
use App\Http\Controllers\Admin\LoaiTinController;
use App\Http\Controllers\Client\TinController;

/* Admin */

Route::prefix('admin')->group(function (){
    Route::middleware(['auth'])->group(function () {
        Route::get('/',[MainController::class,'index']);
        Route::get('/main',[MainController::class,'index']);
        Route::get('/profile',[MainController::class,'index']) ->name('profile');
        Route::get('/logout',[LoginController::class,'logout'])->name('logout');
    });
    Route::prefix('users')->group(function(){

        Route::get('/register', [LoginController::class,'register'])->name('register');
        Route::post('/register', [LoginController::class,'post_register'])->name('post_register');

        Route::get('/login', [LoginController::class,'login'])->name('login');
        Route::post('/login', [LoginController::class,'post_login'])->name('post_login');

        Route::get('/password', [LoginController::class,'password'])->name('password');
        Route::post('/password', [LoginController::class,'post_password'])->name('post_password');

        // Route::get('/users/login', [LoginController::class, 'index'])->name('login');
        // Route::post('/users/login/store', [LoginController::class, 'store']);
    });
    Route::prefix('menus')->group(function (){
        Route::get('add',[MenuController::class,'create'])->name('create');
        Route::post('add',[MenuController::class,'create'])->name('create');
        Route::get('list',[MenuController::class,'list'])->name('list');
    });
    Route::prefix('tin')->group(function () {
        // Route::get('/',[FixxTinController::class,'index'])->name('index');
        Route::get('/list',[FixxTinController::class,'list'])->name('tin_list');
        Route::get('/add',[FixxTinController::class,'add'])->name('tin_add');
        Route::post('/add',[FixxTinController::class,'postAdd'])->name('post_tin_add');
        Route::get('/delete/{id}',[FixxTinController::class,'delete'])->name('tin_delete');
        Route::get('/update/{id}',[FixxTinController::class,'update'])->name('tin_update');
        Route::post('/update/{id}',[FixxTinController::class,'postUpdate'])->name('post_tin_update');

        Route::get('/search',[FixxTinController::class,'search'])->name('tin_search');
        // Route::get('/thongbao', function(){return view('tin.thongbao');})->name('thongbao');

    });
    Route::prefix('loaitin')->name('loaitin.')->group(function(){
        Route::get('/list',[LoaiTinController::class,'list'])->name('list');
        Route::get('/add',[LoaiTinController::class,'add'])->name('add');
        Route::post('/add',[LoaiTinController::class,'postAdd'])->name('post-add');
        Route::get('/edit/{id}',[LoaiTinController::class,'edit'])->name('edit');
        Route::post('/update',[LoaiTinController::class,'postEdit'])->name('post-edit');
        Route::get('/delete/{id}',[LoaiTinController::class,'delete'])->name('delete');
    });
});

/* End Admin */

/* Client */

Route::get('/',[TinController::class,'index']);
// Route::prefix('client')->group(function (){
    Route::get('/search',[TinController::class,'search'])->name('search');
    Route::get('/tin/{id}', [TinController::class, 'chitiet']);
    Route::get('/loai/{idLT}', [TinController::class, 'tintrongloai']);
    // });

/* End Client */

