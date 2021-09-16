<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perkhidmatan extends Model
{
    // use HasFactory;

    protected $table = 'pro_perkhidmatan';

    protected $fillable = [
        'KOD_GELARAN_JAWATAN',
        'KOD_PERINGKAT',
        'KOD_KLASIFIKASI_PERKHIDMATAN',
        'KOD_GRED_JAWATAN',
        'KOD_TARAF_PERJAWATAN',
        'KOD_JENIS_PERKHIDMATAN',
        'TARIKH_LANTIKAN',
        'ID_PESERTA',
    ];

    public function permohanan()
    {
        return $this->belongsTo(Permohanan::class);
    }
}
