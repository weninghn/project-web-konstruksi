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

Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/adduser', [UserController::class, 'adduser'])->name('adduser');
Route::post('/insertuser', [UserController::class, 'insertuser'])->name('insertuser');
Route::get('/tampiluser{id}', [UserController::class, 'tampiluser'])->name('tampiluser');
Route::post('/updateuser{id}', [UserController::class, 'updateuser'])->name('updateuser');
Route::get('/deleteuser{id}', [UserController::class, 'deleteuser'])->name('deleteuser');

Route::get('/client', [ClientController::class, 'index'])->name('client');
// tambahdata
Route::get('/tambahdata', [ClientController::class, 'tambahdata'])->name('tambahdata');
Route::post('/insertdata', [ClientController::class, 'insertdata'])->name('insertdata');
//edit
Route::get('/tampilkandata{id}', [ClientController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata{id}', [ClientController::class, 'updatedata'])->name('updatedata');
//hapus
Route::get('/delete/{id}', [ClientController::class, 'delete'])->name('delete');



Route::get('/progres', [ProgressController::class, 'index']);
Route::get('add-progres', [ProgressController::class,'add']);
Route::post('progres-add',[ProgressController::class,'store']);
Route::get('progres-edit/{id}',[ProgressController::class,'edit']);
Route::put('progres-edit/{id}',[ProgressController::class,'update']);
Route::get('progres-delete/{id}',[ProgressController::class,'delete']);