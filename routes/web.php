<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\CommunityController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/motor',[MotorController::class, 'index'])->middleware(['auth', 'verified'])->name('motor');
Route::get('/motor/create',[MotorController::class, 'create'])->name('motor.create');
Route::post('/motor',[MotorController::class, 'store'])->name('motorstore');
Route::get('/motor/show', [MotorController::class, 'show'])->middleware(['auth', 'verified'])->name('motor.show');
Route::get('/motor/edit/{id}', [MotorController::class, 'edit'])->middleware(['auth', 'verified'])->name('motor.edit');
Route::put('/motor/{id}', [MotorController::class, 'update'])->middleware(['auth', 'verified'])->name('motor.update');
Route::delete('/motor/{id}', [MotorController::class, 'destroy'])->middleware(['auth', 'verified'])->name('motor.destroy');




Route::get('/community',[CommunityController::class, 'index'])->middleware(['auth', 'verified'])->name('community');
Route::get('/community/create',[CommunityController::class, 'create'])->name('community.create');
Route::post('/community',[CommunityController::class, 'store'])->name('communitystore');
Route::get('/community/show', [CommunityController::class, 'show'])->middleware(['auth', 'verified'])->name('community.show');
Route::get('/community/edit/{id}', [CommunityController::class, 'edit'])->middleware(['auth', 'verified'])->name('community.edit');
Route::put('/community/{id}', [CommunityController::class, 'update'])->middleware(['auth', 'verified'])->name('community.update');
Route::delete('/community/{id}', [CommunityController::class, 'destroy'])->middleware(['auth', 'verified'])->name('community.destroy');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
