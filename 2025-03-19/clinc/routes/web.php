<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MajorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/majors', [MajorController::class, 'index'])->name('majors.index');
Route::get('/majors/{id}', [MajorController::class, 'doctors'])->name('majors.doctors');
Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors');
Route::get('/doctor', [DoctorController::class, 'show'])->name('doctor');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
