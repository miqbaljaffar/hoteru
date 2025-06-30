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
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini Anda dapat mendaftarkan rute web untuk aplikasi Anda.
| Rute-rute ini dimuat oleh RouteServiceProvider dalam sebuah grup
| yang berisi grup middleware "web".
|
*/

//== HALAMAN PUBLIK (FRONTEND) ==
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/rooms', [IndexController::class, 'room'])->name('rooms.index');
Route::get('/facilities', [IndexController::class, 'facility'])->name('facilities');
Route::get('/contact', [IndexController::class, 'contact'])->name('contact');
Route::get('/about', [IndexController::class, 'about'])->name('about');
Route::get('/rooms/{room:no}', [RoomController::class, 'roomshow'])->name('rooms.show');
// CATATAN: Method POST untuk route ini telah dipindahkan ke proses order untuk kejelasan alur.


//== HALAMAN YANG MEMBUTUHKAN OTENTIKASI (PENGGUNA LOGIN) ==
Route::middleware('auth')->group(function () {
    // Akun Pengguna
    Route::prefix('myaccount')->name('myaccount.')->group(function () {
        Route::get('/', [UserController::class, 'profile'])->name('profile');
        Route::get('/edit', [UserController::class, 'cusedit'])->name('edit');
        Route::put('/{id}/update', [UserController::class, 'updatefront'])->name('update'); // REFAKTOR: Gunakan PUT untuk update
        Route::post('/change-photo', [UserController::class, 'cusfoto'])->name('photo.change'); // REFAKTOR: Penamaan lebih jelas
        Route::delete('/delete-photo', [UserController::class, 'delfoto'])->name('photo.delete'); // REFAKTOR: Gunakan DELETE
    });

    // Proses Order & Pembayaran
    Route::get('/history', [UserController::class, 'history'])->name('history');
    Route::post('/order', [OrderController::class, 'index'])->name('order.index');
    Route::post('/order/create', [OrderController::class, 'order'])->name('order.store');
    Route::get('/payment/{transaction}', [OrderController::class, 'pembayaran'])->name('payment.form'); // REFAKTOR: Route model binding
    Route::post('/payment', [OrderController::class, 'bayar'])->name('payment.store');
    Route::get('/invoice/{transaction}', [OrderController::class, 'invoice'])->name('invoice'); // REFAKTOR: Route model binding

    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});


//== HALAMAN ADMIN (DASHBOARD) ==
Route::prefix('dashboard')->middleware(['auth', 'admin'])->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    // Data Master
    Route::resource('rooms', RoomController::class)->parameters(['rooms' => 'room:no']);
    Route::resource('statuses', StatusController::class)->except(['show']);
    Route::resource('types', TypeController::class)->except(['show']);
    Route::resource('users', UserController::class);

    // Manajemen Gambar Kamar (Sub-resource dari Rooms)
    Route::prefix('rooms/{room:no}/images')->name('rooms.images.')->group(function() {
        Route::get('/create', [RoomController::class, 'addimage'])->name('create');
        Route::post('/', [RoomController::class, 'storeimage'])->name('store');
        Route::delete('/{image}', [RoomController::class, 'deleteimage'])->name('destroy');
    });

    // Manajemen Order Admin
    Route::prefix('orders')->name('orders.')->group(function() {
        Route::get('/', [TransactionController::class, 'index'])->name('index');
        Route::get('/history', [TransactionController::class, 'history'])->name('history');
        Route::get('/create', [TransactionController::class, 'create_identity'])->name('create');
        Route::post('/select-room', [TransactionController::class, 'chooseroom'])->name('select_room');
        Route::post('/confirmation', [TransactionController::class, 'confirmation'])->name('confirmation');
        Route::post('/pay', [TransactionController::class, 'payDownPayment'])->name('pay');
    });

    // Manajemen Pembayaran Admin
    Route::prefix('payments')->name('payments.')->group(function() {
        Route::get('/history', [PaymentController::class, 'index'])->name('history');
        Route::get('/invoice/{payment}', [PaymentController::class, 'invoice'])->name('invoice');
        Route::get('/{transaction}/pay-debt', [PaymentController::class, 'debt'])->name('debt');
        Route::post('/pay-debt', [PaymentController::class, 'pays'])->name('paydebt.store');
        Route::post('/confirm', [PaymentController::class, 'confirmation'])->name('confirm');
        Route::post('/reject', [PaymentController::class, 'tolak'])->name('reject');
    });

    // Notifikasi
    Route::post('/notifications/read', [DashboardController::class, 'notifiable'])->name('notifications.read');
    Route::get('/notifications/mark-all-as-read', [DashboardController::class, 'markall'])->name('notifications.markall');
});

//== HALAMAN LOGIN & REGISTER (UNTUK TAMU) ==
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::get('/register', [LoginController::class, 'register'])->name('register');
    Route::post('/register', [LoginController::class, 'store']);
});
