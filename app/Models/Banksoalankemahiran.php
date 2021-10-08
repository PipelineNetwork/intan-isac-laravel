<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Bankjawapankemahiran;
use App\Models\Bankjawapancalon;

class Banksoalankemahiran extends Model
{
    use HasFactory;

    public function banksoalankemahirans() {
        return $this->belongsTo(Bankjawapankemahiran::class);
    }

    public function bankjawapancalons() {
        return $this->belongsTo(Bankjawapancalon::class);
    }
}
