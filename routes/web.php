<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::middleware("auth")->group(function (){
   Route::view("/","home")->name("home");
});

//Route::match(['GET','POST'],'/', [IndexController::class, 'indexAction'])->name('index');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');

Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
Route::post('/admin', [AdminController::class, 'adminPost'])->name('admin.post');

Route::get('/files', [\App\Http\Controllers\FilesController::class, 'files'])->name("files");
Route::post('/files', [\App\Http\Controllers\FilesController::class, 'filesPost'])->name("files.post");
