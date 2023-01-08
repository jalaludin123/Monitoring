<?php

use App\Http\Controllers\HalamanController;
use App\Http\Controllers\User\Admin\InformasiController;
use App\Http\Controllers\User\Admin\KategoriInfirmasiController;
use App\Http\Controllers\User\Admin\PerizinanController;
use App\Http\Controllers\User\Admin\ReportController;
use App\Http\Controllers\User\Admin\SettingController;
use App\Http\Controllers\User\Admin\StafController;
use App\Http\Controllers\User\Kabid\ReportKabidController;
use App\Http\Controllers\User\Kabid\UserController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\Staf\PengawasController;
use App\Http\Controllers\WilayahController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/dashboard', function () {
//     return view('/user/home');
// });
Auth::routes();

Route::controller(HalamanController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('informasi', 'informasi');
});

Route::controller(WilayahController::class)->group(function () {
    Route::get('kecamatan/{kota}', 'getKecamatan');
    Route::get('kelurahan/{kecamatan}', 'getKelurahan');
});

Route::prefix('perindag')->middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('profile', ProfileController::class);
    // Route Kabid
    Route::middleware(['role:0'])->group(function () {
        Route::resource('user', UserController::class);
        Route::resource('reports', ReportKabidController::class);
        Route::get('print', [ReportKabidController::class, 'printAll']);
        Route::get('printPdf/{id}', [ReportKabidController::class, 'printPdf']);
    });
    // End Route Kabid

    // Route Admin
    Route::middleware(['role:1'])->group(function () {
        Route::resource('staf', StafController::class);
        Route::controller(KategoriInfirmasiController::class)->group(function () {
            Route::get('kategori-informasi', 'index');
            Route::get('kategori-informasi/create', 'create');
            Route::post('kategori-informasi/store', 'store');
            Route::get('kategori-informasi/hapus/{id}', 'hapus');
            Route::get('kategori-informasi/read', 'read');
            Route::get('kategori-informasi/edit/{id}', 'edit');
            Route::post('kategori-informasi/ubah/{id}', 'ubah');
        });
        Route::controller(InformasiController::class)->group(function () {
            Route::get('informasi', 'index');
            Route::get('informasi/read', 'read');
            Route::get('informasi/create', 'create');
            Route::post('informasi/store', 'store');
            Route::get('informasi/edit/{id}', 'edit');
            Route::post('informasi/ubah/{id}', 'ubah');
            Route::get('informasi/hapus/{id}', 'hapus');
            Route::get('informasi/viewPdf/{id}', 'viewPdf');
        });
        Route::resource('perizinan', PerizinanController::class);
        Route::get('perizinan/showPdf/{perizinan}', [PerizinanController::class, 'showPdf']);
        Route::resource('setting', SettingController::class);
        Route::controller(ReportController::class)->group(function () {
            Route::get('report', 'index');
            Route::get('printOne/{perizinan}', 'printOne');
            Route::get('printAll', 'printAll');
        });
    });
    // End Route Admin

    // Route Staf
    Route::middleware(['role:2'])->group(function () {
        Route::resource('pengawasan', PengawasController::class);
        Route::post('pengawasan/createOrUpdate/{perizinan}', [PengawasController::class, 'createOrUpdate']);
        Route::get('pengawasan-kegiatan', [PengawasController::class, 'kegiatan']);
        Route::get('pengawasan-kegiatan/ubah/{pengawasan}', [PengawasController::class, 'ubah']);
        Route::put('pengawasan-kegiatan/updateData/{pengawasan}', [PengawasController::class, 'updateData']);
        Route::get('pengawasan-kegiatan/detail/{pengawasan}', [PengawasController::class, 'detail']);
        Route::get('pengawasan-kegiatan/deleteData/{pengawasan}', [PengawasController::class, 'deleteData']);
    });
    // End Route Staf
});