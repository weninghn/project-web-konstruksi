<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClientController;

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

// client
Route::get('/client', [ClientController::class, 'index'])->name('client');
// tambahdata
Route::get('/tambahdata', [ClientController::class, 'tambahdata'])->name('tambahdata');
Route::post('/insertdata', [ClientController::class, 'insertdata'])->name('insertdata');
//edit
Route::get('/tampilkandata{id}', [ClientController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata{id}', [ClientController::class, 'updatedata'])->name('updatedata');
//hapus
Route::get('/delete/{id}', [ClientController::class, 'delete'])->name('delete');
// route project
route::get('/project','App\Http\Controllers\ProjectController@index')->name('project');
route::get('/project/create','App\Http\Controllers\ProjectController@create')->name('project.create');
route::post('/project/add','App\Http\Controllers\ProjectController@add')->name('project.add');


// Route::get('/users', [UserController::class, 'index']);
// Route::get('add_user', [UserController::class,'add']);
// Route::post('user-add',[UserController::class,'store']);
// Route::get('user-edit/{id}',[UserController::class,'edit']);
// Route::put('user-edit/{id}',[UserController::class,'update']);
// Route::get('user-delete/{id}',[UserController::class,'delete']);
// Route::get('user-deleted',[UserController::class,'deleteduser']);
