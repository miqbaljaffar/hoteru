<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('index');
// });q22222222222222222222222222222222
route::get('/tes', function(){
    return view('p');
});
Route::get('/myaccount/edit', [UserController::class, 'cusedit']);
Route::post('/myaccount/addimage', [UserController::class, 'cusfoto']);
Route::get('/myaccount/{id}/delete-foto', [UserController::class, 'delfoto']);
Route::get('/history', [UserController::class, 'history']);
Route::get('/invoice/{id}', [OrderController::class, 'invoice']);
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/rooms', [IndexController::class, 'room']);
Route::post('/rooms', [IndexController::class, 'roompost']);
Route::get('/facilities', [IndexController::class, 'facility']);
Route::get('/contact', [IndexController::class, 'contact']);
Route::get('/about', [IndexController::class, 'about']);
Route::post('/order', [OrderController::class,'index']);
Route::get('/myaccount', [UserController::class, 'profile']);
Route::post('/order/post', [OrderController::class,'order']);
Route::get('/pesan', [IndexController::class, 'pesan'])->name('pesan');
Route::get('/bayar/{id}', [OrderController::class, 'pembayaran']);
Route::post('/bayar', [OrderController::class, 'bayar']);

Route::post('/payments/tolak', [PaymentController::class, 'tolak']);
Route::post('/payments/confirm', [PaymentController::class, 'confirmation']);


Route::get('/rooms/{no}', [RoomController::class, 'roomshow']);
Route::post('/rooms/{no}', [RoomController::class, 'roomshowpost']);

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/register', [LoginController::class, 'register'])->middleware('guest');
Route::post('/register', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/dashboard/data/room', [RoomController::class, 'index']);
Route::get('/dashboard/data/room/{room:no}/add-image', [RoomController::class, 'addimage']);
Route::post('/dashboard/data/room/{room:no}/store-image', [RoomController::class, 'storeimage']);
Route::any('/dashboard/data/room/26D/image/{id}/delete', [RoomController::class, 'deleteimage']);

Route::get('/dashboard/data/room/create', [RoomController::class, 'create']);
Route::get('/dashboard/data/room/{id}/edit', [RoomController::class, 'edit']);
Route::get('/dashboard/data/room/{room:no}', [RoomController::class, 'show']);
Route::post('/dashboard/data/room/{id}/update', [RoomController::class, 'update']);
Route::post('/dashboard/data/room/post', [RoomController::class, 'post']);
Route::any('/dashboard/data/room/{id}/delete', [RoomController::class, 'delete'])->name('room.delete');

Route::get('/dashboard/data/status', [StatusController::class, 'index']);
Route::get('/dashboard/data/status/create', [StatusController::class, 'create']);
Route::post('/dashboard/data/status/post', [StatusController::class, 'post']);
Route::get('/dashboard/data/status/{id}/edit', [StatusController::class, 'edit']);
Route::post('/dashboard/data/status/{id}/update', [StatusController::class, 'update']);
Route::any('/dashboard/data/status/{id}/delete', [StatusController::class, 'delete']);

Route::get('/dashboard/data/type', [TypeController::class, 'index']);
Route::get('/dashboard/data/type/create', [TypeController::class, 'create']);
Route::get('/dashboard/data/type/{id}/edit', [TypeController::class, 'edit']);
Route::post('/dashboard/data/type/post', [TypeController::class, 'post']);
Route::post('/dashboard/data/type/{id}/update', [TypeController::class, 'update']);
Route::any('/dashboard/data/type/{id}/delete', [TypeController::class, 'delete']);

Route::get('/dashboard/user', [UserController::class, 'index']);
Route::get('/dashboard/user/create', [UserController::class, 'create']);
Route::get('/dashboard/user/{user:username}/edit', [UserController::class, 'edit']);
// Route::get('/dashboard/user/{user:username}/show', [UserController::class, 'p']);
Route::post('/dashboard/user/post', [UserController::class, 'post']);
Route::post('/dashboard/user/{id}/update', [UserController::class, 'update']);
Route::post('/myaccount/{id}/update', [UserController::class, 'updatefront']);
Route::any('/dashboard/user/{id}/delete', [UserController::class, 'delete']);

Route::get('/dashboard/order', [TransactionController::class, 'index'])->name('transaction.index');
Route::get('/dashboard/order/history', [TransactionController::class, 'history']);

Route::get('/dashboard/order/create-identity', [TransactionController::class, 'create_identity'])->name('createidentity');
// Route::post('/dashboard/order/post-identity', [TransactionController::class, 'post_identity']);

Route::post('/dashboard/order/viewcountperson', [TransactionController::class, 'viewperson'])->name('countperson');
Route::get('/dashboard/order/viewcountperson', [TransactionController::class, 'errorget'])->name('countget');

Route::post('/dashboard/order/chooseroom', [TransactionController::class, 'chooseroom'])->name('chooseroom');
Route::get('/dashboard/order/chooseroom', [TransactionController::class, 'errorget'])->name('chooseroomget');

Route::get('/dashboard/order/pick', [TransactionController::class ,'pick'])->name('pick');
Route::post('/dashboard/order/confirmation', [TransactionController::class, 'confirmation'])->name('confirmation');
Route::get('/dashboard/order/confirmation', [TransactionController::class, 'errorget'])->name('confirmationget');

Route::post('/dashboard/order/pay', [TransactionController::class, 'payDownPayment'])->name('payDownPayment');
Route::get('/dashboard/payment/invoice', [TransactionController::class, 'paymentinvoice']);
Route::get('/dashboard/order/history-pay', [PaymentController::class, 'index']);
Route::get('/dashboard/order/{id}/pay-debt', [PaymentController::class, 'debt']);
Route::post('/dashboard/order/debt', [PaymentController::class, 'pays'])->name('paydebt');

Route::post('/dashboard/notif', [DashboardController::class, 'notifiable']);
Route::get('/dashboard/markall', [DashboardController::class, 'markall']);

Route::get('/dashboard/order/history-pay/{id}', [PaymentController::class, 'invoice'])->name('payment.invoice');
