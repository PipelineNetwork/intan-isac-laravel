<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perkhidmatan extends Model
{
    use HasFactory;

    protected $table = 'pro_perkhidmatan';

    public function permohanan()
    {
        return $this->belongsTo(Permohanan::class);
    } 

}
