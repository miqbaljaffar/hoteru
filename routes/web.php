<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
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

Route::get('/', function(){
    if(Auth::check()){
        $name = Auth::user()->Customer->name;
    }
    else{
        $name = "Pelanggan";
    }
    // dd(Auth::check());
    // dd($p);
    return view('index', compact('name'));
});
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
Route::any('/dashboard/user/{id}/delete', [UserController::class, 'delete']);

Route::get('/dashboard/order', [TransactionController::class, 'index']);
Route::get('/dashboard/order/history', [TransactionController::class, 'history']);
Route::get('/dashboard/order/create-identity', [TransactionController::class, 'create_identity']);
Route::get('/dashboard/order/viewcountperson', [TransactionController::class, 'viewperson']);
Route::get('/dashboard/order/chooseroom', [TransactionController::class, 'chooseroom']);
Route::get('/dashboard/order/confirmation', [TransactionController::class, 'confirmation']);
