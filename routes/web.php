<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PictureController;
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
Route::get('/user', [UserController::class, 'index'])->name('user')->middleware('auth');
Route::get('/adduser', [UserController::class, 'adduser'])->name('adduser')->middleware('auth');
Route::post('/insertuser', [UserController::class, 'insertuser'])->name('insertuser')->middleware('auth');
Route::get('/edituser/{id}', [UserController::class, 'edituser'])->name('edituser')->middleware('auth');
Route::post('/updateuser/{id}', [UserController::class, 'updateuser'])->name('updateuser')->middleware('auth');
Route::get('/deleteuser/{id}', [UserController::class, 'deleteuser'])->name('deleteuser')->middleware('auth');
Route::get('/exportpdf', [UserController::class, 'exportpdf'])->name('exportpdf')->middleware('auth');

Route::get('/client', [ClientController::class, 'index'])->name('client')->middleware('auth');
Route::get('/tambahdata', [ClientController::class, 'tambahdata'])->name('tambahdata')->middleware('auth');
Route::post('/insertdata', [ClientController::class, 'insertdata'])->name('insertdata')->middleware('auth');
Route::get('/tampilkandata/{slug}', [ClientController::class, 'tampilkandata'])->name('tampilkandata')->middleware('auth');
Route::post('/updatedata/{slug}', [ClientController::class, 'updatedata'])->name('updatedata')->middleware('auth');
Route::get('client-delete/{slug}',[ClientController::class,'destroy'])->name('clientdelete')->middleware('auth');
Route::get('client-deleted',[ClientController::class,'deletedClients'])->middleware('auth');
Route::get('client-restore/{slug}',[ClientController::class,'restore'])->middleware('auth');

// route project
route::get('/project','App\Http\Controllers\ProjectController@index')->name('project')->middleware('auth');
route::get('/project/create','App\Http\Controllers\ProjectController@create')->name('project.create')->middleware('auth');
route::post('/project/add','App\Http\Controllers\ProjectController@add')->name('project.add')->middleware('auth');
Route::get('/edit/{slug}', [ProjectController::class, 'edit'])->name('edit')->middleware('auth');
Route::post('/update/{slug}', [ProjectController::class, 'update'])->name('update')->middleware('auth');
Route::get('delete/{slug}',[ProjectController::class,'delete'])->name('delete')->middleware('auth');

//progres

Route::get('/progres', [ProgressController::class, 'index'])->name('progres');
Route::get('add-progres', [ProgressController::class,'add']);
Route::post('progres-add',[ProgressController::class,'store']);
Route::get('progres-edit/{slug}',[ProgressController::class,'edit']);
Route::put('update/{slug}',[ProgressController::class,'update']);
Route::get('progresdelete/{slug}',[ProgressController::class,'progresdelete'])->name('progresdelete');
Route::get('/detailprogres/{id}', [ProgressController::class, 'detail']);


Route::get('/picture-destroy/{id}',[PictureController::class,'destroy']);

Route::get('/progres', [ProgressController::class, 'index'])->name('progres')->middleware('auth');
Route::get('add-progres', [ProgressController::class,'add'])->middleware('auth');
Route::post('progres-add',[ProgressController::class,'store'])->middleware('auth');
Route::get('/progres-edit/{slug}',[ProgressController::class,'edit'])->middleware('auth');
Route::put('/update/{slug}',[ProgressController::class,'update'])->middleware('auth');
Route::get('progresdelete/{slug}',[ProgressController::class,'progresdelete'])->name('progresdelete')->middleware('auth');
Route::get('/detailprogres/{id}', [ProgressController::class, 'detail'])->middleware('auth');



