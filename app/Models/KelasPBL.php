<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasPBL extends Model
{
    use HasFactory;

    protected $table = 'kelas_p_b_l_s'; 

    protected $fillable = ['nama_kelas', 'kategori'];
}
