<?php

namespace App\Http\Controllers;

use App\Models\Jadual;
use App\Models\VideoDanNota;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        $videodannotas = VideoDanNota::all();
        return view('dashboard',[
           'videodannotas' => $videodannotas
        ]);
    }
}
