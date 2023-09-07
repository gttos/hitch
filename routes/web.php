<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\TipController;

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

Route::get('/google-auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/google-auth/callback', [RegisteredUserController::class, 'googleStore']);

Route::controller(TipController::class)->group(function () {
    Route::get('/tips', 'index')->name('tip.index');
    Route::patch('/tips', 'update')->name('tip.update');
    Route::patch('/tips', 'update')->name('tip.update');
    Route::get('/tips/{name}', 'show')->name('tip.show');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::controller(CardController::class)->group(function () {
        Route::get('/cards', 'create')->name('cards.create');
        Route::post('/cards', 'store')->name('cards.store');
        Route::get('/cards/{id}', 'edit')->name('cards.edit');
        Route::patch('/cards', 'update')->name('cards.update');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
