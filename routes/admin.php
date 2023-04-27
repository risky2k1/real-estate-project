<?php


use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', fn() => view('admin.layouts.index'));


Route::middleware(['auth','admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/{user}', [UserController::class, 'show'])->name('show');
        Route::patch('/{user}', [UserController::class, 'update'])->name('update');
    });
    Route::prefix('roles')->name('roles.')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('index');
        Route::get('/create', [RoleController::class, 'create'])->name('create');
        Route::post('/', [RoleController::class, 'store'])->name('store');
        Route::get('/create-permissions', [RoleController::class, 'createPermissions'])->name('create.permissions');
        Route::post('/permission', [RoleController::class, 'storePermissions'])->name('store.permissions');
        Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('edit');
    });
    Route::prefix('properties')->name('properties.')->group(function (){
       Route::get('/',[PropertyController::class,'index'])->name('index');
        Route::get('/create', [PropertyController::class, 'create'])->name('create');

    });
});