<?php

namespace App\Http\Controllers;

use App\Models\Jadual;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\JadualKemaskini;
use App\Mail\JadualKemaskiniPenangguhan;
use App\Mail\JadualKemaskiniPembatalan;
use Illuminate\Support\Facades\Validator;
use App\Models\Permohanan;
use App\Models\MohonPenilaian;
use App\Models\Refgeneral;
use Spatie\Permission\Models\Role;
use App\Models\SelenggaraKawalanSistem;

class JadualController extends Controller
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
        $penyelaras = User::where('user_group_id', '3')->get();
        // dd($penyelaras);
        $jaduals = Jadual::orderBy('TARIKH_SESI', 'desc')
            ->whereYear('TARIKH_SESI', '>=', 2021)
            ->get();
        return view('jadual.index', [
            'jaduals' => $jaduals,
            'penyelaras' => $penyelaras
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kementerians = Refgeneral::where('MASTERCODE', '10028')->get();
        $role = Role::where('name', 'penyelaras')->first();
        $role_id = $role->id;
        $penyelaras = User::where('user_group_id', $role_id)->get();

        $masa_penilaian = SelenggaraKawalanSistem::where('ID_KAWALAN_SISTEM', '1')->first();
        $masa_pengetahuan = $masa_penilaian->TEMPOH_MASA_KESELURUHAN_PENILAIAN;
        return view('jadual.create',[
            'kementerians'=>$kementerians,
            'penyelaras'=>$penyelaras,
            'masa_pengetahuan'=>$masa_pengetahuan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
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
        $jadual->user_id=$request->user_id;
        $jadual->ID_PENILAIAN = random_int(100000, 999999);
        $jadual->KEKOSONGAN = $request->JUMLAH_KESELURUHAN;

        if($jadual->KOD_KATEGORI_PESERTA == "02"){
            if($jadual->platform == "Fizikal"){
                $rules = [
                    'KOD_SESI_PENILAIAN' => 'required',
                    'KOD_TAHAP' => 'required',
                    'KOD_MASA_MULA' => 'required',
                    'KOD_MASA_TAMAT' => 'required',
                    'TARIKH_SESI' => 'required',
                    'JUMLAH_KESELURUHAN' => 'required',
                    'KOD_KATEGORI_PESERTA' => 'required',
                    'KOD_KEMENTERIAN' => 'required',
                    'user_id'=>'required',
                    'platform' => 'required',
                    'LOKASI'=>'required',
                ];
            }else{
                $rules = [
                    'KOD_SESI_PENILAIAN' => 'required',
                    'KOD_TAHAP' => 'required',
                    'KOD_MASA_MULA' => 'required',
                    'KOD_MASA_TAMAT' => 'required',
                    'TARIKH_SESI' => 'required',
                    'JUMLAH_KESELURUHAN' => 'required',
                    'KOD_KATEGORI_PESERTA' => 'required',
                    'KOD_KEMENTERIAN' => 'required',
                    'user_id'=>'required',
                    'platform' => 'required',
                ];
            }
        }else{
            if($jadual->platform == "Fizikal"){
                $rules = [
                    'KOD_SESI_PENILAIAN' => 'required',
                    'KOD_TAHAP' => 'required',
                    'KOD_MASA_MULA' => 'required',
                    'KOD_MASA_TAMAT' => 'required',
                    'TARIKH_SESI' => 'required',
                    'JUMLAH_KESELURUHAN' => 'required',
                    'KOD_KATEGORI_PESERTA' => 'required',
                    'platform' => 'required',
                    'LOKASI'=>'required',
                ];
            }else{
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
            }
        }

        $messages = [
            'KOD_SESI_PENILAIAN.required' => 'Sila pilih kod sesi',
            'KOD_TAHAP.required' => 'Sila pilih kod tahap',
            'KOD_MASA_MULA.required' => 'Sila isi masa mula',
            'KOD_MASA_TAMAT.required' => 'Sila isi masa tamat',
            'TARIKH_SESI.required' => 'Sila pilih tarikh sesi',
            'JUMLAH_KESELURUHAN.required' => 'Sila isi jumlah calon',
            'KOD_KATEGORI_PESERTA.required' => 'Sila pilih kategori',
            'platform.required' => 'Sila pilih platform',
            'KOD_KEMENTERIAN.required' => 'Sila pilih jabatan kementerian',
            'LOKASI.required'=>'Sila pilih lokasi',
            'user_id.required'=>'Sila pilih penyelaras'
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
        $penyelaras_id = $jadual->user_id;
        if($penyelaras_id != null){
            $penyelaras_sesi = User::where('id', $penyelaras_id)->first();
        }else{
            $penyelaras_sesi = null;
        }
        // dd($penyelaras_id);
        $penyelaras = User::where('user_group_id', '3')->get();

        return view('jadual.edit', [
            'jadual' => $jadual, 
            'ID_SESI' => $ID_SESI,
            'penyelaras_sesi' => $penyelaras_sesi,
            'penyelaras' => $penyelaras
        ]);
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
        $jadual->user_id = $request->user_id;
        $jadual->LOKASI = $request->LOKASI;
        $jadual->status = $request->status;
        $jadual->keterangan = $request->keterangan;

        $idpenilaian = $jadual->ID_PENILAIAN;
        $list_calon = MohonPenilaian::where('id_sesi', $idpenilaian)->get();
        
        $emel_peserta = [];
        foreach($list_calon as $calon){
            $id_peserta = $calon->id_calon;
            $peserta = Permohanan::where('ID_PESERTA', $id_peserta)->first();
            if($peserta != null){
                $email = $peserta->EMEL_PESERTA;
                $emel_peserta = $email;
            }
        }

        if($jadual->KOD_KATEGORI_PESERTA == "02"){
            if($jadual->platform == "Fizikal"){
                $rules = [
                    'KOD_SESI_PENILAIAN' => 'required',
                    'KOD_TAHAP' => 'required',
                    'KOD_MASA_MULA' => 'required',
                    'KOD_MASA_TAMAT' => 'required',
                    'TARIKH_SESI' => 'required',
                    'JUMLAH_KESELURUHAN' => 'required',
                    'KOD_KATEGORI_PESERTA' => 'required',
                    'KOD_KEMENTERIAN' => 'required',
                    'user_id'=>'required',
                    'platform' => 'required',
                    'LOKASI'=>'required',
                    'keterangan'=>'required'
                ];
            }else{
                $rules = [
                    'KOD_SESI_PENILAIAN' => 'required',
                    'KOD_TAHAP' => 'required',
                    'KOD_MASA_MULA' => 'required',
                    'KOD_MASA_TAMAT' => 'required',
                    'TARIKH_SESI' => 'required',
                    'JUMLAH_KESELURUHAN' => 'required',
                    'KOD_KATEGORI_PESERTA' => 'required',
                    'KOD_KEMENTERIAN' => 'required',
                    'user_id'=>'required',
                    'platform' => 'required',
                    'keterangan'=>'required'
                ];
            }
        }else{
            if($jadual->platform == "Fizikal"){
                $rules = [
                    'KOD_SESI_PENILAIAN' => 'required',
                    'KOD_TAHAP' => 'required',
                    'KOD_MASA_MULA' => 'required',
                    'KOD_MASA_TAMAT' => 'required',
                    'TARIKH_SESI' => 'required',
                    'JUMLAH_KESELURUHAN' => 'required',
                    'KOD_KATEGORI_PESERTA' => 'required',
                    'platform' => 'required',
                    'LOKASI'=>'required',
                    'keterangan'=>'required'
                ];
            }else{
                $rules = [
                    'KOD_SESI_PENILAIAN' => 'required',
                    'KOD_TAHAP' => 'required',
                    'KOD_MASA_MULA' => 'required',
                    'KOD_MASA_TAMAT' => 'required',
                    'TARIKH_SESI' => 'required',
                    'JUMLAH_KESELURUHAN' => 'required',
                    'KOD_KATEGORI_PESERTA' => 'required',
                    'platform' => 'required',
                    'keterangan'=>'required'
                ];
            }
        }

        $messages = [
            'KOD_SESI_PENILAIAN.required' => 'Sila pilih kod sesi',
            'KOD_TAHAP.required' => 'Sila pilih kod tahap',
            'KOD_MASA_MULA.required' => 'Sila isi masa mula',
            'KOD_MASA_TAMAT.required' => 'Sila isi masa tamat',
            'TARIKH_SESI.required' => 'Sila pilih tarikh sesi',
            'JUMLAH_KESELURUHAN.required' => 'Sila isi jumlah calon',
            'KOD_KATEGORI_PESERTA.required' => 'Sila pilih kumpulan',
            'platform.required' => 'Sila pilih plaform',
            'KOD_KEMENTERIAN.required' => 'Sila pilih jabatan kementerian',
            'LOKASI.required'=>'Sila pilih lokasi',
            'user_id.required'=>'Sila pilih penyelaras',
            'keterangan.required'=>'Sila beri keterangan'
        ];
        Validator::make($request->input(), $rules, $messages)->validate();
        $jadual->save();

        $recipient = $emel_peserta;
        Mail::to($recipient)->send(new JadualKemaskini($jadual));
        return redirect('/jaduals');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($jadual)
    {

        $jadual = Jadual::find($jadual);
        $jadual->delete();
        return redirect('/jaduals');
    }

    // kemaskini status
    public function kemaskini_status(Request $request, $jadual)
    {
        // dd($jadual);
        $jadual = Jadual::where("ID_SESI", $jadual)->first();
        // dd($jadual);
        $jadual->status = $request->status;
        $jadual->keterangan = $request->keterangan;
        $jadual->save();

        $idpenilaian = $jadual->ID_PENILAIAN;
        $list_calon = MohonPenilaian::where('id_sesi', $idpenilaian)->get();
        
        $emel_peserta = [];
        foreach($list_calon as $calon){
            $id_peserta = $calon->id_calon;
            $peserta = Permohanan::where('ID_PESERTA', $id_peserta)->first();
            if($peserta != null){
                $email = $peserta->EMEL_PESERTA;
                $emel_peserta = $email;
            }
        }

        $recipient = $emel_peserta;

        if ($request->status == 'Penangguhan') {
            Mail::to($recipient)->send(new JadualKemaskiniPenangguhan($jadual));
        }else if($request->status == 'Pembatalan'){
            Mail::to($recipient)->send(new JadualKemaskiniPembatalan($jadual));
        }

        return redirect('/jaduals');
    }
}
