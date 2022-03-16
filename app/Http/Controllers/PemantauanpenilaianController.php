<?php

namespace App\Http\Controllers;

use App\Models\Bankjawapancalon;
use App\Models\Bankjawapanpengetahuan;
use App\Models\Jadual;
use App\Models\KeputusanPenilaian;
use App\Models\MohonPenilaian;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PemantauanpenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penilaian_list = Jadual::orderBy('TARIKH_SESI', 'desc')->get();

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
        $senarai_semak_jawapan = [];
        foreach ($senarai_calon as $key => $calon) {
            $status_semak_jawapan = [];

            $keputusan = KeputusanPenilaian::where('id_penilaian', $id_penilaian)->where('ic_peserta',  $calon->no_ic)->first();
            if ($keputusan != null) {
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
                $pengetahuan = Bankjawapanpengetahuan::where('id_penilaian', $id_penilaian)->where('id_calon',  $calon->no_ic)->first();
                if ($pengetahuan != null) {
                    $kemahiran = Bankjawapancalon::where('id_penilaian', $id_penilaian)->where('ic_calon',  $calon->no_ic)->first();
                    if (($kemahiran->status_jawab_internet == 1) && ($kemahiran->status_jawab_word == 1) && ($kemahiran->status_jawab_email == 1)) {
                        $status_semak_jawapan = [
                            'ic' => $calon->no_ic,
                            'nama' => $calon->nama,
                            'status' => $calon->status_penilaian,
                            'pengetahuan' => 'Selesai',
                            'kemahiran_internet' => 'Selesai',
                            'kemahiran_word' => 'Selesai',
                            'kemahiran_email' => 'Selesai',
                        ];
                    } elseif (($kemahiran->status_jawab_internet == 1) && ($kemahiran->status_jawab_word == 1) && ($kemahiran->status_jawab_email == 0)) {
                        $status_semak_jawapan = [
                            'ic' => $calon->no_ic,
                            'nama' => $calon->nama,
                            'status' => $calon->status_penilaian,
                            'pengetahuan' => 'Selesai',
                            'kemahiran_internet' => 'Selesai',
                            'kemahiran_word' => 'Selesai',
                            'kemahiran_email' => 'Belum selesai',
                        ];
                    } elseif (($kemahiran->status_jawab_internet == 1) && ($kemahiran->status_jawab_word == 0) && ($kemahiran->status_jawab_email == 0)) {
                        $status_semak_jawapan = [
                            'ic' => $calon->no_ic,
                            'nama' => $calon->nama,
                            'status' => $calon->status_penilaian,
                            'pengetahuan' => 'Selesai',
                            'kemahiran_internet' => 'Selesai',
                            'kemahiran_word' => 'Belum selesai',
                            'kemahiran_email' => 'Belum selesai',
                        ];
                    } elseif (($kemahiran->status_jawab_internet == 0) && ($kemahiran->status_jawab_word == 0) && ($kemahiran->status_jawab_email == 0)) {
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
            }
            array_push($senarai_semak_jawapan, $status_semak_jawapan);
        }
        
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

    public function hantar_data(Request $request)
    {
        //get data dari text file
        $data_sedia_ada = Storage::disk('public')->get('pemantauan.txt');
        $data_sedia_ada = json_decode($data_sedia_ada, true);

        //clear data dalam storage
        Storage::disk('public')->put('pemantauan.txt', json_encode([]));

        //data baru ////
        $data_nama = [$_POST['image'], $_POST['name']];

        //tambah data baru dgn data yg dah exist dlm txt file
        //buat checking by calon's nric
        $data_sedia_ada[$_POST['nric']] = $data_nama;

        //masukkan balik data baru and lama dlm txt file
        Storage::disk('public')->put('pemantauan.txt', json_encode($data_sedia_ada));

        // dd(Storage::disk('public')->get('pemantauan.txt'));
    }

    public function terima_data(Request $request)
    {
        // $value = session('senarai_nama');
        $data_sedia_ada = Storage::disk('public')->get('pemantauan.txt');
        $data_sedia_ada = json_decode($data_sedia_ada, true);
        // dd($data_sedia_ada);
        return view(
            'pemantauan_penilaian.webcam_calon',
            compact('data_sedia_ada')
        );
        // return view(
        //     'pemantauan_penilaian.webcam_calon',
        //     compact('value')
        // );
    }

    public function set_semula()
    {
        //clear data dalam storage
        Storage::disk('public')->put('pemantauan.txt', json_encode([]));

        // alert()->success('Telah disetkan semula!');
        return redirect('/pemantauan-kamera');
    }
}
