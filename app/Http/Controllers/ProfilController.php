<?php

namespace App\Http\Controllers;

use App\Models\MohonPenilaian;
use App\Models\User;
use App\Models\Permohanan;
use App\Models\Tugas;
use App\Models\Perkhidmatan;
use App\Models\Refgeneral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function kemaskini(Request $request)
    {
        $checkid2 = Auth::user()->nric;
        $current_user = Auth::user()->user_group_id;
        $check = Role::where('id', $current_user)->first();
        $role = $check->name;

        if ($role == 'calon') {
            $user_profils = User::where('nric', '=', $checkid2)
                ->join('pro_peserta', 'users.nric', '=', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', '=', 'pro_tempat_tugas.ID_PESERTA')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', '=', 'pro_perkhidmatan.ID_PESERTA')
                ->select('users.*', 'pro_tempat_tugas.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->get()->first();
        } else {
            $user_profils = Auth::user();
        }
        // dd(($user_profils));
        return view('profil.index', [
            'current_user' => $current_user,
            'user_profils' => $user_profils,
        ]);
    }

    public function kemaskiniform(Request $request)
    {
        $current_user = Auth::user()->user_group_id;
        $current_user = Role::where('id', $current_user)->first();
        $checkid2 = Auth::user()->nric;
        $gelaran_user = Refgeneral::where('MASTERCODE', 10009)
            ->join('pro_peserta', 'refgeneral.REFERENCECODE', 'pro_peserta.KOD_GELARAN')
            ->select('refgeneral.MASTERCODE', 'refgeneral.REFERENCECODE', 'refgeneral.DESCRIPTION1', 'pro_peserta.KOD_GELARAN')
            ->where('pro_peserta.user_id', $checkid2)
            ->get()->first();
        // dd($gelaran_user);
        $kod_gelaran = Refgeneral::where('MASTERCODE', 10009)->orderBy('DESCRIPTION1', 'asc')
            ->get();

        $peringkat = Refgeneral::where('MASTERCODE', 10023)->orderBy('DESCRIPTION1', 'asc')->get();

        $klasifikasi_perkhidmatan = Refgeneral::where('MASTERCODE', 10024)->orderBy('DESCRIPTION1', 'asc')->get();

        $gred_jawatan = Refgeneral::where('MASTERCODE', 10025)->orderBy('DESCRIPTION1', 'asc')->get();

        $taraf_perjawatan = Refgeneral::where('MASTERCODE', 10026)->orderBy('DESCRIPTION1', 'asc')->get();

        $jenis_perkhidmatan = Refgeneral::where('MASTERCODE', 10027)->orderBy('DESCRIPTION1', 'asc')->get();

        $kementerian = Refgeneral::where('MASTERCODE', 10028)->orderBy('DESCRIPTION1', 'asc')->get();

        $negeri = Refgeneral::where('MASTERCODE', 10021)->orderBy('DESCRIPTION1', 'asc')->get();

        $jabatan = Refgeneral::where('MASTERCODE', 10029)->orderBy('DESCRIPTION1', 'asc')->get();

        if ($current_user->name == 'calon') {
            $user_profils = User::where('nric', '=', $checkid2)
                ->join('pro_peserta', 'users.id', '=', 'pro_peserta.user_id')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', '=', 'pro_tempat_tugas.ID_PESERTA')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', '=', 'pro_perkhidmatan.ID_PESERTA')
                ->select('users.*', 'pro_tempat_tugas.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->get()->first();
        } else {
            $user_profils = $request->user();
        }

        // dd($klasifikasi_perkhidmatan);

        return view('profil.edit', [
            'user_profils' => $user_profils,
            'current_user' => $current_user,
            'kod_gelarans' => $kod_gelaran,
            'gelaran_user' => $gelaran_user,
            'peringkats' => $peringkat,
            'klasifikasi_perkhidmatans' => $klasifikasi_perkhidmatan,
            'gred_jawatans' => $gred_jawatan,
            'taraf_perjawatans' => $taraf_perjawatan,
            'jenis_perkhidmatans' => $jenis_perkhidmatan,
            'kementerians' => $kementerian,
            'negeris' => $negeri,
            'jabatans' => $jabatan,
        ]);
    }

    public function kemaskiniprofil(Request $request, $id)
    {
        $current_user = Auth::user();

        if ($current_user->user_group_id == 5) {
            // $user_profils1 = User::where('id',$id)->first();
            $user_profils1 = User::find($id);
            $permohonan = MohonPenilaian::where('no_ic', $user_profils1->nric)->latest()->first();
            $user_profils1->name = strtoupper($request->NAMA_PESERTA);
            $user_profils1->email = $request->EMEL_PESERTA;
            $user_profils1->nric = $request->NO_KAD_PENGENALAN;

            $user_profils2 = Permohanan::where('user_id', $user_profils1->id)->first();
            $user_profils2->NAMA_PESERTA = strtoupper($request->NAMA_PESERTA);
            $user_profils2->NO_KAD_PENGENALAN = $request->NO_KAD_PENGENALAN;
            $user_profils2->EMEL_PESERTA = $request->EMEL_PESERTA;
            $user_profils2->NO_TELEFON_BIMBIT = $request->NO_TELEFON_BIMBIT;
            $user_profils2->NO_TELEFON_PEJABAT = $request->NO_TELEFON_PEJABAT;
            $user_profils2->KOD_JANTINA = $request->KOD_JANTINA;
            $user_profils2->TARIKH_LAHIR = $request->TARIKH_LAHIR;
            // $user_profils2->ID_PESERTA = $request->ID_PESERTA;
            $user_profils2->KOD_GELARAN = $request->KOD_GELARAN;

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
            $user_profils3->KOD_JABATAN = $request->KOD_JABATAN;
            $user_profils3->GELARAN_KETUA_JABATAN = strtoupper($request->GELARAN_KETUA_JABATAN);
            $user_profils3->BAHAGIAN = $request->BAHAGIAN;
            $user_profils3->BANDAR = $request->BANDAR;
            $user_profils3->ID_PESERTA = $user_profils2->ID_PESERTA;
            // dd($user_profils3);

            $user_profils4 = Perkhidmatan::where('ID_PESERTA', $user_profils2->ID_PESERTA)->first();
            $user_profils4->KOD_KLASIFIKASI_PERKHIDMATAN = $request->KOD_KLASIFIKASI_PERKHIDMATAN;
            $user_profils4->TARIKH_LANTIKAN = $request->TARIKH_LANTIKAN;
            $user_profils4->KOD_GELARAN_JAWATAN = $request->KOD_GELARAN_JAWATAN;
            $user_profils4->KOD_TARAF_PERJAWATAN = $request->KOD_TARAF_PERJAWATAN;
            $user_profils4->KOD_PERINGKAT = $request->KOD_PERINGKAT;
            $user_profils4->KOD_JENIS_PERKHIDMATAN = $request->KOD_JENIS_PERKHIDMATAN;
            $user_profils4->KOD_GRED_JAWATAN = $request->KOD_GRED_JAWATAN;
            $user_profils4->ID_PESERTA = $user_profils2->ID_PESERTA;

            if (!empty($permohonan)) {
                $permohonan->id_calon = $user_profils2->ID_PESERTA;
                $permohonan->no_ic = $request->NO_KAD_PENGENALAN;
                $permohonan->nama = strtoupper($request->NAMA_PESERTA);
                $permohonan->tarikh_lahir = $request->TARIKH_LAHIR;
                if ($request->KOD_JANTINA == '01') {
                    $jantina = 'Lelaki';
                } else {
                    $jantina = 'Perempuan';
                }
                $permohonan->jantina = $jantina;
                $permohonan->jawatan_ketua_jabatan = $request->GELARAN_KETUA_JABATAN;
                $permohonan->taraf_jawatan = $request->KOD_TARAF_PERJAWATAN;
                $permohonan->tarikh_lantikan = $request->TARIKH_LANTIKAN;
                $permohonan->klasifikasi_perkhidmatan = $request->KOD_KLASIFIKASI_PERKHIDMATAN;
                $permohonan->no_telefon_pejabat = $request->NO_TELEFON_PEJABAT;
                $permohonan->alamat1_pejabat = $request->ALAMAT_1;
                $permohonan->alamat2_pejabat = $request->ALAMAT_2;
                $permohonan->poskod_pejabat = $request->POSKOD;
                $permohonan->nama_penyelia = $request->NAMA_PENYELIA;
                $permohonan->emel_penyelia = $request->EMEL_PENYELIA;
                $permohonan->no_telefon_penyelia = $request->NO_TELEFON_PENYELIA;
                // dd($permohonan);
                $permohonan->save();
            }
            // dd($user_profils1, $user_profils2, $user_profils3, $user_profils4);
            $user_profils1->save();
            $user_profils2->save();
            $user_profils3->save();
            $user_profils4->save();
        } else {
            $user_profils = User::find($request->user()->id);
            $user_profils->name = strtoupper($request->name);
            $user_profils->email = $request->email;
            $user_profils->nric = $request->nric;
            $user_profils->ministry_code = $request->ministry_code;
            $user_profils->office_number = $request->office_number;
            // $user_profils->fax_number = $request->fax_number;
            $user_profils->telephone_number = $request->telephone_number;
            $user_profils->save();
        }
        return redirect('/profil');
    }

    public function edit($profil)
    {

        return view('profil.edit');
    }
}
