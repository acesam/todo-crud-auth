<?php

use App\Http\Controllers\API\NoteController;
use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

Route::group(['prefix' => 'notes', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [NoteController::class, 'index']);
    Route::post('add', [NoteController::class, 'add']);
    Route::get('edit/{id}', [NoteController::class, 'edit']);
    Route::post('update/{id}', [NoteController::class, 'update']);
    Route::delete('delete/{id}', [NoteController::class, 'delete']);
});
