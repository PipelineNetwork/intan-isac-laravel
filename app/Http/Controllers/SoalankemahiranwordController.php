<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bankjawapancalon;
use App\Models\Soalankemahiranword;
use Illuminate\Support\Facades\Auth;

class SoalankemahiranwordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_penilaian)
    {
        $jawapancalon = Bankjawapancalon::where('user_id', Auth::user());

        $soalankemahiranword = Soalankemahiranword::where('status_soalan', 1)->inRandomOrder()->limit(1)->get();

        $id_penilaian = $id_penilaian;
        // dd($soalankemahiranword);
        return view('proses_penilaian.soalan_kemahiran.mic_word', [
            'jawapancalons' => $jawapancalon,
            'soalankemahiranwords' => $soalankemahiranword,
            'id_penilaian' => $id_penilaian
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('proses_penilaian.soalan_kemahiran.mic_word1');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_penilaian)
    {
        $current_user = $request->user();

        $jawapancalon = new Bankjawapancalon();

        $jawapancalon->jawapan_word =  $request->jawapan_word;

        $jawapan = Soalankemahiranword::all();

        foreach ($jawapan as $j) {
            if (str_contains($request->jawapan_word, $j->jawapan_1) && isset($j->jawapan_1)) {
                $markah_1 = $j->markah_1;
            } else {
                $markah_1 = 0;
            }
            if (str_contains($request->jawapan_word, $j->jawapan_2) && isset($j->jawapan_2)) {
                $markah_2 = $j->markah_2;
            } else {
                $markah_2 = 0;
            }
            if (str_contains($request->jawapan_word, $j->jawapan_3) && isset($j->jawapan_3)) {
                $markah_3 = $j->markah_3;
            } else {
                $markah_3 = 0;
            }
            if (str_contains($request->jawapan_word, $j->jawapan_4) && isset($j->jawapan_4)) {
                $markah_4 = $j->markah_4;
            } else {
                $markah_4 = 0;
            }
            if (str_contains($request->jawapan_word, $j->jawapan_5) && isset($j->jawapan_5)) {
                $markah_5 = $j->markah_5;
            } else {
                $markah_5 = 0;
            }
            if (str_contains($request->jawapan_word, $j->jawapan_6) && isset($j->jawapan_6)) {
                $markah_6 = $j->markah_6;
            } else {
                $markah_6 = 0;
            }
            if (str_contains($request->jawapan_word, $j->jawapan_7) && isset($j->jawapan_7)) {
                $markah_7 = $j->markah_7;
            } else {
                $markah_7 = 0;
            }
            if (str_contains($request->jawapan_word, $j->jawapan_8) && isset($j->jawapan_8)) {
                $markah_8 = $j->markah_8;
            } else {
                $markah_8 = 0;
            }
            if (str_contains($request->jawapan_word, $j->jawapan_9) && isset($j->jawapan_9)) {
                $markah_9 = $j->markah_9;
            } else {
                $markah_9 = 0;
            }
            if (str_contains($request->jawapan_word, $j->jawapan_10) && isset($j->jawapan_10)) {
                $markah_10 = $j->markah_10;
            } else {
                $markah_10 = 0;
            }
            if (str_contains($request->jawapan_word, $j->jawapan_11) && isset($j->jawapan_11)) {
                $markah_11 = $j->markah_11;
            } else {
                $markah_11 = 0;
            }
            if (str_contains($request->jawapan_word, $j->jawapan_12) && isset($j->jawapan_12)) {
                $markah_12 = $j->markah_12;
            } else {
                $markah_12 = 0;
            }
            if (str_contains($request->jawapan_word, $j->jawapan_13) && isset($j->jawapan_13)) {
                $markah_13 = $j->markah_13;
            } else {
                $markah_13 = 0;
            }
            if (str_contains($request->jawapan_word, $j->jawapan_14) && isset($j->jawapan_14)) {
                $markah_14 = $j->markah_14;
            } else {
                $markah_14 = 0;
            }
            if (str_contains($request->jawapan_word, $j->jawapan_15) && isset($j->jawapan_15)) {
                $markah_15 = $j->markah_15;
            } else {
                $markah_15 = 0;
            }
        }

        $jawapancalon->jumlah_markah_word = $markah_1 + $markah_2 + $markah_3 + $markah_4 + $markah_5 + $markah_6 + $markah_7 + $markah_8 + $markah_9 + $markah_10 + $markah_11 + $markah_12 + $markah_13 + $markah_14 + $markah_15;

        $jawapancalon->user_id = $current_user->id;
        $jawapancalon->id_soalankemahiranword = $request->id_soalankemahiranword;

        $jawapancalon->id_penilaian = $id_penilaian;
        $jawapancalon->ic_calon = Auth::user()->nric;
        // dd($jawapancalon);
        $jawapancalon->save();

        return redirect('/soalan-kemahiran-word-page2/'.$id_penilaian);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_penilaian, $id_word)
    {
        // $jawapancalon = Bankjawapancalon::where('user_id', Auth::user());

        $soalankemahiranword = Soalankemahiranword::where('id', $id_word)->get()->first();
        $id_penilaian = $id_penilaian;
        // dd($soalankemahiranword);
        return view('proses_penilaian.soalan_kemahiran.mic_word1', [
            'soalankemahiranwords' => $soalankemahiranword,
            'id_penilaian' => $id_penilaian
            // 'jawapancalons' => $jawapancalon
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return view('proses_penilaian.soalan_kemahiran.mic_word2');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function test($id_penilaian){
        
        return view('proses_penilaian.soalan_kemahiran.mic_word2',[
            'id_penilaian'=>$id_penilaian
        ]);
    }
}
