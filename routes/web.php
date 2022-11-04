<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', function(){
    return view('index');
});
Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::get('/register', [LoginController::class, 'register'])->middleware('guest');


Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/dashboard/room', [RoomController::class, 'index']);
Route::get('/dashboard/room/create', [RoomController::class, 'create']);
Route::post('/dashboard/room/post', [RoomController::class, 'post']);
