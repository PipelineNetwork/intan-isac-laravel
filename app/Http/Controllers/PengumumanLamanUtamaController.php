<?php

namespace App\Http\Controllers;

use App\Models\PengumumanLamanUtama;
use Illuminate\Http\Request;

class PengumumanLamanUtamaController extends Controller
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
        $pengumuman_laman_utama = PengumumanLamanUtama::all();

        return view('kawalan_sistem.pengumuman_laman_utama.index', [
            'pengumuman_laman_utamas' => $pengumuman_laman_utama
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kawalan_sistem.pengumuman_laman_utama.create');
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
            'status_button_manual' => 'required',
            'status_pengumuman' => 'required'
        ]);

        $pengumuman_laman_utama = new PengumumanLamanUtama();

        $pengumuman_laman_utama->tajuk_header = $request->tajuk_header;
        $pengumuman_laman_utama->tajuk_pengumuman = $request->tajuk_pengumuman;
        $pengumuman_laman_utama->subtajuk_pengumuman = $request->subtajuk_pengumuman;
        $pengumuman_laman_utama->pengumuman_1 = $request->pengumuman_1;
        $pengumuman_laman_utama->subpengumuman_1 = $request->subpengumuman_1;
        $pengumuman_laman_utama->pengumuman_2 = $request->pengumuman_2;
        $pengumuman_laman_utama->subpengumuman_2 = $request->subpengumuman_2;
        $pengumuman_laman_utama->pengumuman_3 = $request->pengumuman_3;
        $pengumuman_laman_utama->subpengumuman_3 = $request->subpengumuman_3;
        $pengumuman_laman_utama->pengumuman_4 = $request->pengumuman_4;
        $pengumuman_laman_utama->subpengumuman_4 = $request->subpengumuman_4;
        $pengumuman_laman_utama->pengumuman_5 = $request->pengumuman_5;
        $pengumuman_laman_utama->subpengumuman_5 = $request->subpengumuman_5;
        $pengumuman_laman_utama->pengumuman_6 = $request->pengumuman_6;
        $pengumuman_laman_utama->subpengumuman_6 = $request->subpengumuman_6;
        $pengumuman_laman_utama->pengumuman_button_manual = $request->pengumuman_button_manual;
        $pengumuman_laman_utama->status_button_manual = $request->status_button_manual;
        $pengumuman_laman_utama->status_pengumuman = $request->status_pengumuman;

        $pengumuman_laman_utama->save();

        return redirect('/pengumuman_laman_utama');
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
    public function edit(PengumumanLamanUtama $pengumuman_laman_utama)
    {

        return view('kawalan_sistem.pengumuman_laman_utama.edit', [
            'pengumuman_laman_utamas' => $pengumuman_laman_utama
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
        $request->validate([
            'status_button_manual' => 'required',
            'status_pengumuman' => 'required'
        ]);

        $pengumuman_laman_utama = PengumumanLamanUtama::find($id);

        if (empty($request->tajuk_header)) {
            $pengumuman_laman_utama->tajuk_header = null;
        } else {
            $pengumuman_laman_utama->tajuk_header = $request->tajuk_header;
        }
        if (empty($request->tajuk_pengumuman)) {
            $pengumuman_laman_utama->tajuk_pengumuman = null;
        } else {
            $pengumuman_laman_utama->tajuk_pengumuman = $request->tajuk_pengumuman;
        }
        if (empty($request->subtajuk_pengumuman)) {
            $pengumuman_laman_utama->subtajuk_pengumuman = null;
        } else {
            $pengumuman_laman_utama->subtajuk_pengumuman = $request->subtajuk_pengumuman;
        }
        if (empty($request->pengumuman_1)) {
            $pengumuman_laman_utama->pengumuman_1 = null;
        } else {
            $pengumuman_laman_utama->pengumuman_1 = $request->pengumuman_1;
        }
        if (empty($request->subpengumuman_1)) {
            $pengumuman_laman_utama->subpengumuman_1 = null;
        } else {
            $pengumuman_laman_utama->subpengumuman_1 = $request->subpengumuman_1;
        }
        if (empty($request->pengumuman_2)) {
            $pengumuman_laman_utama->pengumuman_2 = null;
        } else {
            $pengumuman_laman_utama->pengumuman_2 = $request->pengumuman_2;
        }
        if (empty($request->subpengumuman_2)) {
            $pengumuman_laman_utama->subpengumuman_2 = null;
        } else {
            $pengumuman_laman_utama->subpengumuman_2 = $request->subpengumuman_2;
        }
        if (empty($request->pengumuman_3)) {
            $pengumuman_laman_utama->pengumuman_3 = null;
        } else {
            $pengumuman_laman_utama->pengumuman_3 = $request->pengumuman_3;
        }
        if (empty($request->subpengumuman_3)) {
            $pengumuman_laman_utama->subpengumuman_3 = null;
        } else {
            $pengumuman_laman_utama->subpengumuman_3 = $request->subpengumuman_3;
        }
        if (empty($request->pengumuman_4)) {
            $pengumuman_laman_utama->pengumuman_4 = null;
        } else {
            $pengumuman_laman_utama->pengumuman_4 = $request->pengumuman_4;
        }
        if (empty($request->subpengumuman_4)) {
            $pengumuman_laman_utama->subpengumuman_4 = null;
        } else {
            $pengumuman_laman_utama->subpengumuman_4 = $request->subpengumuman_4;
        }
        if (empty($request->pengumuman_5)) {
            $pengumuman_laman_utama->pengumuman_5 = null;
        } else {
            $pengumuman_laman_utama->pengumuman_5 = $request->pengumuman_5;
        }
        if (empty($request->subpengumuman_5)) {
            $pengumuman_laman_utama->subpengumuman_5 = null;
        } else {
            $pengumuman_laman_utama->subpengumuman_5 = $request->subpengumuman_5;
        }
        if (empty($request->pengumuman_6)) {
            $pengumuman_laman_utama->pengumuman_6 = null;
        } else {
            $pengumuman_laman_utama->pengumuman_6 = $request->pengumuman_6;
        }
        if (empty($request->subpengumuman_6)) {
            $pengumuman_laman_utama->subpengumuman_6 = null;
        } else {
            $pengumuman_laman_utama->subpengumuman_6 = $request->subpengumuman_6;
        }
        if (empty($request->pengumuman_button_manual)) {
            $pengumuman_laman_utama->pengumuman_button_manual = null;
        } else {
            $pengumuman_laman_utama->pengumuman_button_manual = $request->pengumuman_button_manual;
        }
        $pengumuman_laman_utama->status_button_manual = $request->status_button_manual;
        $pengumuman_laman_utama->status_pengumuman = $request->status_pengumuman;

        $pengumuman_laman_utama->save();

        return redirect('/pengumuman_laman_utama');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengumuman_laman_utama = PengumumanLamanUtama::find($id);

        $pengumuman_laman_utama->delete();

        return redirect('/pengumuman_laman_utama');
    }
}
