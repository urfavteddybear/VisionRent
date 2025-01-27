<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/item/{item}', [App\Http\Controllers\ItemController::class, 'show'])->name('item.show');
Route::get('/camera-support', [App\Http\Controllers\ItemController::class, 'cameraSupportIndex'])->name('camera-support.index');
Route::get('/lighting-audio', [App\Http\Controllers\ItemController::class, 'lightingAudioIndex'])->name('lighting-audio.index');
Route::get('/items', [ItemController::class, 'index'])->name('items.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/about', function () {
    return view('about_us');
})->name('about');

Route::get('/items/{item}/check-availability', [ItemController::class, 'checkAvailability'])
    ->name('items.check-availability');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/rental/{id}', [RentalController::class, 'show'])->name('rental.show');
    Route::get('/history', [DashboardController::class, 'showHistory'])->name('history');

    Route::get('/verification', [VerificationController::class, 'showForm'])
        ->name('verification.form');
    Route::post('/verification', [VerificationController::class, 'submit'])
        ->name('verification.submit');

    Route::get('/verification/resubmit', [VerificationController::class, 'showResubmitForm'])
        ->name('verification.resubmit');
    Route::post('/verification/resubmit', [VerificationController::class, 'resubmit'])
        ->name('verification.resubmit.submit');

});

Route::get('/items/{item}/check-availability', [ItemController::class, 'checkAvailability'])
    ->name('items.check-availability');

// Route::get('/history', function () {
//     return view('history');
// })->middleware(['auth', 'verified'])->name('history');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
