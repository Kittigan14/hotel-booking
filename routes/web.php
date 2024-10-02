<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;

Route::get('/', function () {
    return view('layouts.master');
});

// Back End
Route::get('/room', [RoomController::class, 'index']);
Route::post('room/search', [RoomController::class, 'search']);
Route::get('room/search', [RoomController::class, 'search']);
Route::get('/room/edit/{id?}', [RoomController::class, 'edit']);
Route::post('/room/update', [RoomController::class, 'update']);
Route::post('/room/insert', [RoomController::class , 'insert' ]);
Route::get('/room/remove/{id}', [RoomController::class , 'remove' ]);

// Front End
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Like
Route::get('like/view', [LikeController::class, 'viewLike']);
Route::get('like/add/{id}', [LikeController::class, 'addToLike']);
Route::get('like/delete/{id}', [LikeController::class, 'deletelike']);
Route::get('like/update/{id}/{qty}', [LikeController::class, 'updateQty']);

// Bookings
// Route::group(['middleware' => 'auth'], function() {
//     Route::get('bookings/create/{roomId}', [BookingController::class, 'create'])->name('bookings.create');
//     Route::post('bookings', [BookingController::class, 'store'])->name('bookings.store');
// });