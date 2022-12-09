<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\TinController;
use App\Http\Controllers\Admin\LoaiTinController;
use App\Http\Controllers\Client\TinController;

/* Admin */

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
        Route::get('list',[MenuController::class,'list'])->name('list');
    });
    Route::prefix('tin')->group(function () {
        // Route::get('/',[FixxTinController::class,'index'])->name('index');
        Route::get('/list',[TinController::class,'list'])->name('tin_list');
        Route::get('/add',[TinController::class,'add'])->name('tin_add');
        Route::post('/add',[TinController::class,'postAdd'])->name('post_tin_add');
        Route::get('/delete/{id}',[TinController::class,'delete'])->name('tin_delete');
        Route::get('/update/{id}',[TinController::class,'update'])->name('tin_update');
        Route::post('/update/{id}',[TinController::class,'postUpdate'])->name('post_tin_update');
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
    Route::get('/tin/{id}', [TinController::class, 'chitiet']);
    Route::get('/loai/{idLT}', [TinController::class, 'tintrongloai']);
    // });

/* End Client */

