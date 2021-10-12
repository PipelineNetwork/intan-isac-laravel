<?php

namespace App\Http\Controllers;

use App\Models\Banksoalanpengetahuan;
use Illuminate\Http\Request;

class BanksoalanpengetahuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banksoalanpengetahuan = Banksoalanpengetahuan::all();

        return view('bank_soalan.soalan_pengetahuan.index',[
            'banksoalanpengetahuans' => $banksoalanpengetahuan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bank_soalan.soalan_pengetahuan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $banksoalanpengetahuan = new Banksoalanpengetahuan();

        $banksoalanpengetahuan->id_tahap_soalan = $request->id_tahap_soalan;
        $banksoalanpengetahuan->id_kategori_pengetahuan = $request->id_kategori_pengetahuan;
        $banksoalanpengetahuan->jenis_soalan = $request->jenis_soalan;
        $banksoalanpengetahuan->knowledge_area = $request->knowledge_area;
        $banksoalanpengetahuan->topik_soalan = $request->topik_soalan;
        $banksoalanpengetahuan->penyataan_soalan = $request->penyataan_soalan;
        $banksoalanpengetahuan->id_status_soalan = $request->id_status_soalan;
        $banksoalanpengetahuan->pilihan_jawapan = $request->pilihan_jawapan;
        $banksoalanpengetahuan->jawapan = $request->jawapan;
        if (!empty($request->file('muat_naik_fail'))) {
            $muat_naik_fail = $request->file('muat_naik_fail')->store('soalan');
            $banksoalanpengetahuan->muat_naik_fail = $muat_naik_fail;
        }
        
        // dd($banksoalanpengetahuan);
        $banksoalanpengetahuan->save();

        return redirect('/bank-soalan-pengetahuan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banksoalanpengetahuan  $banksoalanpengetahuan
     * @return \Illuminate\Http\Response
     */
    public function show(Banksoalanpengetahuan $banksoalanpengetahuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banksoalanpengetahuan  $banksoalanpengetahuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Banksoalanpengetahuan $banksoalanpengetahuan, $id)
    {
        $banksoalanpengetahuan = Banksoalanpengetahuan::find($id);

        return view('bank_soalan.soalan_pengetahuan.edit', [
            'banksoalanpengetahuan' => $banksoalanpengetahuan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banksoalanpengetahuan  $banksoalanpengetahuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banksoalanpengetahuan $banksoalanpengetahuan)
    {
        $banksoalanpengetahuan = Banksoalanpengetahuan::find($request->id);
        
        $banksoalanpengetahuan->id_tahap_soalan = $request->id_tahap_soalan;
        $banksoalanpengetahuan->id_kategori_pengetahuan = $request->id_kategori_pengetahuan;
        $banksoalanpengetahuan->jenis_soalan = $request->jenis_soalan;
        $banksoalanpengetahuan->knowledge_area = $request->knowledge_area;
        $banksoalanpengetahuan->topik_soalan = $request->topik_soalan;
        $banksoalanpengetahuan->penyataan_soalan = $request->penyataan_soalan;
        $banksoalanpengetahuan->id_status_soalan = $request->id_status_soalan;
        $banksoalanpengetahuan->pilihan_jawapan = $request->pilihan_jawapan;
        $banksoalanpengetahuan->jawapan = $request->jawapan;
        if (!empty($request->file('muat_naik_fail'))) {
            $muat_naik_fail = $request->file('muat_naik_fail')->store('soalan');
            $banksoalanpengetahuan->muat_naik_fail = $muat_naik_fail;
        }
        
        // dd($banksoalanpengetahuan);
        $banksoalanpengetahuan->save();

        return redirect('/bank-soalan-pengetahuan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banksoalanpengetahuan  $banksoalanpengetahuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banksoalanpengetahuan $banksoalanpengetahuan, $id)
    {
        $banksoalanpengetahuan = Banksoalanpengetahuan::find($id);

        $banksoalanpengetahuan->delete();

        return redirect('/bank-soalan-pengetahuan');
    }
}
