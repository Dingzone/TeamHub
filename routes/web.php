<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\DashboardDosenController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProyekController;

// Halaman login
Route::get('/', function () {
    return view('login');
})->name('login');

// Proses login
Route::post('/login', function (Request $request) {
    $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        if ($user->role === 'dosen') {
            return redirect()->route('dashboard.dosen');
        } else {
            return redirect()->route('dashboard');
        }
    }

    return redirect()->route('login')->withErrors([
        'username' => 'Username atau password salah.',
    ]);
})->name('login.submit');

// Logout
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

// Semua route dilindungi oleh middleware auth
Route::middleware(['auth'])->group(function () {
    // Dashboard Mahasiswa
    Route::get('/dashboard', [MahasiswaController::class, 'dashboard'])->name('dashboard');

    // Dashboard Dosen
    Route::get('/dashboard-dosen', [DashboardDosenController::class, 'index'])->name('dashboard.dosen');
    Route::get('/dashboard-dosen/create', [DashboardDosenController::class, 'create'])->name('dashboard.dosen.create');
    Route::post('/dashboard-dosen/store', [DashboardDosenController::class, 'store'])->name('kelas.store');

    // Kelas
    Route::get('/kelas/{id}', [KelasController::class, 'show'])->name('kelas.show');

    // Proyek
    Route::get('/proyek', [ProyekController::class, 'index'])->name('proyek');
    Route::view('/addProyek', 'addProyek')->name('addProyek');

    // Detail Proyek dengan parameter kategori
    Route::get('/proyekDetail/{kategori}', function ($kategori) {
        return view('proyekDetail', ['kategori' => urldecode($kategori)]);
    })->name('proyekDetail');

    // Forum
    Route::view('/forum', 'forum')->name('forum');

    // Daftar Tugas
    Route::view('/datugas', 'datugas')->name('datugas');
    Route::view('/datugas2', 'datugas2')->name('datugas2');

    // Task phases
    Route::get('/task-planning/{taskName}', function ($taskName) {
        return view('taskPlanning', ['taskName' => $taskName]);
    })->name('taskPlanning');
    Route::view('/taskanalysis', 'taskanalysis')->name('taskanalysis');
    Route::view('/taskdesign', 'taskdesign')->name('taskdesign');
    Route::view('/taskimplementation', 'taskimplementation')->name('taskimplementation');
    Route::view('/tasktesting', 'tasktesting')->name('tasktesting');
    Route::view('/taskmaintenance', 'taskmaintenance')->name('taskmaintenance');

    // Penilaian dan Rekap
    Route::view('/rekap', 'rekap')->name('rekap');
    Route::view('/penilaian', 'penilaian')->name('penilaian');
    Route::view('/penilaian2', 'penilaian2')->name('penilaian2');
    Route::view('/penilaian/mahasiswa', 'penilaianMahasiswa')->name('penilaian.mahasiswa');

    // Masuk PBL
    Route::view('/masukpbl', 'masukpbl')->name('masukpbl');
    Route::get('/masuk2pbl/{kategori}', function ($kategori) {
        return view('masuk2pbl', ['kategori' => urldecode($kategori)]);
    })->name('masuk2pbl');

    // Laporan dan Profil
    Route::view('/laporan', 'laporan')->name('laporan');
    Route::view('/profil', 'profil')->name('profil');

    // Kunci Kelas
    Route::get('/kuncikelas', function (Request $request) {
        $kelas = $request->query('kelas');
        return view('kuncikelas', compact('kelas'));
    })->name('kuncikelas');

Route::get('/halamandetailproyek/{kategori}', function ($kategori) {
    return view('halamandetailproyek', [
        'kategori' => urldecode($kategori),
        'title' => 'PBL - ' . urldecode($kategori)
    ]);
})->name('halamandetailproyek');


    // Add Task (opsional parameter)
    Route::get('/addTask/{projectName?}', function ($projectName = null) {
        return view('addTask', [
            'projectName' => $projectName ? urldecode($projectName) : null
        ]);
    })->name('addTask');

    // Pengumuman
    Route::view('/pengumuman', 'pengumuman')->name('pengumuman');
});

Route::get('/rekap/nilai/{proyek}', function ($proyek) {
    return view('rekap2', ['proyek' => $proyek]);
})->name('rekap.nilai');