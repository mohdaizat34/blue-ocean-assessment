<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//----------------------------------------------------------------------------------------------------


//----------------------------------------------------------------------------------------------------
// start booking system routes

use App\Http\Controllers\TrainController;

Route::get('/train-info', [TrainController::class, 'index'])->name('train-info');
Route::post('/search-trains', [TrainController::class, 'search'])->name('search-trains');
Route::get('/train/{train_id}/select-coach', [TrainController::class, 'selectCoach'])->name('select-coach');
Route::get('/train/{train_id}/coach/{coach_id}/select-seat', [TrainController::class, 'selectSeat'])->name('select-seat');
Route::get('/train/{train_id}/coach/{coach_id}/seat/{seat_id}/summary', [TrainController::class, 'showSummary'])->name('booking-summary');
Route::post('/train/{train_id}/coach/{coach_id}/seat/{seat_id}/confirm', [TrainController::class, 'confirmSeat'])->name('confirm-seat');







require __DIR__.'/auth.php';
