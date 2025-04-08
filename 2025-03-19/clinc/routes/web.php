<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MajorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/majors', [MajorController::class, 'index'])->name('majors.index');
Route::get('/majors/create', [MajorController::class, 'create'])->name('majors.create');
Route::post('majors/store', [MajorController::class, 'store'])->name('majors.store');
Route::get('/majors/{id}', [MajorController::class, 'doctors'])->name('majors.doctors');
Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors');
Route::get('doctors/create', [DoctorController::class, 'create'])->name('doctors.create');
Route::post('doctors/store', [DoctorController::class, 'store'])->name('doctors.store');
Route::get('/doctor/{id}', [DoctorController::class, 'show'])->name('doctor');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
