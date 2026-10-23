<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;  
use App\Http\Controllers\Jurusancontroller;
use App\Http\Controllers\Jenjangcontroller;
use App\Http\Controllers\Kelascontroller;
use App\Http\Controllers\SiswaController;
Route::get('/jurusan', [Jurusancontroller::class, 'index'])->name('jurusan.index');
Route::get('/jenjang', [Jenjangcontroller::class, 'index'])->name('jenjang.index');
Route::get('/kelas', [Kelascontroller::class, 'index'])->name('kelas.index');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('jurusan', Jurusancontroller::class);
    Route::resource('jenjang', Jenjangcontroller::class);
    Route::resource('kelas', Kelascontroller::class);
    Route::resource('siswa', SiswaController::class);
    });

require __DIR__.'/auth.php';
