<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\FixxTinController;
use App\Http\Controllers\Admin\LoaiTinController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\TinController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;


/* Admin */

Route::prefix('admin')->name('admin.')->group(function (){
    Route::middleware(['auth','admin'])->group(function () {
        Route::get('/',[MainController::class,'index']);
        Route::get('main',[MainController::class,'index']);

    // Route::middleware(['auth','admin'])->group(function(){
    Route::prefix('tin')->name('tin.')->group(function () {
            Route::get('/',[FixxTinController::class,'index'])->name('index');
            Route::get('/list',[FixxTinController::class,'list'])->name('list');

            Route::get('/add',[FixxTinController::class,'add'])->name('add');
            Route::post('/add',[FixxTinController::class,'postAdd'])->name('post_add');

            Route::post('/upload',[FixxTinController::class,'upload'])->name('upload');

            Route::get('/update/{id}',[FixxTinController::class,'update'])->name('update');
            Route::post('/update',[FixxTinController::class,'postUpdate'])->name('post_update');

            Route::get('/delete/{id}',[FixxTinController::class,'delete'])->name('delete');

            Route::get('/search',[FixxTinController::class,'search'])->name('search');
    });

    Route::prefix('loaitin')->name('loaitin.')->group(function(){
        Route::get('/',[LoaiTinController::class,'index']);
        Route::get('/list',[LoaiTinController::class,'list'])->name('list');

        Route::get('/add',[LoaiTinController::class,'add'])->name('add');
        Route::post('/add',[LoaiTinController::class,'postAdd'])->name('post_add');

        Route::get('/edit/{id}',[LoaiTinController::class,'edit'])->name('update');
        Route::post('/update',[LoaiTinController::class,'postEdit'])->name('post_update');

        Route::get('/delete/{id}',[LoaiTinController::class,'delete'])->name('delete');
    });
});
    Route::prefix('users')->name('users.')->group(function(){
        Route::get('/',[UserController::class,'index']);
        Route::get('list',[UserController::class,'index'])->name('list');
        Route::get('delete/{id}',[UserController::class,'delete'])->name('delete');
    });
});

/***************************************** End Admin *************************************/
Route::prefix('auth')->name('auth.')->group(function(){

    Route::get('/register', [AuthController::class,'register'])->name('register');
    Route::post('/register', [AuthController::class,'post_register'])->name('post_register');

    Route::get('/login', [AuthController::class,'login'])->name('login');
    Route::post('/login', [AuthController::class,'post_login'])->name('post_login');

    Route::get('/password', [AuthController::class,'password'])->name('password');
    Route::post('/password', [AuthController::class,'post_password'])->name('post_password');


    Route::get('/logout',[AuthController::class,'logout'])->name('logout');

    Route::get('/',[AuthController::class,'index']);
    Route::get('/dashboard',[AuthController::class,'dashboard'])->name('dashboard')->middleware('auth');

    Route::post('comment',[CommentController::class,'comment'])->name('comment');
    Route::get('delete/{id}',[CommentController::class,'comment'])->name('deleteCmt');
});


/***************************************** Client *************************************/

Route::get('/',[TinController::class,'index']);
Route::prefix('/')->name('client.')->group(function (){
    Route::get('/search',[TinController::class,'search'])->name('search');
    Route::get('/tin/{id}', [TinController::class, 'chitiet']);
    Route::get('/loai/{idLT}', [TinController::class, 'tintrongloai']);
    });

/***************************************** End Client *************************************/

