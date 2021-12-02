<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Banksoalankemahiran;
use App\Models\Bankjawapancalon;

class Soalankemahiranemail extends Model
{
    use HasFactory;

    public function banksoalankemahirans()
    {
        return $this->belongsTo(Banksoalankemahiran::class);
    }

    public function bankjawapancalons() {
        return $this->belongsTo(Bankjawapancalon::class);
    }
}
