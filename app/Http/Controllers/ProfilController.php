<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Permohanan;
use App\Models\Tugas;
use App\Models\Perkhidmatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function kemaskini(Request $request)
    {
        $current_user = $request->user();
        // $group_id = User::where('user_group_id', '=', '5')->get();
        if ($current_user->user_group_id == 5) {
            $user_profils = DB::table('users')
                ->join('pro_peserta', 'users.id', '=', 'pro_peserta.user_id')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', '=', 'pro_tempat_tugas.ID_PESERTA')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', '=', 'pro_perkhidmatan.ID_PESERTA')
                ->select('users.*', 'pro_tempat_tugas.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->get()->first();
        } else {
            $user_profils = $request->user();
        }

        // dd($user_profils);
        return view('profil.index', [
            'user' => $current_user,
            'user_profils' => $user_profils,
        ]);
    }

    public function kemaskiniform(Request $request)
    {
        $user_profils = $request->user();

        if ($user_profils->user_group_id == 5) {
            $user_profils = DB::table('users')
                ->join('pro_peserta', 'users.id', '=', 'pro_peserta.user_id')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', '=', 'pro_tempat_tugas.ID_PESERTA')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', '=', 'pro_perkhidmatan.ID_PESERTA')
                ->select('users.*', 'pro_tempat_tugas.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->get()->first();
        }
        else {
            $user_profils = $request->user();
        }

        // dd($user_profils);

        return view('profil.edit', [
            'user_profils' => $user_profils
        ]);
    }

    public function kemaskiniprofil(Request $request)
    {
        $current_user = $request->user();
        // $user_profils = DB::table('users')
        //     ->join('pro_peserta', 'users.id', '=', 'pro_peserta.user_id')
        //     ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', '=', 'pro_tempat_tugas.ID_PESERTA')
        //     ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', '=', 'pro_perkhidmatan.ID_PESERTA')
        //     ->select('users.*', 'pro_tempat_tugas.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
        //     ->get()->first();

        if ($current_user->user_group_id == 5) {
            $user_profils1 = User::find($request->user()->id);
            // $user_profils1->name = $request->name;
            // $user_profils1->email = $request->email;
            // $user_profils1->ministry_code = $request->ministry_code;
            // $user_profils1->office_number = $request->office_number;
            // $user_profils1->fax_number = $request->fax_number;
            // $user_profils1->telephone_number = $request->telephone_number;
            // $user_profils1->nric = $request->nric;
            // $user_profils1->save();

            // dd($user_profils1->id);
            $user_profils2 = Permohanan::where('user_id', $user_profils1->id)->first();
            $user_profils2->NAMA_PESERTA = $request->NAMA_PESERTA;
            $user_profils2->NO_KAD_PENGENALAN = $request->NO_KAD_PENGENALAN;
            $user_profils2->EMEL_PESERTA = $request->EMEL_PESERTA;
            $user_profils2->NO_TELEFON_BIMBIT = $request->NO_TELEFON_BIMBIT;
            $user_profils2->NO_TELEFON_PEJABAT = $request->NO_TELEFON_PEJABAT;
            $user_profils2->KOD_JANTINA = $request->KOD_JANTINA;
            $user_profils2->TARIKH_LAHIR = $request->TARIKH_LAHIR;
            $user_profils2->ID_PESERTA = $request->ID_PESERTA;
            $user_profils2->save();


            $user_profils3 = Tugas::where('ID_PESERTA', $user_profils2->ID_PESERTA)->first();
            $user_profils3->ALAMAT_1 = $request->ALAMAT_1;
            $user_profils3->ALAMAT_2 = $request->ALAMAT_2;
            $user_profils3->POSKOD = $request->POSKOD;
            $user_profils3->KOD_NEGERI = $request->KOD_NEGERI;
            $user_profils3->KOD_NEGARA = $request->KOD_NEGARA;
            $user_profils3->NAMA_PENYELIA = $request->NAMA_PENYELIA;
            $user_profils3->EMEL_PENYELIA = $request->EMEL_PENYELIA;
            $user_profils3->NO_TELEFON_PENYELIA = $request->NO_TELEFON_PENYELIA;
            $user_profils3->KOD_KEMENTERIAN = $request->KOD_KEMENTERIAN;
            // dd($user_profils3);
            $user_profils3->save();

            $user_profils4 = Perkhidmatan::where('ID_PESERTA', $user_profils2->ID_PESERTA)->first();
            $user_profils4->KOD_KLASIFIKASI_PERKHIDMATAN = $request->KOD_KLASIFIKASI_PERKHIDMATAN;
            $user_profils4->TARIKH_LANTIKAN = $request->TARIKH_LANTIKAN;
            $user_profils4->KOD_GELARAN_JAWATAN = $request->KOD_GELARAN_JAWATAN;
            $user_profils4->KOD_TARAF_PERJAWATAN = $request->KOD_TARAF_PERJAWATAN;
            $user_profils4->save();

            // $user_profils->NAMA_PESERTA = $request->NAMA_PESERTA;
            // $user_profils->save();
        } else {
            $user_profils = User::find($request->user()->id);
            $user_profils->name = $request->name;
            $user_profils->email = $request->email;
            $user_profils->nric = $request->nric;
            $user_profils->ministry_code = $request->ministry_code;
            $user_profils->office_number = $request->office_number;
            // $user_profils->fax_number = $request->fax_number;
            $user_profils->telephone_number = $request->telephone_number;
            $user_profils->save();
        }
        // dd($user_profils);
        return redirect('/profil');
    }

    public function edit($profil)
    {

        return view('profil.edit');
    }
}
