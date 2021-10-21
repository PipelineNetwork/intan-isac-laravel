<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bankjawapancalon;

class SoalankemahiranemailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jawapancalon = Bankjawapancalon::all();

        return view('proses_penilaian.soalan_kemahiran.email', [
            'jawapancalons' => $jawapancalon
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proses_penilaian.soalan_kemahiran.email1');
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

        $jawapancalon->input_to = $request->input_to;
        $jawapancalon->input_subject = $request->input_subject;
        $jawapancalon->input_mesej = $request->input_mesej;
        $jawapancalon->user_id = $current_user->id;
        if (!empty($request->file('fail_upload'))) {
            $muat_naik_fail = $request->file('fail_upload')->store('jawapancalon');
            $jawapancalon->fail_upload = $muat_naik_fail;
        }
        $jawapancalon->save();

        return view('proses_penilaian.soalan_kemahiran.email2', [
            'jawapancalons' => $jawapancalon
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
        //
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
