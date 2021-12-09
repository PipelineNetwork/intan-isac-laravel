<?php

namespace App\Http\Controllers;

use App\Models\Banksoalanpengetahuan;
use App\Models\PemilihanSoalan;
use App\Models\PemilihanSoalanKumpulan;
use App\Models\Refgeneral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        return view('bank_soalan.soalan_pengetahuan.index', [
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
        // $banksoalanpengetahuan->knowledge_area = $request->knowledge_area;
        // $banksoalanpengetahuan->topik_soalan = $request->topik_soalan;
        // $banksoalanpengetahuan->penyataan_soalan = $request->penyataan_soalan;
        // $banksoalanpengetahuan->id_status_soalan = $request->id_status_soalan;
        // $banksoalanpengetahuan->pilihan_jawapan = $request->pilihan_jawapan;
        if (!empty($request->pilihan_jawapan1)) {
            $banksoalanpengetahuan->pilihan_jawapan1 = $request->pilihan_jawapan1;
        }
        if (!empty($request->pilihan_jawapan2)) {
            $banksoalanpengetahuan->pilihan_jawapan2 = $request->pilihan_jawapan2;
        }
        if (!empty($request->pilihan_jawapan3)) {
            $banksoalanpengetahuan->pilihan_jawapan3 = $request->pilihan_jawapan3;
        }
        if (!empty($request->pilihan_jawapan4)) {
            $banksoalanpengetahuan->pilihan_jawapan4 = $request->pilihan_jawapan4;
        }
        // $banksoalanpengetahuan->jawapan = $request->jawapan;
        // if (!empty($request->file('muat_naik_fail'))) {
        //     $muat_naik_fail = $request->file('muat_naik_fail')->store('soalan');
        //     $banksoalanpengetahuan->muat_naik_fail = $muat_naik_fail;
        // }

        // dd($banksoalanpengetahuan);
        $banksoalanpengetahuan->save();

        if ($request->jenis_soalan == 'fill_in_the_blank') {
            return view('bank_soalan.soalan_pengetahuan.fill_in_the_blank', [
                'banksoalanpengetahuan' => $banksoalanpengetahuan,
            ]);
        } elseif ($request->jenis_soalan == 'multiple_choice') {
            return view('bank_soalan.soalan_pengetahuan.multiple_choice', [
                'banksoalanpengetahuan' => $banksoalanpengetahuan,
            ]);
        } elseif ($request->jenis_soalan == 'ranking') {
            return view('bank_soalan.soalan_pengetahuan.ranking', [
                'banksoalanpengetahuan' => $banksoalanpengetahuan,
            ]);
        } elseif ($request->jenis_soalan == 'single_choice') {
            return view('bank_soalan.soalan_pengetahuan.single_choice', [
                'banksoalanpengetahuan' => $banksoalanpengetahuan,
            ]);
        } elseif ($request->jenis_soalan == 'true_or_false') {
            return view('bank_soalan.soalan_pengetahuan.true_or_false', [
                'banksoalanpengetahuan' => $banksoalanpengetahuan,
            ]);
        } else {
            return view('bank_soalan.soalan_pengetahuan.subjective', [
                'banksoalanpengetahuan' => $banksoalanpengetahuan,
            ]);
        }
        // return redirect('/bank-soalan-pengetahuan');

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
    public function destroy($banksoalanpengetahuan)
    {
        $banksoalanpengetahuan = Banksoalanpengetahuan::find($banksoalanpengetahuan);

        $banksoalanpengetahuan->delete();

        return redirect('/bank-soalan-pengetahuan')->with('success', 'Berjaya dihapus!');
    }

    public function fillblank(Request $request, $id)
    {
        $banksoalanpengetahuan = Banksoalanpengetahuan::find($id);

        $banksoalanpengetahuan->knowledge_area = $request->knowledge_area;
        $banksoalanpengetahuan->topik_soalan = $request->topik_soalan;
        $banksoalanpengetahuan->penyataan_soalan = $request->penyataan_soalan;
        $banksoalanpengetahuan->id_status_soalan = $request->id_status_soalan;
        $banksoalanpengetahuan->pilihan_jawapan = $request->pilihan_jawapan;
        if (!empty($request->pilihan_jawapan1)) {
            $banksoalanpengetahuan->pilihan_jawapan1 = $request->pilihan_jawapan1;
        }
        if (!empty($request->pilihan_jawapan2)) {
            $banksoalanpengetahuan->pilihan_jawapan2 = $request->pilihan_jawapan2;
        }
        if (!empty($request->pilihan_jawapan3)) {
            $banksoalanpengetahuan->pilihan_jawapan3 = $request->pilihan_jawapan3;
        }
        if (!empty($request->pilihan_jawapan4)) {
            $banksoalanpengetahuan->pilihan_jawapan4 = $request->pilihan_jawapan4;
        }
        if (!empty($request->jawapan)) {
            $banksoalanpengetahuan->jawapan = $request->jawapan;
        }
        if (!empty($request->jawapan1)) {
            $banksoalanpengetahuan->jawapan1 = $request->jawapan1;
        }
        if (!empty($request->jawapan2)) {
            $banksoalanpengetahuan->jawapan2 = $request->jawapan2;
        }
        if (!empty($request->jawapan3)) {
            $banksoalanpengetahuan->jawapan3 = $request->jawapan3;
        }
        if (!empty($request->jawapan4)) {
            $banksoalanpengetahuan->jawapan4 = $request->jawapan4;
        }
        $banksoalanpengetahuan->soalan = $request->soalan;
        if (!empty($request->file('muat_naik_fail'))) {
            $muat_naik_fail = $request->file('muat_naik_fail')->store('soalan');
            $banksoalanpengetahuan->muat_naik_fail = $muat_naik_fail;
        }

        // dd($banksoalanpengetahuan);
        $banksoalanpengetahuan->save();

        return redirect('/bank-soalan-pengetahuan');
    }

    public function multiplechoice(Request $request)
    {
        $banksoalanpengetahuan = Banksoalanpengetahuan::find($request->id);

        $banksoalanpengetahuan->knowledge_area = $request->knowledge_area;
        $banksoalanpengetahuan->topik_soalan = $request->topik_soalan;
        $banksoalanpengetahuan->penyataan_soalan = $request->penyataan_soalan;
        $banksoalanpengetahuan->id_status_soalan = $request->id_status_soalan;
        $banksoalanpengetahuan->pilihan_jawapan = $request->pilihan_jawapan;
        if (!empty($request->pilihan_jawapan1)) {
            $banksoalanpengetahuan->pilihan_jawapan1 = $request->pilihan_jawapan1;
        }
        if (!empty($request->pilihan_jawapan2)) {
            $banksoalanpengetahuan->pilihan_jawapan2 = $request->pilihan_jawapan2;
        }
        if (!empty($request->pilihan_jawapan3)) {
            $banksoalanpengetahuan->pilihan_jawapan3 = $request->pilihan_jawapan3;
        }
        if (!empty($request->pilihan_jawapan4)) {
            $banksoalanpengetahuan->pilihan_jawapan4 = $request->pilihan_jawapan4;
        }
        if (!empty($request->jawapan)) {
            $banksoalanpengetahuan->jawapan = $request->pilihan_jawapan;
        }
        if (!empty($request->jawapan1)) {
            $banksoalanpengetahuan->jawapan1 = $request->pilihan_jawapan1;
        }
        if (!empty($request->jawapan2)) {
            $banksoalanpengetahuan->jawapan2 = $request->pilihan_jawapan2;
        }
        if (!empty($request->jawapan3)) {
            $banksoalanpengetahuan->jawapan3 = $request->pilihan_jawapan3;
        }
        if (!empty($request->jawapan4)) {
            $banksoalanpengetahuan->jawapan4 = $request->pilihan_jawapan4;
        }
        $banksoalanpengetahuan->soalan = $request->soalan;
        if (!empty($request->file('muat_naik_fail'))) {
            $muat_naik_fail = $request->file('muat_naik_fail')->store('soalan');
            $banksoalanpengetahuan->muat_naik_fail = $muat_naik_fail;
        }

        // dd($banksoalanpengetahuan);
        $banksoalanpengetahuan->save();

        return redirect('/bank-soalan-pengetahuan');
    }

    public function ranking(Request $request)
    {
        $banksoalanpengetahuan = Banksoalanpengetahuan::find($request->id);

        $banksoalanpengetahuan->knowledge_area = $request->knowledge_area;
        $banksoalanpengetahuan->topik_soalan = $request->topik_soalan;
        $banksoalanpengetahuan->penyataan_soalan = $request->penyataan_soalan;
        $banksoalanpengetahuan->id_status_soalan = $request->id_status_soalan;
        $banksoalanpengetahuan->pilihan_jawapan = $request->pilihan_jawapan;
        if (!empty($request->pilihan_jawapan1)) {
            $banksoalanpengetahuan->pilihan_jawapan1 = $request->pilihan_jawapan1;
        }
        if (!empty($request->pilihan_jawapan2)) {
            $banksoalanpengetahuan->pilihan_jawapan2 = $request->pilihan_jawapan2;
        }
        if (!empty($request->pilihan_jawapan3)) {
            $banksoalanpengetahuan->pilihan_jawapan3 = $request->pilihan_jawapan3;
        }
        if (!empty($request->pilihan_jawapan4)) {
            $banksoalanpengetahuan->pilihan_jawapan4 = $request->pilihan_jawapan4;
        }
        $upper = strtoupper($request->jawapan);
        $banksoalanpengetahuan->jawapan = $upper;
        $banksoalanpengetahuan->soalan = $request->soalan;
        if (!empty($request->file('muat_naik_fail'))) {
            $muat_naik_fail = $request->file('muat_naik_fail')->store('soalan');
            $banksoalanpengetahuan->muat_naik_fail = $muat_naik_fail;
        }

        // dd($banksoalanpengetahuan);
        $banksoalanpengetahuan->save();

        return redirect('/bank-soalan-pengetahuan');
    }

    public function singlechoice(Request $request)
    {
        $banksoalanpengetahuan = Banksoalanpengetahuan::find($request->id);

        $banksoalanpengetahuan->knowledge_area = $request->knowledge_area;
        $banksoalanpengetahuan->topik_soalan = $request->topik_soalan;
        $banksoalanpengetahuan->penyataan_soalan = $request->penyataan_soalan;
        $banksoalanpengetahuan->id_status_soalan = $request->id_status_soalan;
        $banksoalanpengetahuan->pilihan_jawapan = $request->pilihan_jawapan;
        if (!empty($request->pilihan_jawapan1)) {
            $banksoalanpengetahuan->pilihan_jawapan1 = $request->pilihan_jawapan1;
        }
        if (!empty($request->pilihan_jawapan2)) {
            $banksoalanpengetahuan->pilihan_jawapan2 = $request->pilihan_jawapan2;
        }
        if (!empty($request->pilihan_jawapan3)) {
            $banksoalanpengetahuan->pilihan_jawapan3 = $request->pilihan_jawapan3;
        }
        if (!empty($request->pilihan_jawapan4)) {
            $banksoalanpengetahuan->pilihan_jawapan4 = $request->pilihan_jawapan4;
        }
        if (!empty($request->jawapan)) {
            $banksoalanpengetahuan->jawapan = $request->pilihan_jawapan;
        } elseif (!empty($request->jawapan1)) {
            $banksoalanpengetahuan->jawapan = $request->pilihan_jawapan1;
        } elseif (!empty($request->jawapan2)) {
            $banksoalanpengetahuan->jawapan = $request->pilihan_jawapan2;
        } elseif (!empty($request->jawapan3)) {
            $banksoalanpengetahuan->jawapan = $request->pilihan_jawapan3;
        } else {
            $banksoalanpengetahuan->jawapan = $request->pilihan_jawapan4;
        }
        $banksoalanpengetahuan->soalan = $request->soalan;
        if (!empty($request->file('muat_naik_fail'))) {
            $muat_naik_fail = $request->file('muat_naik_fail')->store('soalan');
            $banksoalanpengetahuan->muat_naik_fail = $muat_naik_fail;
        }

        // dd($banksoalanpengetahuan);
        $banksoalanpengetahuan->save();

        return redirect('/bank-soalan-pengetahuan');
    }

    public function truefalse(Request $request)
    {
        $banksoalanpengetahuan = Banksoalanpengetahuan::find($request->id);

        $banksoalanpengetahuan->knowledge_area = $request->knowledge_area;
        $banksoalanpengetahuan->topik_soalan = $request->topik_soalan;
        $banksoalanpengetahuan->penyataan_soalan = $request->penyataan_soalan;
        $banksoalanpengetahuan->id_status_soalan = $request->id_status_soalan;
        // $banksoalanpengetahuan->pilihan_jawapan = $request->pilihan_jawapan;
        // if (!empty($request->pilihan_jawapan1)) {
        //     $banksoalanpengetahuan->pilihan_jawapan1 = $request->pilihan_jawapan1;
        // }
        // if (!empty($request->pilihan_jawapan2)) {
        //     $banksoalanpengetahuan->pilihan_jawapan2 = $request->pilihan_jawapan2;
        // }
        // if (!empty($request->pilihan_jawapan3)) {
        //     $banksoalanpengetahuan->pilihan_jawapan3 = $request->pilihan_jawapan3;
        // }
        // if (!empty($request->pilihan_jawapan4)) {
        //     $banksoalanpengetahuan->pilihan_jawapan4 = $request->pilihan_jawapan4;
        // }
        $banksoalanpengetahuan->jawapan = $request->jawapan;
        if (!empty($request->jawapan1)) {
            $banksoalanpengetahuan->jawapan1 = $request->jawapan1;
        }
        if (!empty($request->jawapan2)) {
            $banksoalanpengetahuan->jawapan2 = $request->jawapan2;
        }
        if (!empty($request->jawapan3)) {
            $banksoalanpengetahuan->jawapan3 = $request->jawapan3;
        }
        if (!empty($request->jawapan4)) {
            $banksoalanpengetahuan->jawapan4 = $request->jawapan4;
        }
        $banksoalanpengetahuan->soalan = $request->soalan;
        if (!empty($request->file('muat_naik_fail'))) {
            $muat_naik_fail = $request->file('muat_naik_fail')->store('soalan');
            $banksoalanpengetahuan->muat_naik_fail = $muat_naik_fail;
        }

        // dd($banksoalanpengetahuan);
        $banksoalanpengetahuan->save();

        return redirect('/bank-soalan-pengetahuan');
    }

    public function subjective(Request $request)
    {
        $banksoalanpengetahuan = Banksoalanpengetahuan::find($request->id);
        $banksoalanpengetahuan->knowledge_area = $request->knowledge_area;
        $banksoalanpengetahuan->topik_soalan = $request->topik_soalan;
        $banksoalanpengetahuan->penyataan_soalan = $request->penyataan_soalan;
        $banksoalanpengetahuan->id_status_soalan = $request->id_status_soalan;
        $banksoalanpengetahuan->soalan = $request->soalan;

        // $alljawapan = $alljawapan->whereJsonContains('id', [['id' => $banksoalanpengetahuan->id]]);
        // $pilihan_jawapan = [];
        // foreach($request->pilihan_jawapan as $p){
        //     $pilihan_jawapan[] = ['jawapan' => $p];    
        // }
        $banksoalanpengetahuan->pilihan_jawapan = $request->pilihan_jawapan;
        if (!empty($request->pilihan_jawapan1)) {
            $banksoalanpengetahuan->pilihan_jawapan1 = $request->pilihan_jawapan1;
        }
        if (!empty($request->pilihan_jawapan2)) {
            $banksoalanpengetahuan->pilihan_jawapan2 = $request->pilihan_jawapan2;
        }
        if (!empty($request->pilihan_jawapan3)) {
            $banksoalanpengetahuan->pilihan_jawapan3 = $request->pilihan_jawapan3;
        }
        if (!empty($request->pilihan_jawapan4)) {
            $banksoalanpengetahuan->pilihan_jawapan4 = $request->pilihan_jawapan4;
        }
        if (!empty($request->pilihan_jawapan1)) {
            $banksoalanpengetahuan->pilihan_jawapan1 = $request->pilihan_jawapan1;
        }
        if (!empty($request->pilihan_jawapan2)) {
            $banksoalanpengetahuan->pilihan_jawapan2 = $request->pilihan_jawapan2;
        }
        if (!empty($request->pilihan_jawapan3)) {
            $banksoalanpengetahuan->pilihan_jawapan3 = $request->pilihan_jawapan3;
        }
        if (!empty($request->pilihan_jawapan4)) {
            $banksoalanpengetahuan->pilihan_jawapan4 = $request->pilihan_jawapan4;
        }

        // $banksoalanpengetahuan->jawapan = $request->jawapan;
        if (!empty($request->file('muat_naik_fail'))) {
            $muat_naik_fail = $request->file('muat_naik_fail')->store('soalan');
            $banksoalanpengetahuan->muat_naik_fail = $muat_naik_fail;
        }

        // dd($banksoalanpengetahuan);
        $banksoalanpengetahuan->save();

        return redirect('/bank-soalan-pengetahuan');

        // $allTickets = $allTickets->whereJsonContains('cf_id',[['id'=>$fac->id]]);

        // $CF_Id[] =['id'=>$fac->id,'name'=>$fac->name];

        // $soalan->jawapan = $CF_Id;
    }
    public function pemilihan(Request $request){
        $pemilihan = PemilihanSoalan::all();
        

        return view('bank_soalan.soalan_pengetahuan.pemilihan_soalan.pemilihan_soalan',[
            'pemilihan'=>$pemilihan
        ]);
    }

    public function kemaskini($id){
        $kemaskini = PemilihanSoalan::where('ID_PEMILIHAN_SOALAN', $id)->first();
        $pilihan = PemilihanSoalanKumpulan::where('ID_PEMILIHAN_SOALAN', $id)->get();
        $kategori = Refgeneral::where('MASTERCODE', 10033)
        ->get();

        return view('bank_soalan.soalan_pengetahuan.pemilihan_soalan.kemaskini_soalan',[
            'kemaskini'=>$kemaskini,
            'pilihan'=>$pilihan,
            'kategori'=>$kategori
        ]);
    }

    public function simpan(Request $request, $id){
        // dd($request);
        $main = PemilihanSoalan::where('ID_PEMILIHAN_SOALAN', $id)->first();
        $user = Auth::id();

        $main->ID_PENGGUNA = $user;
        $main->JUMLAH_KESELURUHAN_SOALAN = $request->JUMLAH_KESELURUHAN_SOALAN;
        $main->NILAI_JUMLAH_MARKAH = $request->NILAI_JUMLAH_MARKAH;
        $main->NILAI_MARKAH_LULUS = $request->NILAI_MARKAH_LULUS;
        $main->save();

        for($i=1; $i<15; $i++){
            $check = 'field'.$i;
            $check1 = $request->$check;
            if($check1 == null){
                $i=15;
            }else{
                $tahap = 'id_tahap_soalan'.$i;
                $kategori = 'id_kategori_pengetahuan'.$i;
                $jumlah = 'NILAI_JUMLAH_SOALAN'.$i;
                $sub = PemilihanSoalanKumpulan::where('ID_PEMILIHAN_SOALAN_KUMPULAN', $request->$check)->first();
                $sub->KOD_TAHAP_SOALAN = $request->$tahap;
                $sub->KOD_KATEGORI_SOALAN = $request->$kategori;
                $sub->NILAI_JUMLAH_SOALAN = $request->$jumlah;

                $sub->save();
            }
        }

        return redirect('/pengurusan_penilaian/pemilihan_soalan_pengetahuan');
        // $sub = PemilihanSoalanKumpulan::where()
    }
}
