<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelasPBL;

class MahasiswaController extends Controller
{
    public function dashboard()
    {
        $kelas = KelasPBL::all(); // Ambil semua kelas dari database
        $jumlahKelas = $kelas->count(); // Hitung jumlah kelas

        // Kirim data kelas dan jumlahnya ke view
        return view('dashboard', compact('kelas', 'jumlahKelas'));
    }
}
