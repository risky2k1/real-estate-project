<?php


use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;





Route::get('/',fn()=> view('admin.layouts.index'));

Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');