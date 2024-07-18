<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\PemakaianController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\InvenController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

// Rute untuk login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'loginAction'])->name('login.action');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::resource('ruang', RuangController::class);
    Route::resource('jenisBarang', JenisController::class);
    Route::resource('inventaris', InvenController::class);
    Route::get('/barang/cetak', [BarangController::class, 'cetak'])->name('barang.cetak');
    Route::get('/pemakaian/cetak', [BarangController::class, 'cetak'])->name('pemakaian.cetak');
});

Route::middleware(['auth', 'role:Admin,Operator'])->group(function () {
    Route::resource('barang', BarangController::class);
    Route::resource('pemakaian', PemakaianController::class);
});

Route::middleware(['auth', 'role:Admin,Operator,Petugas'])->group(function () {
    Route::resource('barang', BarangController::class);
});