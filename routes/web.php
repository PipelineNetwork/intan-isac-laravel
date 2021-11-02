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
use App\Http\Controllers\SoalankemahiranwordController;
use App\Http\Controllers\KemasukanPenilaianController;
use App\Http\Controllers\KeputusanPenilaianController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VideoDanNotaController;
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

Route::resource('/pengurusanpengguna', PenggunaController::class);

// Route::resource('/penyelaraspengguna',PenyelarasController::class);

// Route::resource('/pengawaspengguna',PengawasController::class);

Route::resource('/tambahaduans', TambahAduanController::class);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
require __DIR__ . '/auth.php';

Route::resource('/tambahrayuans', TambahRayuanController::class);

Route::resource('/balasaduans', TambahAduanController::class);

Route::resource('/balasrayuans', TambahRayuanController::class);

Route::resource('/permohanans', PermohananController::class);

Route::resource('/jaduals', JadualController::class);

Route::resource('/mohonpenilaian', MohonPenilaianController::class);

Route::resource('/bank-soalan-pengetahuan', BanksoalanpengetahuanController::class);

Route::post('/bank-soalan-pengetahuan/fill-in-the-blank', [BanksoalanpengetahuanController::class, 'fillblank']);

Route::post('/bank-soalan-pengetahuan/multiple-choice', [BanksoalanpengetahuanController::class, 'multiplechoice']);

Route::post('/bank-soalan-pengetahuan/ranking', [BanksoalanpengetahuanController::class, 'ranking']);

Route::post('/bank-soalan-pengetahuan/single-choice', [BanksoalanpengetahuanController::class, 'singlechoice']);

Route::post('/bank-soalan-pengetahuan/true-false', [BanksoalanpengetahuanController::class, 'truefalse']);

Route::post('/bank-soalan-pengetahuan/subjective', [BanksoalanpengetahuanController::class, 'subjective']);

// Route::post('/bank-soalan-pengetahuan/{id}/delete', [BanksoalanpengetahuanController::class, 'destroy']);

Route::resource('/bank-soalan-kemahiran', BanksoalankemahiranController::class);

Route::resource('/soalan-kemahiran-internet', SoalankemahiraninternetController::class);

Route::post('/soalan-kemahiran-internet/{id}/page1', [SoalankemahiraninternetController::class, 'edit1']);

Route::post('/soalan-kemahiran-internet/{id}/page2', [SoalankemahiraninternetController::class, 'edit2']);

Route::post('/soalan-kemahiran-internet/{id}/page3', [SoalankemahiraninternetController::class, 'edit3']);

Route::resource('/soalan-kemahiran-email', SoalankemahiranemailController::class);

Route::resource('/soalan-kemahiran-word', SoalankemahiranwordController::class);

Route::resource('/keputusan_penilaian', KeputusanPenilaianController::class);

Route::resource('/videodannota', VideoDanNotaController::class);

Route::resource('/semak_jawapan', BankjawapanpengetahuanController::class);

Route::get('/tamat-penilaian', function () {
    return view('proses_penilaian.tamat_penilaian');
});

Route::get('/papar-keputusan', function () {
    return view('proses_penilaian.keputusan_penilaian');
});

// Route::get('change-password', 'ChangePasswordController@index');

// Route::post('change-password', 'ChangePasswordController@store')->name('change.password');

Route::resource('/change-password', ChangePasswordController::class);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
// require __DIR__ . '/auth.php';

// custom action najhan
Route::post('/jadual/kemaskini_status/{id}', [JadualController::class, 'kemaskini_status']);
Route::post('/mohonpenilaian/penyelaras/pilih_jadual', [MohonPenilaianController::class, 'pilih_jadual']);
Route::post('/mohonpenilaian/penyelaras/pilih_calon', [MohonPenilaianController::class, 'pilih_calon']);
Route::post('/mohonpenilaian/calon/kemaskini_maklumat_calon', [MohonPenilaianController::class, 'kemaskini_maklumat_calon']);
Route::post('/mohonpenilaian/calon/pilih_jadual', [MohonPenilaianController::class, 'pilih_jadual_calon']);
Route::post('/kemasukan_id/check_id', [KemasukanPenilaianController::class, 'kemasukan_id']);
Route::get('/kemasukan_penilaian/{id_penilaian}/{soalan}', [KemasukanPenilaianController::class, 'kemasukan_penilaian']);
Route::post('/kemasukan_penilaian/{id_penilaian}/jawapan_calon', [BankjawapanpengetahuanController::class, 'jawapan_calon']);

Route::get('/cetak_surat/{id}', [MohonPenilaianController::class, 'cetak_surat']);
Route::get('/slip_keputusan/{id}', [KeputusanPenilaianController::class, 'slip_keputusan']);
Route::get('/sijil_penilaian/{id}', [KeputusanPenilaianController::class, 'sijil_isac']);
Route::post('/semak_keputusan', [KeputusanPenilaianController::class, 'semak_keputusan']);

Route::get('/senarai_sijil', [KeputusanPenilaianController::class, 'senarai_sijil']);

Route::get('/semakan_keputusan_calon', function () {
    return view('proses_penilaian.keputusan_penilaian.semak_keputusan_calon');
});

Route::get('/laporan/penilaian-isac-mengikut-kementerian', [LaporanController::class, 'laporan_penilaian_isac_mengikut_kementerian']);
Route::get('/laporan/senarai-keputusan-penilaian', [LaporanController::class, 'senarai_keputusan_penilaian']);
Route::get('/laporan/statistik-penilaian-mengikut-klasifikasi-gred-jawatan', [LaporanController::class, 'statistik_penilaian_gred_jawatan']);
Route::get('/laporan/statistik-keseluruhan', [LaporanController::class, 'statistik_keseluruhan']);
Route::get('/laporan/statistik-keseluruhan-pencapaian-penilaian-isac-mengikut-bulan', [LaporanController::class, 'statistik_keseluruhan_pencapaian_penilaian_isac_ikut_bulan']);
Route::get('/laporan/statistik-isac-mengikut-kategori-calon', [LaporanController::class, 'statistik_isac_kategori_calon']);
Route::get('/laporan/keseluruhan-penilaian-isac-mengikut-iac', [LaporanController::class, 'keseluruhan_penilaian_isac_iac']);
Route::get('/laporan/aduan', [LaporanController::class, 'laporan_aduan']);
Route::get('/laporan/rayuan', [LaporanController::class, 'laporan_rayuan']);
