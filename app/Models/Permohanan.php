<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohanan extends Model
{
    use HasFactory;


    protected $table = 'pro_peserta';

    public function perkhidmatan()
    {
        return $this->hasOne(Perkhidmatan::class);
    } 

    public function tugas()
    {
        return $this->belongsTo(Tugas::class);
    } 

    public function user()
    {
        return $this->belongsTo(User::class);
    } 


}
