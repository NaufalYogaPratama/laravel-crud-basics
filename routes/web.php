<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('add', [AdminController::class, 'create'])->name('admin.create');
Route::post('store', [AdminController::class, 'store'])->name('admin.store');
Route::get('/', [AdminController::class, 'index'])->name('admin.index');
Route::get('edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
Route::post('update/{id}', [AdminController::class, 'update'])->name('admin.update');
Route::post('delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
