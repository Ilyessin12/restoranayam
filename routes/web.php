<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ReportExportController;
use App\Http\Controllers\FinancialReportExportController;
use Illuminate\Support\Facades\Route;

// Halaman-halaman user
Route::get('/', function () {
    return view('beranda');
})->name('beranda');

Route::get('/menu', function () {
    return view('menu.index');
})->name('menu');

Route::get('/cart', function () {
    return view('cart.index');
})->name('cart');

Route::get('/orders', function () {
    return view('orders.index');
})->name('orders');

Route::get('/checkout', function () {
    return view('checkout.index');
})->name('checkout');

Route::get('/checkout/success', function () {
    return view('checkout.success');
})->name('success');

// Produk routes
Route::get('/', [MenuController::class, 'beranda'])->name('beranda');
Route::get('/menu', [MenuController::class, 'menu'])->name('menu');

// Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

// Checkout Routes
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/checkout/success/{id}', [CheckoutController::class, 'show'])->name('checkout.success');

// Orders routes
Route::get('/orders', [CheckoutController::class, 'orders'])->name('orders');
Route::get('/orders/{order}', [CheckoutController::class, 'show'])->name('orders.show');

// Export Routes
Route::get('/export-excel', [ReportExportController::class, 'exportExcel'])->name('export.excel');
Route::get('/export-csv', [ReportExportController::class, 'exportCSV'])->name('export.csv');
Route::get('/export-pdf', [ReportExportController::class, 'exportPDF'])->name('export.pdf');

Route::get('/laporan-keuangan/export/excel', [FinancialReportExportController::class, 'exportExcel'])->name('laporan-keuangan.export.excel');
Route::get('/laporan-keuangan/export/csv', [FinancialReportExportController::class, 'exportCSV'])->name('laporan-keuangan.export.csv');
Route::get('/laporan-keuangan/export/pdf', [FinancialReportExportController::class, 'exportPDF'])->name('laporan-keuangan.export.pdf');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
