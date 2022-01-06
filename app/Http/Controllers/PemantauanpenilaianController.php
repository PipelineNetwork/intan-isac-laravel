<?php

namespace App\Http\Controllers;

use App\Models\Bankjawapancalon;
use App\Models\Bankjawapanpengetahuan;
use App\Models\Jadual;
use App\Models\MohonPenilaian;
use Illuminate\Http\Request;

class PemantauanpenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penilaian_list = Jadual::orderBy('updated_at', 'desc')->get();

        return view('pemantauan_penilaian.index', [
            'penilaian_lists' => $penilaian_list,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_penilaian)
    {
        $senarai_calon = MohonPenilaian::where('id_sesi', $id_penilaian)->get();
        // $ic_calon = $senarai_calon->no_ic;
        $senarai_semak_jawapan = [];
        foreach ($senarai_calon as $key => $calon) {
            $status_semak_jawapan = [];

            $pengetahuan = Bankjawapanpengetahuan::where('id_penilaian', $id_penilaian)->where('id_calon',  $calon->no_ic)->first();
            // $kemahiran = Bankjawapancalon::where('id_penilaian', $id_penilaian)->where('ic_calon',  $calon->no_ic)->first();
            if ($pengetahuan != null) {
                $kemahiran = Bankjawapancalon::where('id_penilaian', $id_penilaian)->where('ic_calon',  $calon->no_ic)->first();
                if ($kemahiran != null) {
                    if ($kemahiran->id_soalankemahiraninternet != null) {
                        if ($kemahiran->id_soalankemahiranword != null) {
                            if ($kemahiran->id_soalankemahiranemail != null) {
                                $status_semak_jawapan = [
                                    'ic' => $calon->no_ic,
                                    'nama' => $calon->nama,
                                    'status' => $calon->status_penilaian,
                                    'pengetahuan' => 'Selesai',
                                    'kemahiran_internet' => 'Selesai',
                                    'kemahiran_word' => 'Selesai',
                                    'kemahiran_email' => 'Selesai',
                                ];
                            } else {
                                $status_semak_jawapan = [
                                    'ic' => $calon->no_ic,
                                    'nama' => $calon->nama,
                                    'status' => $calon->status_penilaian,
                                    'pengetahuan' => 'Selesai',
                                    'kemahiran_internet' => 'Selesai',
                                    'kemahiran_word' => 'Selesai',
                                    'kemahiran_email' => 'Belum selesai',
                                ];
                            }
                        } else {
                            $status_semak_jawapan = [
                                'ic' => $calon->no_ic,
                                'nama' => $calon->nama,
                                'status' => $calon->status_penilaian,
                                'pengetahuan' => 'Selesai',
                                'kemahiran_internet' => 'Selesai',
                                'kemahiran_word' => 'Belum selesai',
                                'kemahiran_email' => 'Belum selesai',
                            ];
                        }
                    } else {
                        $status_semak_jawapan = [
                            'ic' => $calon->no_ic,
                            'nama' => $calon->nama,
                            'status' => $calon->status_penilaian,
                            'pengetahuan' => 'Selesai',
                            'kemahiran_internet' => 'Belum selesai',
                            'kemahiran_word' => 'Belum selesai',
                            'kemahiran_email' => 'Belum selesai',
                        ];
                    }
                } else {
                    $status_semak_jawapan = [
                        'ic' => $calon->no_ic,
                        'nama' => $calon->nama,
                        'status' => $calon->status_penilaian,
                        'pengetahuan' => 'Selesai',
                        'kemahiran_internet' => 'Belum selesai',
                        'kemahiran_word' => 'Belum selesai',
                        'kemahiran_email' => 'Belum selesai',
                    ];
                }
            } else {
                $status_semak_jawapan = [
                    'ic' => $calon->no_ic,
                    'nama' => $calon->nama,
                    'status' => $calon->status_penilaian,
                    'pengetahuan' => 'Belum selesai',
                    'kemahiran_internet' => 'Belum selesai',
                    'kemahiran_word' => 'Belum selesai',
                    'kemahiran_email' => 'Belum selesai',
                ];
            }

            array_push($senarai_semak_jawapan, $status_semak_jawapan);
        }
        // dd($senarai_semak_jawapan);

        return view('pemantauan_penilaian.show', [
            'senarai_semak_jawapans' => $senarai_semak_jawapan
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
