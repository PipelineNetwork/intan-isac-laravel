<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Banksoalanpengetahuan;
use App\Models\Banksoalankemahiran;

class Bankjawapancalon extends Model
{
    use HasFactory;

    public function banksoalanpengetahuans() {
        return $this->belongsTo(Banksoalanpengetahuan::class);
    }

    public function banksoalankemahirans() {
        return $this->belongsTo(Banksoalankemahiran::class);
    }
}
