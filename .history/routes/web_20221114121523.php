<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;

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
    return view('index');
});
Route::prefix('admin')->group(function (){
Route::get('/users/login', [LoginController::class, 'index'])->name('login');
    Route::post('/users/login/store', [LoginController::class, 'store']);
    Route::get('/',[MainController::class,'index']) ->name('admin');
    Route::get('/main',[MainController::class,'index']);
    Route::get('/logout',[LoginController::class,'logout'])->name('logout');
    Route::prefix('menus')->group(function (){
      Route::get('add',[MenuController::class,'create'])->name('create');
});
