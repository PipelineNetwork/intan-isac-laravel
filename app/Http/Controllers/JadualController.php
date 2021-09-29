<?php

namespace App\Http\Controllers;

use App\Models\Jadual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\JadualKemaskini;
use Illuminate\Support\Facades\Validator;

class JadualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jaduals = Jadual::orderBy('TARIKH_SESI', 'desc')
            ->get();
        //dd($jaduals);
        // foreach ($jaduals as $j) {
        //     echo $j->ID_SESI;
        //     echo ("<br>");
        // }
        return view('jadual.index', [
            'jaduals' => $jaduals
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jadual.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jadual = new Jadual;
        $jadual->KOD_SESI_PENILAIAN = $request->KOD_SESI_PENILAIAN;
        $jadual->KOD_TAHAP = $request->KOD_TAHAP;
        $jadual->KOD_MASA_MULA = $request->KOD_MASA_MULA;
        $jadual->KOD_MASA_TAMAT = $request->KOD_MASA_TAMAT;
        $jadual->TARIKH_SESI = $request->TARIKH_SESI;
        $jadual->JUMLAH_KESELURUHAN = $request->JUMLAH_KESELURUHAN;
        $jadual->platform = $request->platform;
        $jadual->KOD_KATEGORI_PESERTA = $request->KOD_KATEGORI_PESERTA;
        $jadual->KOD_KEMENTERIAN = $request->KOD_KEMENTERIAN;
        $jadual->LOKASI = $request->LOKASI;

        $rules = [
            'KOD_SESI_PENILAIAN' => 'required',
            'KOD_TAHAP' => 'required',
            'KOD_MASA_MULA' => 'required',
            'KOD_MASA_TAMAT' => 'required',
            'TARIKH_SESI' => 'required',
            'JUMLAH_KESELURUHAN' => 'required',
            'KOD_KATEGORI_PESERTA' => 'required',
            'platform' => 'required',
        ];
        $messages = [
            'KOD_SESI_PENILAIAN.required' => 'Sila pilih kod sesi',
            'KOD_TAHAP.required' => 'Sila pilih kod tahap',
            'KOD_MASA_MULA.required' => 'Sila isi masa mula',
            'KOD_MASA_TAMAT.required' => 'Sila isi masa tamat',
            'TARIKH_SESI.required' => 'Sila pilih tarikh sesi',
            'JUMLAH_KESELURUHAN.required' => 'Sila isi jumlah calon',
            'KOD_KATEGORI_PESERTA.required' => 'Sila pilih kumpulan',
            'platform.required' => 'Sila pilih plaform',
        ];
        Validator::make($request->input(), $rules, $messages)->validate();

        $jadual->save();

        return redirect('/jaduals');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Jadual $jadual)
    {
        return view('jadual.show', [
            'jadual' => $jadual
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($ID_SESI)
    {
        $jadual = Jadual::where('ID_SESI', $ID_SESI)->first();
        return view('jadual.edit', ['jadual' => $jadual, 'ID_SESI' => $ID_SESI]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadual $jadual)
    {
        $jadual->KOD_SESI_PENILAIAN = $request->KOD_SESI_PENILAIAN;
        $jadual->KOD_TAHAP = $request->KOD_TAHAP;
        $jadual->KOD_MASA_MULA = $request->KOD_MASA_MULA;
        $jadual->KOD_MASA_TAMAT = $request->KOD_MASA_TAMAT;
        $jadual->TARIKH_SESI = $request->TARIKH_SESI;
        $jadual->JUMLAH_KESELURUHAN = $request->JUMLAH_KESELURUHAN;
        $jadual->platform = $request->platform;
        $jadual->KOD_KATEGORI_PESERTA = $request->KOD_KATEGORI_PESERTA;
        $jadual->KOD_KEMENTERIAN = $request->KOD_KEMENTERIAN;
        $jadual->LOKASI = $request->LOKASI;
        $jadual->status = $request->status;
        $jadual->keterangan = $request->keterangan;

        $rules = [
            'KOD_SESI_PENILAIAN' => 'required',
            'KOD_TAHAP' => 'required',
            'KOD_MASA_MULA' => 'required',
            'KOD_MASA_TAMAT' => 'required',
            'TARIKH_SESI' => 'required',
            'JUMLAH_KESELURUHAN' => 'required',
            'KOD_KATEGORI_PESERTA' => 'required',
            'platform' => 'required',
            'status' => 'required',
            'keterangan' => 'required',
        ];
        $messages = [
            'KOD_SESI_PENILAIAN.required' => 'Sila pilih kod sesi',
            'KOD_TAHAP.required' => 'Sila pilih kod tahap',
            'KOD_MASA_MULA.required' => 'Sila isi masa mula',
            'KOD_MASA_TAMAT.required' => 'Sila isi masa tamat',
            'TARIKH_SESI.required' => 'Sila pilih tarikh sesi',
            'JUMLAH_KESELURUHAN.required' => 'Sila isi jumlah calon',
            'KOD_KATEGORI_PESERTA.required' => 'Sila pilih kumpulan',
            'platform.required' => 'Sila pilih plaform',
            'status.required' => 'Sila pilih status',
            'keterangan.required' => 'Sila isi keterangan',
        ];
        Validator::make($request->input(), $rules, $messages)->validate();
        $jadual->save();
        $recipient = ["najhan.mnajib@gmail.com"];
        Mail::to($recipient)->send(new JadualKemaskini());
        return redirect('/jaduals');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadual $jadual)
    {
        $jadual = Jadual::find($jadual);
        $jadual->delete();
        return redirect('/jaduals');
    }

    // kemaskini status
    public function kemaskini_status($jadual, Request $request)
    {
        // dd($jadual);
        $jadual = Jadual::where("ID_SESI", $jadual)->first();
        // dd($jadual);
        $jadual->status = $request->status;
        $jadual->keterangan = $request->keterangan;
        $jadual->save();

        $recipient = ["najhan.mnajib@gmail.com"];
        Mail::to($recipient)->send(new JadualKemaskini());

        return redirect('/jaduals');
    }
}
