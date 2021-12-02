<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotifikasiEmail extends Model
{
    use HasFactory;

    protected $table = 'notifikasi_emails';
    protected $fillable = [
        'tawaran_penilaian_individu', 
        'tawaran_penilaian_kumpulan',
        'peringatan_tidak_hadir', 
        'jadual_penilaian',
        'peringatan_penilaian'
    ];
}
