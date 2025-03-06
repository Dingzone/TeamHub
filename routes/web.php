<?php

use Illuminate\Support\Facades\Route;

// Route untuk halaman login
Route::get('/', function () {
    return view('login');
});

// Route untuk proses login
Route::post('/login', function () {
    return redirect('/dashboard');
});

// Route untuk halaman dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route untuk halaman proyek
Route::get('/proyek', function () {
    return view('proyek');
})->name('proyek');

// Route untuk halaman addProyek
Route::get('/addProyek', function () {
    return view('addProyek');
})->name('addProyek');

// Route untuk halaman proyekDetail
Route::get('/proyekDetail', function () {
    return view('proyekDetail');
})->name('proyekDetail');

// Route untuk halaman forum
Route::get('/forum', function () {
    return view('forum');
})->name('forum');

// Route untuk halaman addTask
Route::get('/addTask', function () {
    return view('addTask');
})->name('addTask');