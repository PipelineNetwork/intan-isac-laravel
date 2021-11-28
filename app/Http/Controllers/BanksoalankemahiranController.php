<?php

namespace App\Http\Controllers;

use App\Models\Banksoalankemahiran;
use Illuminate\Http\Request;

use App\Models\Soalankemahiraninternet;
use App\Models\Soalankemahiranword;
use App\Models\Soalankemahiranemail;

class BanksoalankemahiranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banksoalankemahiran = Banksoalankemahiran::all();

        return view('bank_soalan.soalan_kemahiran.index', [
            'banksoalankemahirans' => $banksoalankemahiran,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bank_soalan.soalan_kemahiran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_set_soalan' => 'required|unique:banksoalankemahirans'
        ]);

        $banksoalankemahiran = new Banksoalankemahiran();

        $banksoalankemahiran->no_set_soalan = $request->no_set_soalan;

        $banksoalankemahiran->save();

        return redirect('/bank-soalan-kemahiran');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banksoalankemahiran  $banksoalankemahiran
     * @return \Illuminate\Http\Response
     */
    public function show($id_soalankemahiran)
    {
        $banksoalankemahiran = Banksoalankemahiran::find($id_soalankemahiran);
        $soalankemahiraninternet =  Soalankemahiraninternet::where('id_soalankemahiran', $id_soalankemahiran)->get();
        $soalankemahiranword =  Soalankemahiranword::where('id_soalankemahiran', $id_soalankemahiran)->get();
        $soalankemahiranemail =  Soalankemahiranemail::where('id_soalankemahiran', $id_soalankemahiran)->get();

        // dd($soalankemahiraninternet);

        return view('bank_soalan.soalan_kemahiran.index_semua_soalan', [
            'soalankemahiraninternets' => $soalankemahiraninternet,
            'soalankemahiranwords' => $soalankemahiranword,
            'soalankemahiranemails' => $soalankemahiranemail,
            'banksoalankemahirans' => $banksoalankemahiran,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banksoalankemahiran  $banksoalankemahiran
     * @return \Illuminate\Http\Response
     */
    public function edit(Banksoalankemahiran $banksoalankemahiran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banksoalankemahiran  $banksoalankemahiran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banksoalankemahiran $banksoalankemahiran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banksoalankemahiran  $banksoalankemahiran
     * @return \Illuminate\Http\Response
     */
    public function destroy($banksoalankemahiran)
    {
        $banksoalankemahiran = Banksoalankemahiran::find($banksoalankemahiran);
        $banksoalankemahiran->delete();
        return redirect('/bank-soalan-kemahiran');
    }
}
