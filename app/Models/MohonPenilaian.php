<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MohonPenilaian extends Model
{
    use HasFactory;

    public function jadual(){
        return $this->belongsTo(Jadual::class);
    }
}
