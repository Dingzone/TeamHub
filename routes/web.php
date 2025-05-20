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
Route::get('/logout', function () {
    return redirect()->route('login');
})->name('logout');

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