<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

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
})->middleware('auth');

Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

//Route User
Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/adduser', [UserController::class, 'adduser'])->name('adduser');
Route::post('/insertuser', [UserController::class, 'insertuser'])->name('insertuser');
Route::get('/edituser/{id}', [UserController::class, 'edituser'])->name('edituser');
Route::post('/updateuser/{id}', [UserController::class, 'updateuser'])->name('updateuser');
Route::get('/deleteuser/{id}', [UserController::class, 'deleteuser'])->name('deleteuser');
Route::get('/exportpdf', [UserController::class, 'exportpdf'])->name('exportpdf');

Route::get('/client', [ClientController::class, 'index'])->name('client');
Route::get('/tambahdata', [ClientController::class, 'tambahdata'])->name('tambahdata');
Route::post('/insertdata', [ClientController::class, 'insertdata'])->name('insertdata');
Route::get('/tampilkandata/{slug}', [ClientController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata/{slug}', [ClientController::class, 'updatedata'])->name('updatedata');
Route::get('client-delete/{slug}',[ClientController::class,'destroy'])->name('clientdelete');
Route::get('client-deleted',[ClientController::class,'deletedClients']);
Route::get('client-restore/{slug}',[ClientController::class,'restore']);

// route project
route::get('/project','App\Http\Controllers\ProjectController@index')->name('project');
route::get('/project/create','App\Http\Controllers\ProjectController@create')->name('project.create');
route::post('/project/add','App\Http\Controllers\ProjectController@add')->name('project.add');
Route::get('/edit/{slug}', [ProjectController::class, 'edit'])->name('edit');
Route::post('/update/{slug}', [ProjectController::class, 'update'])->name('update');
Route::get('delete/{slug}',[ProjectController::class,'delete'])->name('delete');

//progres
Route::get('/progres', [ProgressController::class, 'index'])->name('progres');
Route::get('add-progres', [ProgressController::class,'add']);
Route::post('progres-add',[ProgressController::class,'store']);
Route::get('progres-edit/{slug}',[ProgressController::class,'edit']);
Route::put('update/{slug}',[ProgressController::class,'update']);
Route::get('progresdelete/{slug}',[ProgressController::class,'progresdelete'])->name('progresdelete');
Route::get('/detailprogres/{id}', [ProgressController::class, 'detail']);
//Offer
Route::get('/offer',[OfferController::class,'index'])->name('offer');;
Route::get('add-offer',[OfferController::class,'add'])->name('offer.add');
Route::post('offer-add',[OfferController::class,'store'])->name('offer.store');;
Route::get('editoffer/{id}',[OfferController::class,'edit'])->name('offer.edit');;
Route::put('editoffer/{id}',[OfferController::class,'update'])->name('offer.update');;
Route::get('/detail-offer/{offer}', [OfferController::class, 'detail'])->name('detail-offer');;
Route::get('/deleteoffer/{id}', [OfferController::class, 'deleteoffer'])->name('deleteoffer');;


//Pembayaran
Route::get('/payment', [PaymentController::class, 'index'])->name('payment');
Route::get('add-payment', [PaymentController::class,'add']);
Route::post('payment-add',[PaymentController::class,'store']);
Route::get('payment-edit/{id}',[PaymentController::class,'edit'])->name('payment.edit');
Route::put('payment-update/{id}',[PaymentController::class,'update'])->name('payment.update');
Route::get('paymentdelete/{id}', [PaymentController::class, 'paymentdelete'])->name('paymentdelete');
//Detail
Route::get('/detailoffer/{offer}', [OfferController::class, 'detail'])->name('offer.detail');
route::get('/offer/detailoffer','App\Http\Controllers\OfferController@addcategory')->name('offer.addcategory');
route::get('/offer/add','App\Http\Controllers\OfferController@addfacility')->name('offer.addfacility');
route::post('/offer/insertcategory','App\Http\Controllers\OfferController@insertcategory')->name('offer.insertcategory');
route::post('/offer/insertfacility','App\Http\Controllers\OfferController@insertfacility')->name('offer.insertfacility');
//login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [AuthController::class, 'logout']);