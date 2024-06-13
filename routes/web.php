<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard/order',[OrderController::class,'index'])->middleware(['auth', 'verified'])->name('orderList');
Route::get('/dashboard/order/{id}', [OrderController::class, 'show'])->middleware(['auth', 'verified'])->name('orderDetail');
Route::post('/dashboard/order/{id}/pickup', [OrderController::class, 'updateStatusToProses'])->name('pickup');
Route::post('/dashboard/order/{id}/cancel', [OrderController::class, 'updateStatusToBatal'])->name('batal');
Route::get('/', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
