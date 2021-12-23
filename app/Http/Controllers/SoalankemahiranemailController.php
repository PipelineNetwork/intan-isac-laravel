<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bankjawapancalon;
use App\Models\Soalankemahiranemail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SoalankemahiranemailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_penilaian)
    {
        $jawapancalon = Bankjawapancalon::all();

        $soalankemahiranemail = Soalankemahiranemail::where('status_soalan', 1)->inRandomOrder()->limit(1)->get();

        $id_penilaian = $id_penilaian;
        return view('proses_penilaian.soalan_kemahiran.email', [
            'jawapancalons' => $jawapancalon,
            'soalankemahiranemails' => $soalankemahiranemail,
            'id_penilaian' => $id_penilaian
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('proses_penilaian.soalan_kemahiran.email1');
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
    public function show(Request $request, $id_penilaian, $id_emel)
    {
        $soalankemahiranemail = Soalankemahiranemail::where('id', $id_emel)->get()->first();

        $current_user = $request->user();
        $markah_internet = Bankjawapancalon::where('user_id', $current_user->id)->where('id_soalankemahiraninternet', '!=', null)->select(DB::raw('markah_urlteks + markah_carianteks as total'))->latest('created_at')->get()->first();
        $markah_word = Bankjawapancalon::where('user_id', $current_user->id)->where('id_soalankemahiranword', '!=', null)->select('jumlah_markah_word')->latest('created_at')->get()->first();
        // dd($markah_internet);
        $id_penilaian = $id_penilaian;
        return view('proses_penilaian.soalan_kemahiran.email1', [
            'soalankemahiranemails' => $soalankemahiranemail,
            'markah_internets' => $markah_internet,
            'markah_words' => $markah_word,
            'id_penilaian' => $id_penilaian
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

    public function savepage1(Request $request, $id_penilaian, $id_emel)
    {

        $current_user = $request->user();

        $jawapancalon = new Bankjawapancalon();

        $jawapancalon->input_to = $request->input_to;
        if ($request->input_to != null) {
            $jawapancalon->markah_inputto = 1;
        } else {
            $jawapancalon->markah_inputto = 0;
        }
        $jawapancalon->input_subject = $request->input_subject;
        if ($request->input_subject != null) {
            $jawapancalon->markah_inputsubject = 1;
        } else {
            $jawapancalon->markah_inputsubject = 0;
        }
        $jawapancalon->input_mesej = $request->input_mesej;
        if ($request->input_mesej != null) {
            $jawapancalon->markah_inputmesej = 1;
        } else {
            $jawapancalon->markah_inputmesej = 0;
        }
        $jawapancalon->id_soalankemahiranemail = $request->id_soalankemahiranemail;
        $jawapancalon->user_id = $current_user->id;
        if (!empty($request->file('fail_upload'))) {
            $muat_naik_fail = $request->file('fail_upload')->store('jawapancalon');
            $jawapancalon->fail_upload = $muat_naik_fail;
        }
        if (!empty($request->file('fail_upload'))) {
            $jawapancalon->markah_failupload = 1;
        } else {
            $jawapancalon->markah_failupload = 0;
        }

        $jawapancalon->jumlah_markah_internet = (int)$request->markah_internet;

        $jawapancalon->jumlah_markah_word = (int)$request->markah_word;

        $jawapancalon->jumlah_markah_email = $jawapancalon->markah_inputto + $jawapancalon->markah_inputsubject + $jawapancalon->markah_inputmesej + $jawapancalon->markah_failupload;

        $jawapancalon->markah_kemahiran = $jawapancalon->jumlah_markah_internet + $jawapancalon->jumlah_markah_word + $jawapancalon->jumlah_markah_email;

        $jawapancalon->id_penilaian = $id_penilaian;
        $jawapancalon->ic_calon = Auth::user()->nric;
        // dd($jawapancalon);

        $jawapancalon->save();

        return redirect('/soalan-kemahiran-email-page2/'.$id_penilaian);
    }

    public function test($id_penilaian){
        
        return view('proses_penilaian.soalan_kemahiran.email2',[
            'id_penilaian'=>$id_penilaian
        ]);
    }
}
