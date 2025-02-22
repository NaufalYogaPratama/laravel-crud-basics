<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('add', [AdminController::class, 'create'])->name('admin.create');
Route::post('store', [AdminController::class, 'store'])->name('admin.store');
Route::get('/', [AdminController::class, 'index'])->name('admin.index');
