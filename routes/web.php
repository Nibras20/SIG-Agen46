<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('list-agen46', [HomeController::class, 'list_agen46'])->name('list-agen46');
Route::get('simple-map', [HomeController::class, 'simple_map'])->name('simple-map');
Route::get('about', [HomeController::class, 'about'])->name('about');
Route::get('testing', [HomeController::class, 'testing'])->name('testing');