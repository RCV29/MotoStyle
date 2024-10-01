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
Route::get('/motor/create',[MotorController::class, 'create'])->name('motorcreate');
Route::post('/motor',[MotorController::class, 'store'])->name('motorstore');

Route::get('/community',[CommunityController::class, 'index'])->middleware(['auth', 'verified'])->name('community');
Route::get('/community/create',[CommunityController::class, 'create'])->name('communitycreate');
Route::post('/community',[CommunityController::class, 'store'])->name('communitystore');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
