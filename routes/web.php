<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/AboutUs', [FrontController::class, 'AboutUs'])->name('front.AboutUs');
Route::get('/menu', [FrontController::class, 'menu'])->name('front.menu');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('role:admin,super_admin');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('role:admin,super_admin');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy')->middleware('role:admin,super_admin');


    Route::resource('about', AboutController::class)
    ->only(['index', 'create', 'store', 'edit', 'update']) // Membatasi hanya pada metode tertentu
    ->parameters(['about' => 'about']) // Mengatur parameter route untuk resource controller
    ->middleware(['auth', 'role:admin,super_admin']); // Menambahkan middleware untuk otentikasi dan peran


    Route::resource('product', ProductController::class)->middleware('role:admin,super_admin');

    Route::resource('ulasan', UlasanController::class)->middleware('role:admin,super_admin');

    Route::get('/signin', [AuthController::class, 'showSignIn'])->name('signin');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::get('/signup', [AuthController::class, 'showSignUp'])->name('signup');
    Route::post('/register', [AuthController::class, 'register'])->name('register');


});

require __DIR__.'/auth.php';
