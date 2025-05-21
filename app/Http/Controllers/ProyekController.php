<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelasPBL;

class ProyekController extends Controller
{
    public function index()
    {
        $kelas = KelasPBL::all();
        $jumlahKelas = $kelas->count();

        return view('proyek', compact('kelas', 'jumlahKelas'));
    }
}

