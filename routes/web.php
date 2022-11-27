<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;


Auth::routes();
Route::get('/', [MainPageController::class, 'index'])->name('index');

Route::resource('documents', DocumentController::class);
Route::resource('contact', ContactController::class);


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index'])->name("index");
});