<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\StatusController;
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
Route::get('/dashboard/room/{id}/edit', [RoomController::class, 'edit']);
Route::post('/dashboard/room/{id}/edit', [RoomController::class, 'update']);
Route::post('/dashboard/room/post', [RoomController::class, 'post']);
Route::any('/dashboard/room/{id}/delete', [RoomController::class, 'delete']);

Route::get('/dashboard/status', [StatusController::class, 'index']);
Route::get('/dashboard/status/create', [StatusController::class, 'create']);
Route::post('/dashboard/status/post', [StatusController::class, 'post']);
Route::get('/dashboard/status/{id}/edit', [StatusController::class, 'edit']);
Route::post('/dashboard/status/{id}/update', [StatusController::class, 'update']);
Route::any('/dashboard/status/{id}/delete', [StatusController::class, 'delete']);

// Rote::get('/dashboard/type', []);
