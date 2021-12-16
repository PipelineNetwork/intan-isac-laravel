<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\TambahAduan;
use App\Models\TambahRayuan;
use App\Models\Bankjawapancalon;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_group_id'
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function permohanan()
    {
        return $this->belongsTo(Permohanan::class);
    } 

    public function tambah_aduans(){
        return $this->hasMany(TambahAduan::class);
    }

    public function tambah_rayuans(){
        return $this->hasMany(TambahRayuan::class);
    }

    public function jawapan_calons(){
        return $this->hasMany(Bankjawapancalon::class);
    }
}
