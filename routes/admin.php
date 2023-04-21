<?php


use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', fn() => view('admin.layouts.index'));


Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('users')->name('users.')->group(function (){
        Route::get('/',[UserController::class,'index'])->name('index');
        Route::get('/{user}',[UserController::class,'show'])->name('show');
    });
});