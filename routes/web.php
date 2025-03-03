<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/beranda', function () {
    return view('beranda');
})->name('beranda');

Route::get('/menu', function () {
    return view('menu');
})->name('menu');

Route::get('/pesanan', function () {
    return view('pesanan');
})->name('pesanan');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/manajemen-produk', function () {
    return view('manajemen-produk');
})->middleware(['auth', 'verified'])->name('manajemen-produk');

Route::get('/manajemen-pesanan', function () {
    return view('manajemen-pesanan');
})->middleware(['auth', 'verified'])->name('manajemen-pesanan');

Route::get('/laporan-keuangan', function () {
    return view('laporan-keuangan');
})->middleware(['auth', 'verified'])->name('laporan-keuangan');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
