<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    // use HasFactory;

    protected $table = 'pro_tempat_tugas';

    protected $fillable = [
        'ID_PESERTA',
        'GELARAN_KETUA_JABATAN',
        'KOD_KEMENTERIAN',
        'KOD_JABATAN',
        'BAHAGIAN',
        'ALAMAT_1',
        'ALAMAT_2',
        'ALAMAT_3',
        'POSKOD',
        'BANDAR',
        'KOD_NEGERI',
        'KOD_NEGARA',
        'NAMA_PENYELIA',
        'EMEL_PENYELIA',
        'NO_TELEFON_PENYELIA',
        'NO_FAX_PENYELIA',
        'STATUS_PUSH_PULL',
    ];

    public function permohanan()
    {
        return $this->belongsTo(Permohanan::class);
    }
}
