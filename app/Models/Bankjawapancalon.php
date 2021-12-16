<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Banksoalanpengetahuan;
use App\Models\Banksoalankemahiran;
use App\Models\Soalankemahiraninternet;
use App\Models\Soalankemahiranword;
use App\Models\Soalankemahiranemail;

class Bankjawapancalon extends Model
{
    use HasFactory;

    public function banksoalanpengetahuans() {
        return $this->belongsTo(Banksoalanpengetahuan::class);
    }

    public function banksoalankemahirans() {
        return $this->belongsTo(Banksoalankemahiran::class);
    }

    public function soalankemahiraninternets() {
        return $this->belongsTo(Soalankemahiraninternet::class);
    }

    public function soalankemahiranwords() {
        return $this->belongsTo(Soalankemahiranword::class);
    }

    public function soalankemahiranemails() {
        return $this->belongsTo(Soalankemahiranemail::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
