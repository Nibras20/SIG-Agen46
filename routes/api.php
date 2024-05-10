<?php

use App\Http\Controllers\AgenController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('agen/json', [AgenController::class, 'json'])->name('api.agen.json');
