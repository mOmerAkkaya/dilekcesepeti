<?php

use App\Http\Controllers\BasketController;
use App\Http\Controllers\CommentsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PanelDocuments;
use App\Http\Controllers\PanelContacts;
use App\Http\Controllers\PanelContents;
use App\Http\Controllers\PanelHome;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PayControlller;
use App\Http\Controllers\PanelComments;
use App\Http\Controllers\PanelMembers;
use App\Models\Orders;

Auth::routes();
Route::get('/', [MainPageController::class, 'index'])->name('index');

Route::resource('icerik', PageController::class);
Route::resource('dokuman', DocumentController::class);
Route::resource('iletisim', ContactController::class);
Route::resource('sepet', BasketController::class);
Route::post('comment/store', [CommentsController::class, 'store'])->name('comment.store');



Route::group(['prefix' => 'dokumanlar', 'as' => 'document.'], function () {
    Route::get('/tumu', [DocumentController::class, 'all'])->name('index');
    Route::get('/kategori/{slug}', [DocumentController::class, 'categories'])->name('categories');

});

Route::group(['prefix' => 'odeme', 'as' => 'odeme.'], function () {
    Route::post('/odeme', [PayControlller::class, 'pay'])->name('pay');
    Route::post('/basarili', [DocumentController::class, 'paysuccess'])->name('success');
});



Route::group(['prefix' => 'panel', 'as' => 'panel.', 'middleware' => 'AdminCheck'], function () {
    Route::get('/', [HomeController::class, 'index'])->name("index");
    Route::resource('documentpanel', PanelDocuments::class);
    Route::resource('notifications', NotificationController::class);
    Route::resource('contacts', PanelContacts::class);
    Route::resource('contents', PanelContents::class);
    Route::resource('comments', PanelComments::class);
    Route::resource('members', PanelMembers::class);
    Route::resource('orders', OrdersController::class);

    Route::get('/improve', [PanelDocuments::class, 'improve'])->name("improve");
    Route::get('/truncate', [PanelDocuments::class, 'truncate'])->name("truncate");
});

Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => 'auth'], function () {
    Route::get('/', [UserHomeController::class, 'index'])->name("index");
});

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "Cache is cleared";
})->name("cache");

