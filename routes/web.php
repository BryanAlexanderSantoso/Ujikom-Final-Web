<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatTypeController;
use App\Http\Controllers\ConcertController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/concerts', 'ConcertController@index')->name('concert');
Route::get('/payments', 'PaymentController@index')->name('payment');
Route::get('/cat_types', 'CatTypeController@index')->name('CatType');
Route::get('/tickets', 'TicketController@index')->name('Ticket');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/cat_types', [CatTypeController::class, 'index'])->name('cat_types.index');
Route::get('/cat_types/create', [CatTypeController::class, 'create'])->name('cat_types.create');
Route::post('/cat_types', [CatTypeController::class, 'store'])->name('cat_types.store');
Route::get('/cat_types/{catType}', [CatTypeController::class, 'show'])->name('cat_types.show');
Route::get('/cat_types/{catType}/edit', [CatTypeController::class, 'edit'])->name('cat_types.edit');
Route::put('/cat_types/{catType}', [CatTypeController::class, 'update'])->name('cat_types.update');
Route::delete('/cat_types/{catType}', [CatTypeController::class, 'destroy'])->name('cat_types.destroy');

Route::get('/concerts', [ConcertController::class, 'index'])->name('concerts.index');
Route::get('/concerts/create', [ConcertController::class, 'create'])->name('concerts.create');
Route::post('/concerts', [ConcertController::class, 'store'])->name('concerts.store');
Route::get('/concerts/{concert}', [ConcertController::class, 'show'])->name('concerts.show');
Route::get('/concerts/{concert}/edit', [ConcertController::class, 'edit'])->name('concerts.edit');
Route::put('/concerts/{concert}', [ConcertController::class, 'update'])->name('concerts.update');
Route::delete('/concerts/{concert}', [ConcertController::class, 'destroy'])->name('concerts.destroy');

Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('tickets.show');
Route::get('/tickets/{ticket}/edit', [TicketController::class, 'edit'])->name('tickets.edit');
Route::put('/tickets/{ticket}', [TicketController::class, 'update'])->name('tickets.update');
Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy'])->name('tickets.destroy');

Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
Route::get('/payments/create', [PaymentController::class, 'create'])->name('payments.create');
Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
Route::get('/payments/{payment}', [PaymentController::class, 'show'])->name('payments.show');
Route::get('/payments/{payment}/edit', [PaymentController::class, 'edit'])->name('payments.edit');
Route::put('/payments/{payment}', [PaymentController::class, 'update'])->name('payments.update');
Route::delete('/payments/{payment}', [PaymentController::class, 'destroy'])->name('payments.destroy');

