<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KumpulanPengguna extends Model
{
    use HasFactory;

    protected $table = 'flc_user_group';

    protected $primaryKey = 'GROUP_ID';
}
