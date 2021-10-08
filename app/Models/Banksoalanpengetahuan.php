<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Bankjawapanpengetahuan;
use App\Models\Bankjawapancalon;

class Banksoalanpengetahuan extends Model
{
    use HasFactory;

    public function bankjawapanpengetahuans() {
        return $this->belongsTo(Bankjawapanpengetahuan::class);
    }

    public function bankjawapancalons() {
        return $this->belongsTo(Bankjawapancalon::class);
    }
}
