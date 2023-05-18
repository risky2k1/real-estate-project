<?php

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PlanController;
use App\Http\Controllers\Front\ProfileController as FrontProfileController;
use App\Http\Controllers\Front\PropertyController as FrontPropertyController;
use App\Http\Controllers\ProfileController;
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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('agents')->group(function (){
        Route::get('profile', [FrontProfileController::class,'index'])->name('agents.index');
    });
    Route::prefix('plans')->group(function (){
        Route::get('/',[PlanController::class,'index'])->name('plans.index');
    });
    Route::prefix('properties')->group(function (){
        Route::get('create',[FrontPropertyController::class,'create'])->name('properties.create');
        Route::post('',[FrontPropertyController::class,'store'])->name('properties.store');
    });
});

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('detail/{property}',[HomeController::class,'show'])->name('properties.show');

require __DIR__.'/auth.php';