//Offer
Route::get('/offer',[OfferController::class,'index'])->name('offer');
Route::get('add-offer',[OfferController::class,'add'])->name('offer.add');
Route::post('offer-add',[OfferController::class,'store'])->name('offer.store');
Route::get('editoffer/{id}',[OfferController::class,'edit'])->name('offer.edit');
Route::put('editoffer/{id}',[OfferController::class,'update'])->name('offer.update');
Route::get('/detail-offer/{offer}', [OfferController::class, 'detail'])->name('detail-offer');
Route::get('/deleteoffer/{id}', [OfferController::class, 'deleteoffer'])->name('deleteoffer');


Route::get('/offer',[OfferController::class,'index'])->name('offer')->middleware('auth')->middleware('auth');
Route::get('add-offer',[OfferController::class,'add'])->name('offer.add')->middleware('auth');
Route::post('offer-add',[OfferController::class,'store'])->name('offer.store')->middleware('auth');
Route::get('editoffer/{id}',[OfferController::class,'edit'])->name('offer.edit')->middleware('auth');
Route::put('editoffer/{id}',[OfferController::class,'update'])->name('offer.update')->middleware('auth');
Route::get('/deleteoffer/{id}', [OfferController::class, 'deleteoffer'])->name('deleteoffer')->middleware('auth');
Route::get('/detailoffer/{id}', [OfferController::class, 'detail'])->name('offer.detail')->middleware('auth');
Route::get('export',[OfferController::class, 'export_pdf']);


//Pembayaran
Route::get('/payment', [PaymentController::class, 'index'])->name('payment')->middleware('auth');
Route::get('add-payment', [PaymentController::class,'add'])->middleware('auth');
Route::post('payment-add',[PaymentController::class,'store'])->middleware('auth');
Route::get('payment-edit/{id}',[PaymentController::class,'edit'])->name('payment.edit')->middleware('auth');
Route::put('payment-update/{id}',[PaymentController::class,'update'])->name('payment.update')->middleware('auth');
Route::get('paymentdelete/{id}', [PaymentController::class, 'paymentdelete'])->name('paymentdelete')->middleware('auth');
//Detail

Route::get('/detailoffer/{offer}', [OfferController::class, 'detail'])->name('offer.detail');
route::get('/offer/detailoffer','App\Http\Controllers\OfferController@addcategory')->name('offer.addcategory');
route::get('/offer/add','App\Http\Controllers\OfferController@addfacility')->name('offer.addfacility');
route::post('/offer/insertcategory','App\Http\Controllers\OfferController@insertcategory')->name('offer.insertcategory');
route::post('/offer/insertfacility','App\Http\Controllers\OfferController@insertfacility')->name('offer.insertfacility');



