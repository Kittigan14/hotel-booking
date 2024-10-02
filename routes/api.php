<?php

use App\Http\Controllers\Api\RoomControllerApi;
use App\Http\Controllers\Api\TypeControllerApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/room', [RoomControllerApi::class, 'room_list']);
Route::get('/room/{room_type_id}', [RoomControllerApi::class, 'room_list']);
Route::get('/room_type', [TypeControllerApi::class, 'type_list']);
Route::post('/room/search', [RoomControllerApi::class, 'room_search']);