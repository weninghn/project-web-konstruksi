<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProgressController;
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




Route::get('/client', [ClientController::class, 'index'])->name('client');

Route::get('/progres', [ProgressController::class, 'index']);
Route::get('add-progres', [ProgressController::class,'add']);
Route::post('progres-add',[ProgressController::class,'store']);
Route::get('progres-edit/{id}',[ProgressController::class,'edit']);
Route::put('progres-edit/{id}',[ProgressController::class,'update']);
Route::get('progres-delete/{id}',[ProgressController::class,'delete']);