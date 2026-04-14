<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\Admin\{
    DashboardController,
    GedungController,
    VerifikasiController,
    TagihanController
};

use App\Http\Controllers\Penghuni\{
    PenghuniDashboardController,
    PengaduanController,
    PembayaranController
};

use App\Http\Controllers\Calon\{
    CalonDashboardController,
    PengajuanController,
    StatusUnitController
};

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', fn () => redirect()->route('login'));

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| PROFILE ROUTE (GLOBAL - SEMUA ROLE)
|--------------------------------------------------------------------------
*/
use Illuminate\Support\Facades\Auth;

Route::middleware('auth')->group(function () {
    Route::get('/profile', function () {
        return view('profile.show', [
            'user' => Auth::user()
        ]);
    })->name('profile');
});


// UPDATE PHOTO PROFILE

Route::post('/profile', function () {
    // sementara dulu
    return back()->with('success', 'Profil berhasil diupdate');
})->middleware('auth');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES (PBI-04, 10, 11, 13, 19)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        // PBI-04
        Route::resource('gedung', GedungController::class);

        // PBI-10
        Route::get('/verifikasi', [VerifikasiController::class, 'index'])
            ->name('verifikasi.index');

        Route::post('/verifikasi/{pengajuan}/setujui', [VerifikasiController::class, 'setujui'])
            ->name('verifikasi.setujui');

        Route::post('/verifikasi/{pengajuan}/tolak', [VerifikasiController::class, 'tolak'])
            ->name('verifikasi.tolak');

        // PBI-13
        Route::get('/tagihan/generate', [TagihanController::class, 'generate'])
            ->name('tagihan.generate');
    });


/*
|--------------------------------------------------------------------------
| CALON PENGHUNI ROUTES (PBI-02, 05, 08, 09)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:calon_penghuni'])
    ->prefix('calon')
    ->name('calon.')
    ->group(function () {

        Route::get('/dashboard', [CalonDashboardController::class, 'index'])
            ->name('dashboard');

        // PBI-05
        Route::get('/unit', [StatusUnitController::class, 'index'])
            ->name('unit.index');

        // PBI-08
        Route::get('/pengajuan/create', [PengajuanController::class, 'create'])
            ->name('pengajuan.create');

        Route::post('/pengajuan', [PengajuanController::class, 'store'])
            ->name('pengajuan.store');

        // PBI-09
        Route::get('/pengajuan/tracking', [PengajuanController::class, 'tracking'])
            ->name('pengajuan.tracking');
    });


/*
|--------------------------------------------------------------------------
| PENGHUNI ROUTES (PBI-14, 16, 17)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:penghuni'])
    ->prefix('penghuni')
    ->name('penghuni.')
    ->group(function () {

        Route::get('/dashboard', [PenghuniDashboardController::class, 'index'])
            ->name('dashboard');

        // PBI-14
        Route::post('/pembayaran/{tagihan}/upload', [PembayaranController::class, 'upload'])
            ->name('pembayaran.upload');

        // PBI-16
        Route::resource('pengaduan', PengaduanController::class)
            ->only(['index', 'create', 'store']);
    });
