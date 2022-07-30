<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dealer', [App\Http\Controllers\DealerController::class, 'index'])->name('dealer.index');
Route::post('/dealer/store', [App\Http\Controllers\DealerController::class, 'store'])->name('dealer.store');
Route::get('/dealer/{id}/edit', [App\Http\Controllers\DealerController::class, 'edit'])->name('dealer.edit');
Route::post('/dealer/update', [App\Http\Controllers\DealerController::class, 'update'])->name('dealer.update');
Route::get('/sales', [App\Http\Controllers\SaleController::class, 'index'])->name('sales.index');
Route::post('/sales/store', [App\Http\Controllers\SaleController::class, 'store'])->name('sales.store');
Route::get('/sales/{id}/edit', [App\Http\Controllers\SaleController::class, 'edit'])->name('sales.edit');
Route::post('/sales/update', [App\Http\Controllers\SaleController::class, 'update'])->name('sales.update');
Route::get('/absen', [App\Http\Controllers\AbsenController::class, 'index'])->name('absen');
Route::post('absen/store',[App\Http\Controllers\AbsenController::class, 'store'])->name('absen.store');
Route::get('absen/search',[App\Http\Controllers\AbsenController::class, 'search'])->name('absen.search');
Route::post('absen/off',[App\Http\Controllers\AbsenController::class, 'off'])->name('absen.off');
Route::get('export/{tanggal_awal}/{tanggal_akhir}/{sales}/{dealer}', [App\Http\Controllers\AbsenController::class, 'export_excel'])->name('absen.export_excel');
