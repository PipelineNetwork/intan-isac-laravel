<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemilihanSoalanKumpulan extends Model
{
    use HasFactory;
    protected $table = 'pro_pemilihan_soalan_kumpulan';
    protected $primaryKey = 'ID_PEMILIHAN_SOALAN_KUMPULAN';
    protected $guarded = ['id'];
}
