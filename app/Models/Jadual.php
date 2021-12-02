<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadual extends Model
{
    use HasFactory;

    protected $table = 'pro_sesi';

    protected $primaryKey = 'ID_SESI';

    public function mohonpenilaian(){
        return $this->hasMany(MohonPenilaian::class);
    }
}
