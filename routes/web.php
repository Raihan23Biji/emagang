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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('login');

Route::get('/login', [App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::post('action-login', [App\Http\Controllers\LoginController::class, 'action_login']);
Route::get('registrasi', [App\Http\Controllers\LoginController::class, 'register'])->name('register');
Route::get('lengkapi-profile', [App\Http\Controllers\LoginController::class, 'lengkapi_profile'])->name('register');
Route::get('profile', [App\Http\Controllers\LoginController::class, 'profile']);
Route::post('/insert-register', [App\Http\Controllers\LoginController::class, 'insert_register']);


Route::get('login', [App\Http\Controllers\LoginController::class, 'index']);
Route::get('verifikasi/{id}', [App\Http\Controllers\LoginController::class, 'verifikasi']);
Route::get('logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

Auth::routes();



Route::middleware('auth')->group(function () {
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index']);
    // Route::get('actionlogout', [App\Http\Controllers\LoginController::class, 'actionlogout']);

    Route::post('update-profile-users', [App\Http\Controllers\LoginController::class, 'update_profile']);
   
    Route::post('insert-lengkapi-profile', [App\Http\Controllers\LoginController::class, 'insert_lengkapi_profile']);

    // pelamar
    Route::get('pendaftaran', [App\Http\Controllers\Pelamar\PendaftaranController::class, 'index']);
    Route::post('insert-pendaftaran', [App\Http\Controllers\Pelamar\PendaftaranController::class, 'insert']);
    Route::get('data-lamaran', [App\Http\Controllers\Pelamar\DataLamaranController::class, 'index']);
    Route::get('detail-lamaran/{id}', [App\Http\Controllers\Pelamar\DataLamaranController::class, 'detail']);
    Route::get('cetak-lamaran/{id}', [App\Http\Controllers\Pelamar\DataLamaranController::class, 'cetak']);
    
    Route::get('detail-informasi/{id}', [App\Http\Controllers\Pelamar\DataLamaranController::class, 'detail_informasi']);


    
    
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);


    Route::get('data-admin', [App\Http\Controllers\Admin\DataAdminController::class, 'index']);
    Route::post('insert-admin', [App\Http\Controllers\Admin\DataAdminController::class, 'insert']);
    Route::post('update-admin', [App\Http\Controllers\Admin\DataAdminController::class, 'update']);
    Route::get('delete-admin/{id}', [App\Http\Controllers\Admin\DataAdminController::class, 'delete']);

    Route::get('data-profile', [App\Http\Controllers\Admin\DataProfileController::class, 'index']);
    Route::post('update-profile', [App\Http\Controllers\Admin\DataProfileController::class, 'update']);


    Route::get('data-galeri', [App\Http\Controllers\Admin\DataGaleriController::class, 'index']);
    Route::post('insert-galeri', [App\Http\Controllers\Admin\DataGaleriController::class, 'insert']);
    Route::post('update-galeri', [App\Http\Controllers\Admin\DataGaleriController::class, 'update']);
    Route::get('delete-galeri/{id}', [App\Http\Controllers\Admin\DataGaleriController::class, 'delete']);

    Route::get('data-informasi', [App\Http\Controllers\Admin\DataInformasiController::class, 'index']);
    Route::post('insert-informasi', [App\Http\Controllers\Admin\DataInformasiController::class, 'insert']);
    Route::post('update-informasi', [App\Http\Controllers\Admin\DataInformasiController::class, 'update']);
    Route::get('delete-informasi/{id}', [App\Http\Controllers\Admin\DataInformasiController::class, 'delete']);

    Route::get('data-sertifikat', [App\Http\Controllers\Admin\DataSertifikatController::class, 'index']);
    Route::post('approve-sertifikat', [App\Http\Controllers\Admin\DataSertifikatController::class, 'approve']);


    Route::post('insert-sertifikat', [App\Http\Controllers\Pelamar\SertifikatController::class, 'insert']);
    Route::post('update-sertifikat', [App\Http\Controllers\Pelamar\SertifikatController::class, 'update']);
    Route::get('delete-sertifikat/{id}', [App\Http\Controllers\Pelamar\SertifikatController::class, 'delete']);
    Route::get('cetak-sertifikat/{id}', [App\Http\Controllers\Pelamar\SertifikatController::class, 'cetak']);

    Route::get('data-alur', [App\Http\Controllers\Admin\DataAlurController::class, 'index']);
    Route::post('insert-alur', [App\Http\Controllers\Admin\DataAlurController::class, 'insert']);
    Route::post('update-alur', [App\Http\Controllers\Admin\DataAlurController::class, 'update']);
    Route::get('delete-alur/{id}', [App\Http\Controllers\Admin\DataAlurController::class, 'delete']);

    Route::get('data-pelamar', [App\Http\Controllers\Admin\DataPelamarController::class, 'index']);

    Route::get('data-pendaftaran', [App\Http\Controllers\Admin\DataPendaftaranController::class, 'index']);
    Route::get('detail-pendaftaran/{id}', [App\Http\Controllers\Admin\DataPendaftaranController::class, 'detail']);
    Route::post('update-diterima', [App\Http\Controllers\Admin\DataPendaftaranController::class, 'diterima']);
    Route::post('update-tidak-diterima', [App\Http\Controllers\Admin\DataPendaftaranController::class, 'tidak_diterima']);

    Route::get('data-diterima', [App\Http\Controllers\Admin\DataDiterimaController::class, 'index']);
    Route::get('detail-diterima/{id}', [App\Http\Controllers\Admin\DataDiterimaController::class, 'detail']);

    Route::get('data-tidak-diterima', [App\Http\Controllers\Admin\DataTidakDiterimaController::class, 'index']);

    Route::get('/absen', [App\Http\Controllers\AbsensiController::class, 'camera'])->name('absensi.camera');
    Route::post('/absensi/upload', [App\Http\Controllers\AbsensiController::class, 'uploadPhoto'])->name('absensi.uploadPhoto');

    Route::get('/data-absen', [App\Http\Controllers\AbsensiController::class, 'index'])->name('absensi.index');
    Route::get('/absensi/user/{id}', [App\Http\Controllers\AbsensiController::class, 'getByUserId']);

    Route::get('/absensi/user', function(Request $request) {
        $userId = $request->query('user_id');
        return redirect('/absensi/user/' . $userId);
    });
    Route::get('/absensi/user', function(Request $request) {
        $userId = $request->query('user_id');
        return redirect('/absensi/user/' . $userId);
    });
    Route::get('/nilai', [App\Http\Controllers\NilaiController::class, 'index']);
    Route::get('/nilai-upload', [App\Http\Controllers\NilaiController::class, 'upload']);
    Route::get('/magang/nilai/{id}', [App\Http\Controllers\NilaiController::class, 'upload'])->name('magang.nilai.form');
    // Route::post('/magang/nilai/{id}', [App\Http\Controllers\NilaiController::class, 'simpanNilai'])->name('magang.nilai.simpan');

    Route::post('/magang/nilai/{id}', [App\Http\Controllers\NilaiController::class, 'store'])->name('magang.nilai.simpan');
    Route::get('/nilai/download', [App\Http\Controllers\NilaiController::class, 'download'])->name('nilai.download');



});

