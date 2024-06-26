<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('home', [HomeController::class, 'home'])->name('home');
Route::get('list-agen46', [HomeController::class, 'list_agen46'])->name('list-agen46');
//Route::get('simple-map', [HomeController::class, 'simple_map'])->name('simple-map');
Route::get('simple-v2', [HomeController::class, 'simple_v2'])->name('simple-v2');
Route::get('about', [HomeController::class, 'about'])->name('about');
Route::get('daftar', [HomeController::class, 'daftar'])->name('daftar');
Route::get('testing', [HomeController::class, 'testing'])->name('testing');
//Route::get('dashboardadmin', [HomeController::class, 'dashboardadmin'])->name('dashboardadmin');


Route::middleware(['guest:user'])->group(function () {
    Route::get('admin', function () {
        return view('auth.loginadmin');
    })->name('loginadmin');
    Route::post('prosesloginadmin', [AuthController::class, 'prosesloginadmin']);
});

Route::middleware(['auth:user'])->group(function () {
    Route::get('proseslogoutadmin', [AuthController::class, 'proseslogoutadmin']);
    // Route::get('admin/dashboardadmin', [HomeController::class, 'dashboardadmin']);
    Route::get('dashboardadmin', [HomeController::class, 'dashboardadmin'])->name('dashboardadmin');
    Route::get('list-agen46admin', [HomeController::class, 'list_agen46admin'])->name('list-agen46admin');
    Route::post('agen/store', [HomeController::class, 'store']);
    Route::post('agen/edit', [HomeController::class, 'edit']);
    Route::post('agen/{kode_agen}/update', [HomeController::class, 'update']);
    Route::post('agen/{kode_agen}/delete', [HomeController::class, 'delete']);
    Route::get('simple-v2admin', [HomeController::class, 'simple_v2admin'])->name('simple-v2admin');
    
});
