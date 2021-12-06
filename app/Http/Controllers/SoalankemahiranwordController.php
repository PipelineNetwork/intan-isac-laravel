<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bankjawapancalon;
use App\Models\Soalankemahiranword;

class SoalankemahiranwordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jawapancalon = Bankjawapancalon::all();

        $soalankemahiranword = Soalankemahiranword::where('status_soalan', 1)->inRandomOrder()->limit(1)->get();

        // dd($soalankemahiranword);
        return view('proses_penilaian.soalan_kemahiran.mic_word', [
            'jawapancalons' => $jawapancalon,
            'soalankemahiranwords' => $soalankemahiranword
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
    public function store(Request $request)
    {
        $current_user = $request->user();

        $jawapancalon = new Bankjawapancalon();

        $jawapancalon->jawapan_word = $request->jawapan_word;
        $jawapancalon->user_id = $current_user->id;
        $jawapancalon->id_soalankemahiranword = $request->id_soalankemahiranword;
        $jawapancalon->save();

        return view('proses_penilaian.soalan_kemahiran.mic_word2', [
            'jawapancalons' => $jawapancalon,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_word)
    {
        $soalankemahiranword = Soalankemahiranword::where('id', $id_word)->get()->first();

        // dd($soalankemahiranword);
        return view('proses_penilaian.soalan_kemahiran.mic_word1', [
            'soalankemahiranwords' => $soalankemahiranword
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
}