Route::group(['middleware' => ['auth', 'CekLevel:admin']], function() {
    Route::get('/user', [UserController::class, 'index'])->name('user')->middleware('auth');
    Route::get('/adduser', [UserController::class, 'adduser'])->name('adduser')->middleware('auth');
    Route::post('/insertuser', [UserController::class, 'insertuser'])->name('insertuser')->middleware('auth');
    Route::get('/edituser/{id}', [UserController::class, 'edituser'])->name('edituser')->middleware('auth');
    Route::post('/updateuser/{id}', [UserController::class, 'updateuser'])->name('updateuser')->middleware('auth');
    Route::get('/deleteuser/{id}', [UserController::class, 'deleteuser'])->name('deleteuser')->middleware('auth');
    Route::get('/exportpdf', [UserController::class, 'exportpdf'])->name('exportpdf')->middleware('auth');
    //client
    Route::get('/client', [ClientController::class, 'index'])->name('client')->middleware('auth');
    Route::get('/tambahdata', [ClientController::class, 'tambahdata'])->name('tambahdata')->middleware('auth');
    Route::post('/insertdata', [ClientController::class, 'insertdata'])->name('insertdata')->middleware('auth');
    Route::get('/tampilkandata/{slug}', [ClientController::class, 'tampilkandata'])->name('tampilkandata')->middleware('auth');
    Route::post('/updatedata/{slug}', [ClientController::class, 'updatedata'])->name('updatedata')->middleware('auth');
    Route::get('client-delete/{slug}',[ClientController::class,'destroy'])->name('clientdelete')->middleware('auth');
    Route::get('client-deleted',[ClientController::class,'deletedClients'])->middleware('auth');
    Route::get('client-restore/{slug}',[ClientController::class,'restore'])->middleware('auth');
    // route project
    route::get('/project','App\Http\Controllers\ProjectController@index')->name('project')->middleware('auth');
    route::get('/project/create','App\Http\Controllers\ProjectController@create')->name('project.create')->middleware('auth');
    route::post('/project/add','App\Http\Controllers\ProjectController@add')->name('project.add')->middleware('auth');
    Route::get('/edit/{slug}', [ProjectController::class, 'edit'])->name('edit')->middleware('auth');
    Route::post('/update/{slug}', [ProjectController::class, 'update'])->name('update')->middleware('auth');
    Route::get('delete/{slug}',[ProjectController::class,'delete'])->name('delete')->middleware('auth');
    //progres
    Route::get('/picture-destroy/{id}',[PictureController::class,'destroy']); 
    Route::get('/progres', [ProgressController::class, 'index'])->name('progres')->middleware('auth');
    Route::get('add-progres', [ProgressController::class,'add'])->middleware('auth');
    Route::post('progres-add',[ProgressController::class,'store'])->middleware('auth');
    Route::get('/progres-edit/{slug}',[ProgressController::class,'edit'])->middleware('auth');
    Route::put('/update/{slug}',[ProgressController::class,'update'])->middleware('auth');
    Route::get('progresdelete/{slug}',[ProgressController::class,'progresdelete'])->name('progresdelete')->middleware('auth');
    Route::get('/detailprogres/{id}', [ProgressController::class, 'detail'])->middleware('auth');
    //Offer
    Route::get('/offer',[OfferController::class,'index'])->name('offer')->middleware('auth')->middleware('auth');
    Route::get('add-offer',[OfferController::class,'add'])->name('offer.add')->middleware('auth');
    Route::post('offer-add',[OfferController::class,'store'])->name('offer.store')->middleware('auth');
    Route::get('editoffer/{id}',[OfferController::class,'edit'])->name('offer.edit')->middleware('auth');
    Route::put('editoffer/{id}',[OfferController::class,'update'])->name('offer.update')->middleware('auth');
    Route::get('/deleteoffer/{id}', [OfferController::class, 'deleteoffer'])->name('deleteoffer')->middleware('auth');
    //Pembayaran
    Route::get('/payment', [PaymentController::class, 'index'])->name('payment')->middleware('auth');
    Route::get('add-payment', [PaymentController::class,'add'])->middleware('auth');
    Route::post('payment-add',[PaymentController::class,'store'])->middleware('auth');
    Route::get('payment-edit/{id}',[PaymentController::class,'edit'])->name('payment.edit')->middleware('auth');
    Route::put('payment-update/{id}',[PaymentController::class,'update'])->name('payment.update')->middleware('auth');
    Route::get('paymentdelete/{id}', [PaymentController::class, 'paymentdelete'])->name('paymentdelete')->middleware('auth');
    //Detail
    Route::get('/detailoffer/{offer}', [OfferController::class, 'detail'])->name('offer.detail')->middleware('auth');
});
//owner
Route::group(['middleware' => ['auth', 'CekLevel:admin,owner']], function() {
    Route::get('/user', [UserController::class, 'index'])->name('user')->middleware('auth');
    Route::get('/client', [ClientController::class, 'index'])->name('client')->middleware('auth');
    route::get('/project','App\Http\Controllers\ProjectController@index')->name('project')->middleware('auth');
    Route::get('/progres', [ProgressController::class, 'index'])->name('progres')->middleware('auth');
    Route::get('/offer',[OfferController::class,'index'])->name('offer')->middleware('auth')->middleware('auth');
    Route::get('/payment', [PaymentController::class, 'index'])->name('payment')->middleware('auth');
});

//login
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [AuthController::class, 'logout']);