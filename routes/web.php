<?php
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PenggunaController;
// use App\Http\Controllers\PenyelarasController;
// use App\Http\Controllers\PengawasController;
use App\Http\Controllers\TambahAduanController;
use App\Http\Controllers\TambahRayuanController;
use App\Http\Controllers\BalasAduanController;
use App\Http\Controllers\BalasRayuanController;
use App\Http\Controllers\PermohananController;
use App\Http\Controllers\JadualController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\MohonPenilaianController;
use App\Http\Controllers\BanksoalanpengetahuanController;
use App\Http\Controllers\BanksoalankemahiranController;
use App\Http\Controllers\BankjawapanpengetahuanController;
use App\Http\Controllers\BankjawapankemahiranController;
use App\Http\Controllers\BankjawapancalonController;
use App\Http\Controllers\SoalankemahiraninternetController;
use App\Http\Controllers\SoalankemahiranemailController;

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
Route::get('/proftem', function () {
    return view('proftem');
});

Route::get('/profil', [ProfilController::class, 'kemaskini']);

Route::get('/dashboard2', function () {
    return view('dashboard2');
});

Route::get('/kemasukan-id', function () {
    return view('kemasukan_id.index');
});

Route::get('/profil/{id}', [ProfilController::class, 'kemaskiniform']);

Route::post('/profil/{id}/edit', [ProfilController::class, 'kemaskiniprofil']);

Route::resource('/pengurusanpengguna',PenggunaController::class);

// Route::resource('/penyelaraspengguna',PenyelarasController::class);

// Route::resource('/pengawaspengguna',PengawasController::class);

Route::resource('/tambahaduans',TambahAduanController::class);

Route::resource('/tambahrayuans',TambahRayuanController::class);

Route::resource('/balasaduans',TambahAduanController::class);

Route::resource('/balasrayuans',TambahRayuanController::class);

Route::resource('/permohanans',PermohananController::class);

Route::resource('/jaduals',JadualController::class);

Route::resource('/mohonpenilaian',MohonPenilaianController::class);

Route::resource('/bank-soalan-pengetahuan', BanksoalanpengetahuanController::class);

Route::post('/bank-soalan-pengetahuan/fill-in-the-blank', [BanksoalanpengetahuanController::class, 'fillblank']);

Route::post('/bank-soalan-pengetahuan/multiple-choice', [BanksoalanpengetahuanController::class, 'multiplechoice']);

Route::post('/bank-soalan-pengetahuan/ranking', [BanksoalanpengetahuanController::class, 'ranking']);

Route::post('/bank-soalan-pengetahuan/single-choice', [BanksoalanpengetahuanController::class, 'singlechoice']);

Route::post('/bank-soalan-pengetahuan/true-false', [BanksoalanpengetahuanController::class, 'truefalse']);

Route::post('/bank-soalan-pengetahuan/subjective', [BanksoalanpengetahuanController::class, 'subjective']);

// Route::post('/bank-soalan-pengetahuan/{id}/delete', [BanksoalanpengetahuanController::class, 'destroy']);

Route::resource('/bank-soalan-kemahiran', BanksoalankemahiranController::class);

// Route::get('//soalan-kemahiran-internet', function () {
//     return view('proses_penilaian.soalan_kemahiran.internet');
// });

Route::resource('/soalan-kemahiran-internet', SoalankemahiraninternetController::class);

Route::post('/soalan-kemahiran-internet/{id}/page1', [SoalankemahiraninternetController::class, 'edit1']);

Route::post('/soalan-kemahiran-internet/{id}/page2', [SoalankemahiraninternetController::class, 'edit2']);

Route::post('/soalan-kemahiran-internet/{id}/page3', [SoalankemahiraninternetController::class, 'edit3']);

// Route::get('/soalan-kemahiran-email', function () {
//     return view('proses_penilaian.soalan_kemahiran.email');
// });

// Route::resource('/soalan-kemahiran-email', SoalankemahiranemailController::class);

// Route::get('change-password', 'ChangePasswordController@index');

// Route::post('change-password', 'ChangePasswordController@store')->name('change.password');

Route::resource('/change-password',ChangePasswordController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
require __DIR__.'/auth.php';

// custom action najhan
Route::post('/jadual/kemaskini_status/{id}', [JadualController::class, 'kemaskini_status']);
// Route::resource('/dashboard',DashboardController::class);
Route::post('/mohonpenilaian/penyelaras/pilih_jadual', [MohonPenilaianController::class, 'pilih_jadual']);
Route::post('/mohonpenilaian/penyelaras/pilih_calon', [MohonPenilaianController::class, 'pilih_calon']);
Route::post('/mohonpenilaian/calon/kemaskini_maklumat_calon', [MohonPenilaianController::class, 'kemaskini_maklumat_calon']);
Route::post('/mohonpenilaian/calon/pilih_jadual', [MohonPenilaianController::class, 'pilih_jadual_calon']);