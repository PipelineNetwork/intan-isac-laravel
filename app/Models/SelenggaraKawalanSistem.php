<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelenggaraKawalanSistem extends Model
{
    use HasFactory;

    protected $table = 'pro_kawalan_sistem';

    protected $primaryKey = 'ID_KAWALAN_SISTEM';
}
