<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Bankjawapankemahiran;
use App\Models\Bankjawapancalon;
use App\Models\Soalankemahiranemail;
use App\Models\Soalankemahiranword;
use App\Models\Soalankemahiraninternet;

class Banksoalankemahiran extends Model
{
    use HasFactory;

    public function banksoalankemahirans()
    {
        return $this->belongsTo(Bankjawapankemahiran::class);
    }

    public function bankjawapancalons()
    {
        return $this->belongsTo(Bankjawapancalon::class);
    }

    public function banksoalaninternets()
    {
        return $this->hasMany(Soalankemahiraninternet::class);
    }

    public function banksoalanwords()
    {
        return $this->hasMany(Soalankemahiranword::class);
    }

    public function banksoalanemails()
    {
        return $this->hasMany(Soalankemahiranemail::class);
    }
}
