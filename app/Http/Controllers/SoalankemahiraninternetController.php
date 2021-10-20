<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bankjawapancalon;

class SoalankemahiraninternetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jawapancalon = Bankjawapancalon::all();

        return view('proses_penilaian.soalan_kemahiran.internet', [
            'jawapancalons' => $jawapancalon,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proses_penilaian.soalan_kemahiran.internet1');
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

        $jawapancalon->url_teks = $request->url_teks;
        $jawapancalon->user_id = $current_user->id;
        $jawapancalon->save();

        return view('proses_penilaian.soalan_kemahiran.internet2', [
            'jawapancalons' => $jawapancalon,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jawapancalon = Bankjawapancalon::find($id);

        return view('proses_penilaian.soalan_kemahiran.internet2', [
            'jawapancalons' => $jawapancalon,
        ]);
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
        $jawapancalon = Bankjawapancalon::find($id);

        $jawapancalon->carian_teks = $request->carian_teks;

        $jawapancalon->save();

        return view('proses_penilaian.soalan_kemahiran.internet3', [
            'jawapancalons' => $jawapancalon,
        ]);
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

    public function edit1(Request $request, $id)
    {
        $jawapancalon = Bankjawapancalon::find($id);

        return view('proses_penilaian.soalan_kemahiran.internet4', [
            'jawapancalons' => $jawapancalon,
        ]);
    }

    public function edit2(Request $request, $id)
    {
        $jawapancalon = Bankjawapancalon::find($id);

        return view('proses_penilaian.soalan_kemahiran.internet5', [
            'jawapancalons' => $jawapancalon,
        ]);
    }

    public function edit3(Request $request, $id)
    {
        $jawapancalon = Bankjawapancalon::find($id);

        return view('proses_penilaian.soalan_kemahiran.internet6', [
            'jawapancalons' => $jawapancalon,
        ]);
    }
}
