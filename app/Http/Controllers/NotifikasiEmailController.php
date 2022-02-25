<?php

namespace App\Http\Controllers;

use App\Models\NotifikasiEmail;
use Illuminate\Http\Request;

class NotifikasiEmailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noti = NotifikasiEmail::first();
        // dd($noti);
        return view('kawalan_sistem.notifikasi_email.index', [
            'noti' => $noti
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kawalan_sistem.notifikasi_email.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $noti = new NotifikasiEmail;

        $noti->tawaran_penilaian = $request->tawaran_penilaian;
        $noti->peringatan_penilaian = $request->peringatan_penilaian;
        $noti->peringatan_tidak_hadir = $request->peringatan_tidak_hadir;
        $noti->jadual_penilaian = $request->jadual_penilaian;

        $noti->save();
        return redirect('/notifikasi_email');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NotifikasiEmail  $notifikasiEmail
     * @return \Illuminate\Http\Response
     */
    public function show(NotifikasiEmail $notifikasiEmail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NotifikasiEmail  $notifikasiEmail
     * @return \Illuminate\Http\Response
     */
    public function edit(NotifikasiEmail $notifikasiEmail)
    {
        return view('kawalan_sistem.notifikasi_email.edit', [
            'noti' => $notifikasiEmail
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NotifikasiEmail  $notifikasiEmail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $noti = NotifikasiEmail::find($id);
        $noti->tawaran_penilaian_individu = $request->tawaran_penilaian_individu;
        $noti->tawaran_penilaian_kumpulan = $request->tawaran_penilaian_kumpulan;
        $noti->peringatan_penilaian = $request->peringatan_penilaian;
        $noti->peringatan_tidak_hadir = $request->peringatan_tidak_hadir;
        $noti->jadual_penilaian = $request->jadual_penilaian;
        $noti->peringatan_tukar_katalaluan = $request->peringatan_tukar_katalaluan;

        $noti->save();
        return redirect('/notifikasi_email');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NotifikasiEmail  $notifikasiEmail
     * @return \Illuminate\Http\Response
     */
    public function destroy(NotifikasiEmail $notifikasiEmail)
    {
        //
    }

    public function penyelia(Request $request)
    {
        $penyelia = NotifikasiEmail::where('id', '1')->first();
        if ($request->penyelia_terima_surat_tawaran == 1) {
            $penyelia->penyelia_terima_surat_tawaran = 1;
        } else {
            $penyelia->penyelia_terima_surat_tawaran = 0;
        }

        if ($request->penyelia_terima_sijil_kelulusan == 1) {
            $penyelia->penyelia_terima_sijil_kelulusan = 1;
        } else {
            $penyelia->penyelia_terima_sijil_kelulusan = 0;
        }

        if ($request->penyelia_terima_slip_keputusan == 1) {
            $penyelia->penyelia_terima_slip_keputusan = 1;
        } else {
            $penyelia->penyelia_terima_slip_keputusan = 0;
        }
        
        $penyelia->save();
        alert()->success('Maklumat yang diterima oleh Penyelia disimpan.','Berjaya');
        return back();
    }
}
