<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\CheckLogin;
use App\Http\Middleware\CheckNotLogged;
use Illuminate\Support\Facades\Route;

Route::middleware([CheckNotLogged::class])->group(function(){
    Route::get('/login', [AuthController::class, 'login']);
    Route::post('/loginSubmit', [AuthController::class, 'loginSubmit']);
});

Route::middleware([CheckLogin::class])->group(function(){
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/', [MainController::class, 'index']);
    Route::get('/newNote', [MainController::class, 'newNote']);
});
