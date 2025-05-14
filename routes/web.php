<?php

use Illuminate\Support\Facades\Route;

// Route untuk halaman login
Route::get('/', function () {
    return view('login');
})->name('login');

// Route untuk proses login
Route::post('/login', function () {
    $role = request('role');
    if ($role === 'dosen') {
        return redirect()->route('penilaian');
    } else {
        return redirect()->route('dashboard');
    }
})->name('login.submit');


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

// Route untuk halaman detail proyek
Route::get('/proyekDetail', function () {
    return view('proyekDetail');
})->name('proyekDetail');

// Route untuk halaman forum diskusi
Route::get('/forum', function () {
    return view('forum');
})->name('forum');

// Route untuk halaman tambah task
Route::get('/addTask', function () {
    return view('addTask');
})->name('addTask');

// Route untuk halaman daftar tugas (datugas)
Route::get('/datugas', function () {
    return view('datugas');
})->name('datugas');

// Route untuk halaman Gantt Chart (datugas2) dengan parameter projectId
Route::get('/datugas2', function () {
    return view('datugas2');
})->name('datugas2');

// Route untuk setiap fase
Route::get('/taskplanning', function () {
    return view('taskplanning');
})->name('taskplanning');

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

// Route untuk halaman rekap penilaian (Pilih Dosen atau Mahasiswa)
Route::get('/rekap', function () {
    return view('rekap');
})->name('rekap');

// Route untuk halaman penilaian dosen
Route::get('/penilaian', function () {
    return view('penilaian');
})->name('penilaian');

// Route untuk halaman penilaian dosen
Route::get('/penilaian2', function () {
    return view('penilaian2');
})->name('penilaian2');

Route::get('/masukpbl', function () {
    return view('masukpbl');
})->name('masukpbl');

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

// Route untuk logout (Sementara hanya redirect ke login)
Route::get('/logout', function () {
    return redirect()->route('login');
})->name('logout');