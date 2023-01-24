<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

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
    return view('layouts.master');
});

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/user/data', [UserController::class, 'data'])->name('user.data');
Route::resource('/user', UserController::class);

// Route::get('/users', [UserController::class, 'index']);
// Route::get('add_user', [UserController::class,'add']);
// Route::post('user-add',[UserController::class,'store']);
// Route::get('user-edit/{id}',[UserController::class,'edit']);
// Route::put('user-edit/{id}',[UserController::class,'update']);
// Route::get('user-delete/{id}',[UserController::class,'delete']);
// Route::get('user-deleted',[UserController::class,'deleteduser']);
