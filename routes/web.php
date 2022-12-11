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

Route::group(['prefix' => 'documents', 'as' => 'documents.'], function () {
    Route::get('/', [DocumentController::class, 'all'])->name('index');
    Route::get('/categories/{slug}', [DocumentController::class, 'categories'])->name('categories');

});




Route::group(['prefix' => 'panel', 'as' => 'panel.', 'middleware' => 'AdminCheck'], function () {
    Route::get('/', [HomeController::class, 'index'])->name("index");
});

Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => 'auth'], function () {
    Route::get('/', [UserHomeController::class, 'index'])->name("index");
});