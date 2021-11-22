<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Banksoalankemahiran;

class Soalankemahiranemail extends Model
{
    use HasFactory;

    public function banksoalankemahirans()
    {
        return $this->belongsTo(Banksoalankemahiran::class);
    }
}
