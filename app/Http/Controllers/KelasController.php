<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelasPBL;

class KelasController extends Controller
{
    public function show($id)
    {
        $kelas = KelasPBL::findOrFail($id);
        return view('kelasDetail', compact('kelas'));
    }
}
