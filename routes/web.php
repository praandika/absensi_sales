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
Route::get('/absen', [App\Http\Controllers\AbsenController::class, 'index'])->name('absen');
Route::post('absen/store',[App\Http\Controllers\AbsenController::class, 'store'])->name('absen.store');
Route::post('absen/show',[App\Http\Controllers\AbsenController::class, 'show'])->name('absen.show');
Route::post('absen/off',[App\Http\Controllers\AbsenController::class, 'off'])->name('absen.off');
Route::post('absen/export_excel', [App\Http\Controllers\AbsenController::class, 'export_excel'])->name('absen.export_excel');
