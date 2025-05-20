<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasPBL extends Model
{
    use HasFactory;

    protected $table = 'kelas_p_b_l_s'; // sesuai dengan nama tabel

    protected $fillable = ['nama_kelas', 'kategori'];
}
