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
Route::put('update/{id}', [AdminController::class, 'update'])->name('admin.update');
Route::delete('delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
Route::get('admin/trash', [AdminController::class, 'trash'])->name('admin.trash');
// Restore data yang di-soft delete
Route::post('admin/restore/{id}', [AdminController::class, 'restore'])->name('admin.restore');

// Hapus permanen data
Route::delete('admin/force-delete/{id}', [AdminController::class, 'forceDelete'])->name('admin.forceDelete');
