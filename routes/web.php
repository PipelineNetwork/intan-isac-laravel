<?php
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PenyelarasController;
use App\Http\Controllers\PengawasController;
use App\Http\Controllers\TambahAduanController;
use App\Http\Controllers\TambahRayuanController;
use App\Http\Controllers\BalasAduanController;
use App\Http\Controllers\BalasRayuanController;

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/base', function () {
    return view('base');
});

Route::get('/profil', [ProfilController::class, 'kemaskini']);

Route::get('/dashboard2', function () {
    return view('dashboard2');
});

Route::get('/profil/edit', [ProfilController::class, 'kemaskiniform']);

Route::post('/profil/edit', [ProfilController::class, 'kemaskiniprofil']);

Route::resource('/pengurusanpengguna',PenggunaController::class);

Route::resource('/penyelaraspengguna',PenyelarasController::class);

Route::resource('/pengawaspengguna',PengawasController::class);

Route::resource('/tambahaduans',TambahAduanController::class);

Route::resource('/tambahrayuans',TambahRayuanController::class);

Route::resource('/balasaduans',BalasAduanController::class);

Route::resource('/balasrayuans',BalasRayuanController::class);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
