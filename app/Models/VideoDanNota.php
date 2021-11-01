<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoDanNota extends Model
{
    use HasFactory;

    protected $table = 'video_dan_notas';
    protected $fillable = [
        'tajuk', 
        'video',
        'nota'
    ];

}
