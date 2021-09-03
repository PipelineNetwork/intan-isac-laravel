<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $table = 'pro_tempat_tugas';

    public function permohanan()
    {
        return $this->belongsTo(Permohanan::class);
    } 
}
