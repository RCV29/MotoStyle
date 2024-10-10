<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\HomeController;


Route::get('/', function () {
    return view('welcome');
});

route::get("dashboard",[HomeController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/motor',[MotorController::class, 'index'])->middleware(['auth', 'verified'])->name('motor');
Route::get('/motor/create',[MotorController::class, 'create'])->name('motor.create');
Route::post('/motor',[MotorController::class, 'store'])->name('motorstore');
Route::get('/motor/show', [MotorController::class, 'show'])->middleware(['auth', 'verified'])->name('motor.show');
Route::get('/motor/edit/{id}', [MotorController::class, 'edit'])->middleware(['auth', 'verified'])->name('motor.edit');
Route::put('/motor/{id}', [MotorController::class, 'update'])->middleware(['auth', 'verified'])->name('motor.update');
Route::delete('/motor/{id}', [MotorController::class, 'destroy'])->middleware(['auth', 'verified'])->name('motor.destroy');
Route::get('/motor/{id}', [MotorController::class, 'see'])->name('motor.see');
Route::post('/motor/{id}/comment', [MotorController::class, 'comment'])->name('motor.comment');


Route::get('/community',[CommunityController::class, 'index'])->middleware(['auth', 'verified'])->name('community');
Route::get('/community/create',[CommunityController::class, 'create'])->name('community.create');
Route::post('/community',[CommunityController::class, 'store'])->name('communitystore');
Route::get('/community/show', [CommunityController::class, 'show'])->middleware(['auth', 'verified'])->name('community.show');
Route::get('/community/edit/{id}', [CommunityController::class, 'edit'])->middleware(['auth', 'verified'])->name('community.edit');
Route::put('/community/{id}', [CommunityController::class, 'update'])->middleware(['auth', 'verified'])->name('community.update');
Route::delete('/community/{id}', [CommunityController::class, 'destroy'])->middleware(['auth', 'verified'])->name('community.destroy');
Route::get('/community/{id}', [CommunityController::class, 'see'])->name('community.see');
Route::post('/community/{id}/comment', [CommunityController::class, 'comment'])->name('community.comment');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

route::get("admin/dashboard",[HomeController::class, 'admin_dashboard'])->name('admin.dashboard');

route::get("admin/user",[HomeController::class, 'user_index'])->name('admin.user');
route::get('admin/user/{user}/edit', [HomeController::class, 'user_edit'])->name('admin.useredit');
route::put('admin/users/{user}', [HomeController::class, 'user_update'])->name('admin.userupdate');
route::delete('admin/users/{user}', [HomeController::class, 'user_destroy'])->name('admin.userdestroy');

route::get("admin/motor",[HomeController::class, 'motor_index'])->name('admin.motor');
route::get('admin/motor/{user}/edit', [HomeController::class, 'motor_edit'])->name('admin.motoredit');
route::put('admin/motor/{user}', [HomeController::class, 'motor_update'])->name('admin.motorupdate');
route::delete('admin/motors/{user}', [HomeController::class, 'motor_destroy'])->name('admin.motordestroy');


route::get("admin/community",[HomeController::class, 'community_index'])->name('admin.community');
route::get('admin/community/{user}/edit', [HomeController::class, 'community_edit'])->name('admin.communityedit');
route::put('admin/community/{user}', [HomeController::class, 'community_update'])->name('admin.communityupdate');
route::delete('admin/communities/{user}', [HomeController::class, 'community_destroy'])->name('admin.communitydestroy');
