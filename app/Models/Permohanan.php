<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohanan extends Model
{
    // use HasFactory;

    protected $table = 'pro_peserta';

    protected $fillable = [
        'KOD_GELARAN',
        'NAMA_PESERTA',
        'TARIKH_LAHIR',
        'KOD_JANTINA',
        'EMEL_PESERTA',
        'KOD_KATEGORI_PESERTA',
        'NO_KAD_PENGENALAN',
        'NO_TELEFON_BIMBIT',
        'NO_TELEFON_PEJABAT',
        'user_id',
    ];

    protected $primaryKey = 'ID_PESERTA';

    public function perkhidmatan()
    {
        return $this->hasOne(Perkhidmatan::class);
    }

    public function tugas()
    {
        return $this->belongsTo(Tugas::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
