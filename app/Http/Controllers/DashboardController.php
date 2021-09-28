<?php

namespace App\Http\Controllers;

use App\Models\Jadual;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $jaduals = Jadual::all();
        return view('dashboard',[
           'jaduals'=> $jaduals
        ]);
    }
}
