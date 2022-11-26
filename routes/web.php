<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MainPageController;


Auth::routes();
Route::get('/', [MainPageController::class, 'index'])->name('index');





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
