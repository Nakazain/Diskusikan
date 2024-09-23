<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DiskusiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;


Route::get('/',[DiskusiController::class,'welcome'])->name('welcome');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/diskusi',[DiskusiController::class,'index'])->name('diskusi');
Route::get('/postingan/{id}',[DiskusiController::class,'masuk'])->name('postingan');


// Route Buat Pengguna
Route::middleware(['auth', 'userMiddleware'])->group(function () {
    
    Route::get('/dashboard',[UserController::class,'index'])->name('dashboard');
    Route::get('/add',[DiskusiController::class,'add'])->name('add');
    Route::get('/masalah',[DiskusiController::class,'masalah'])->name('masalah');
    Route::post('/laporkan',[DiskusiController::class,'laporkan'])->name('laporkan');
    Route::delete('/postingan/{id}', [DiskusiController::class, 'destroy'])->name('postingan.destroy');
    
    
});



// Route Buat Atmin
Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    
    Route::get('/admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('/admin/diskusi',[AdminController::class,'diskusi'])->name('admin.diskusi');
    Route::get('/admin/add',[AdminController::class,'add'])->name('add');
    Route::get('/admin/pengguna',[AdminController::class,'pengguna'])->name('admin.pengguna');
    Route::get('/admin/masalah',[AdminController::class,'masalah'])->name('admin.masalah');
    Route::delete('/admin/postingan/{id}', [AdminController::class, 'destroy'])->name('admin.postingan.destroy');
    Route::get('/hapususer/{id}',[AdminController::class,"hapususer"])->name("hapususer");
    Route::get('/hapusmasalah/{id}',[AdminController::class,"hapusmasalah"])->name("hapususer");
});

Route::middleware(['auth'])->group(function(){
    Route::post('/tambah',[DiskusiController::class,'tambah'])->name('tambah');
    Route::post('/postingan/{id}/comment', [DiskusiController::class, 'storeComment'])->name('postingan.comment');
    Route::delete('/comments/{id}', [DiskusiController::class, 'comdestroy'])->name('comments.destroy');

});