<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RayuanCalonBlacklist extends Model
{
    use HasFactory;
    protected $table = 'rayuan_calon_blacklists';
    protected $primaryKey = 'id';
}
