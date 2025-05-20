<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelasPBL;

class DashboardDosenController extends Controller
{
    public function index()
    {
        $jumlahKelas = KelasPBL::count();
        $kelasList = KelasPBL::all();

        return view('dashboardDosen', compact('jumlahKelas', 'kelasList'));
    }

    public function create()
    {
        return view('tambahKelasDosen');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:255',
        ]);

        KelasPBL::create($request->only('nama_kelas', 'kategori'));

        return redirect()->route('dashboard.dosen')->with('success', 'Kelas berhasil ditambahkan.');
    }
}
