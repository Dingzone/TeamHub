<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\DashboardDosenController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MahasiswaController;

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

<<<<<<< HEAD

// Route untuk halaman dashboard (Mahasiswa)
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route untuk halaman proyek
Route::get('/proyek', function () {
    return view('proyek');
})->name('proyek');

// Route untuk halaman tambah proyek
Route::get('/addProyek', function () {
    return view('addProyek');
})->name('addProyek');

// Route untuk halaman detail proyek dengan parameter kategori
Route::get('/proyekDetail/{kategori}', function ($kategori) {
    return view('proyekDetail', ['kategori' => urldecode($kategori)]);
})->name('proyekDetail');

// Route untuk halaman forum diskusi
Route::get('/forum', function () {
    return view('forum');
})->name('forum');

// Route untuk halaman daftar tugas (datugas)
Route::get('/datugas', function () {
    return view('datugas');
})->name('datugas');

// Route untuk halaman Gantt Chart (datugas2) dengan parameter projectId
Route::get('/datugas2', function () {
    return view('datugas2');
})->name('datugas2');

// Route untuk setiap fase
Route::get('/task-planning/{taskName}', function ($taskName) {
    return view('taskPlanning', ['taskName' => $taskName]);
})->name('taskPlanning');

Route::get('/taskanalysis', function () {
    return view('taskanalysis');
})->name('taskanalysis');

Route::get('/taskdesign', function () {
    return view('taskdesign');
})->name('taskdesign');

Route::get('/taskimplementation', function () {
    return view('taskimplementation');
})->name('taskimplementation');

Route::get('/tasktesting', function () {
    return view('tasktesting');
})->name('tasktesting');

Route::get('/taskmaintenance', function () {
    return view('taskmaintenance');
})->name('taskmaintenance');

// Route untuk halaman rekap penilaian
Route::get('/rekap', function () {
    return view('rekap');
})->name('rekap');

// Route untuk halaman penilaian dosen
Route::get('/penilaian', function () {
    return view('penilaian');
})->name('penilaian');

Route::get('/penilaian2', function () {
    return view('penilaian2');
})->name('penilaian2');

// Route untuk masuk PBL
Route::get('/masukpbl', function () {
    return view('masukpbl');
})->name('masukpbl');

// Route untuk masuk PBL dengan kategori spesifik
Route::get('/masuk2pbl/{kategori}', function ($kategori) {
    return view('masuk2pbl', ['kategori' => urldecode($kategori)]);
})->name('masuk2pbl');

// Route untuk halaman penilaian mahasiswa
Route::get('/penilaian/mahasiswa', function () {
    return view('penilaianMahasiswa');
})->name('penilaian.mahasiswa');

// Route untuk halaman laporan rekapitulasi
Route::get('/laporan', function () {
    return view('laporan');
})->name('laporan');

// Route untuk halaman profil pengguna
Route::get('/profil', function () {
    return view('profil');
})->name('profil');

Route::get('/kuncikelas', function (\Illuminate\Http\Request $request) {
    $kelas = $request->query('kelas');
    return view('kuncikelas', compact('kelas'));
})->name('kuncikelas');

// Route untuk logout
=======
// Logout
>>>>>>> d9243db9a32094849ef1e20113e1f87d871603d3
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

<<<<<<< HEAD
// Route untuk halaman detail proyek berdasarkan kategori
Route::get('/halamandetailproyek/{kategori}', function ($kategori) {
    $validCategories = ['UI/UX', 'Mobile Development', 'Front End', 'Back End'];
    
    if (!in_array(urldecode($kategori), $validCategories)) {
        abort(404);
    }
    
    return view('halamandetailproyek', [
        'kategori' => urldecode($kategori),
        'title' => 'PBL - ' . urldecode($kategori)
    ]);
})->name('halamandetailproyek');

// Route untuk halaman detail task pada proyek tertentu
// Menerima projectName sebagai parameter untuk menampilkan detail proyek yang spesifik
Route::get('/addTask/{projectName?}', function ($projectName = null) {
    return view('addTask', [
        'projectName' => $projectName ? urldecode($projectName) : null
    ]);
})->name('addTask');

Route::get('/pengumuman', function () {
    return view('pengumuman');
})->name('pengumuman');
=======
// Middleware auth
Route::middleware(['auth'])->group(function () {
    // Mahasiswa dashboard (gunakan controller)
    Route::get('/dashboard', [MahasiswaController::class, 'dashboard'])->name('dashboard');

    // Dosen dashboard
    Route::get('/dashboard-dosen', [DashboardDosenController::class, 'index'])->name('dashboard.dosen');
    Route::get('/dashboard-dosen/create', [DashboardDosenController::class, 'create'])->name('dashboard.dosen.create');
    Route::post('/dashboard-dosen/store', [DashboardDosenController::class, 'store'])->name('kelas.store');
    Route::get('/kelas/{id}', [KelasController::class, 'show'])->name('kelas.show');

    // Tambahan routes
    Route::view('/proyek', 'proyek')->name('proyek');
    Route::view('/addProyek', 'addProyek')->name('addProyek');
    Route::view('/proyekDetail', 'proyekDetail')->name('proyekDetail');
    Route::view('/forum', 'forum')->name('forum');
    Route::view('/addTask', 'addTask')->name('addTask');
    Route::view('/datugas', 'datugas')->name('datugas');
    Route::view('/datugas2', 'datugas2')->name('datugas2');
    Route::view('/taskplanning', 'taskplanning')->name('taskplanning');
    Route::view('/taskanalysis', 'taskanalysis')->name('taskanalysis');
    Route::view('/taskdesign', 'taskdesign')->name('taskdesign');
    Route::view('/taskimplementation', 'taskimplementation')->name('taskimplementation');
    Route::view('/tasktesting', 'tasktesting')->name('tasktesting');
    Route::view('/taskmaintenance', 'taskmaintenance')->name('taskmaintenance');
    Route::view('/rekap', 'rekap')->name('rekap');
    Route::view('/penilaian', 'penilaian')->name('penilaian');
    Route::view('/penilaian2', 'penilaian2')->name('penilaian2');
    Route::view('/masukpbl', 'masukpbl')->name('masukpbl');
    Route::get('/masuk2pbl/{kategori}', function ($kategori) {
        return view('masuk2pbl', ['kategori' => urldecode($kategori)]);
    })->name('masuk2pbl');
    Route::view('/penilaian/mahasiswa', 'penilaianMahasiswa')->name('penilaian.mahasiswa');
    Route::view('/laporan', 'laporan')->name('laporan');
    Route::view('/profil', 'profil')->name('profil');
    Route::get('/kuncikelas', function (Request $request) {
        $kelas = $request->query('kelas');
        return view('kuncikelas', compact('kelas'));
    })->name('kuncikelas');
});
>>>>>>> d9243db9a32094849ef1e20113e1f87d871603d3
