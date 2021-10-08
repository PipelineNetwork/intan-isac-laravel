<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Banksoalanpengetahuan;

class Bankjawapanpengetahuan extends Model
{
    use HasFactory;

    public function banksoalanpengetahuans() {
        return $this->belongsTo(Banksoalanpengetahuan::class);
    }
}
