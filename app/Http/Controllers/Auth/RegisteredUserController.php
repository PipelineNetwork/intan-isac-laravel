<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Hrmis\GetDataXMLbyIC;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Permohanan;
use App\Models\Tugas;
use App\Models\Perkhidmatan;
use App\Models\Refgeneral;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Mail\PenggunaDidaftar;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    // public function create()
    // {
    //     return view('auth.register');
    // }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $check_email = User::where('email', $request->email)->first();

        // if ($check_email != null) {
        //     echo '<script language="javascript">';
        //     echo 'alert("E-mel yang dimasukkan telah wujud.");';
        //     echo "window.location.href='/authenticate-ic';";
        //     echo '</script>';
        // } else {
        $request->validate([
            'nric' => 'required|string|max:255|unique:users',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = new User();

        $user->name = strtoupper($request->name);
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->nric = $request->nric;
        $user->user_group_id = 5;
        $user->assignRole('calon');

        $peserta = new Permohanan();

        $peserta->KOD_GELARAN = $request->KOD_GELARAN;
        $peserta->NAMA_PESERTA = strtoupper($request->name);
        $peserta->TARIKH_LAHIR = substr($request->TARIKH_LAHIR, 0, 10);
        $peserta->KOD_JANTINA = $request->KOD_JANTINA;
        $peserta->EMEL_PESERTA = $request->email;
        $peserta->KOD_KATEGORI_PESERTA = '01';
        $peserta->NO_KAD_PENGENALAN = $request->nric;
        $peserta->NO_TELEFON_BIMBIT = $request->NO_TELEFON_BIMBIT;
        $peserta->NO_TELEFON_PEJABAT = $request->NO_TELEFON_PEJABAT;
        $peserta->user_id = $user->id;

        $tempat_tugas = new Tugas();

        $tempat_tugas->ID_PESERTA = $peserta->ID_PESERTA;
        $tempat_tugas->GELARAN_KETUA_JABATAN = $request->GELARAN_KETUA_JABATAN;
        $tempat_tugas->KOD_KEMENTERIAN = $request->KOD_KEMENTERIAN;
        $tempat_tugas->KOD_JABATAN = $request->KOD_JABATAN;
        $tempat_tugas->BAHAGIAN = $request->BAHAGIAN;
        $tempat_tugas->ALAMAT_1 = $request->ALAMAT_1;
        $tempat_tugas->ALAMAT_2 = $request->ALAMAT_2;
        $tempat_tugas->POSKOD = $request->POSKOD;
        $tempat_tugas->BANDAR = $request->BANDAR;
        $tempat_tugas->KOD_NEGERI = $request->KOD_NEGERI;
        $tempat_tugas->KOD_NEGARA = $request->KOD_NEGARA;
        $tempat_tugas->NAMA_PENYELIA = strtoupper($request->NAMA_PENYELIA);
        $tempat_tugas->EMEL_PENYELIA = $request->EMEL_PENYELIA;
        $tempat_tugas->NO_TELEFON_PENYELIA = $request->NO_TELEFON_PENYELIA;
        $tempat_tugas->NO_FAX_PENYELIA = $request->NO_FAX_PENYELIA;

        $perkhidmatan = new Perkhidmatan();

        $perkhidmatan->ID_PESERTA = $peserta->ID_PESERTA;
        $perkhidmatan->KOD_GELARAN_JAWATAN = $request->KOD_GELARAN_JAWATAN;
        $perkhidmatan->KOD_PERINGKAT = $request->KOD_PERINGKAT;
        $perkhidmatan->KOD_KLASIFIKASI_PERKHIDMATAN = $request->KOD_KLASIFIKASI_PERKHIDMATAN;
        $perkhidmatan->KOD_GRED_JAWATAN = $request->KOD_GRED_JAWATAN;
        $perkhidmatan->KOD_TARAF_PERJAWATAN = $request->KOD_TARAF_PERJAWATAN;
        $perkhidmatan->KOD_JENIS_PERKHIDMATAN = $request->KOD_JENIS_PERKHIDMATAN;
        $perkhidmatan->TARIKH_LANTIKAN = $request->TARIKH_LANTIKAN;

        $user->save();
        $peserta->save();
        $tempat_tugas->save();
        $perkhidmatan->save();
        Mail::to($user->email)->send(new PenggunaDidaftar($user));
        // Mail::to('whoone3@gmail.com')->send(new PenggunaDidaftar($user));

        event(new Registered($user));
        // Auth::login($user);

        // dd($user);
        // return redirect('/profil')->with('success', 'Berjaya didaftarkan!');
        // return redirect(RouteServiceProvider::HOME);
        return redirect('/');
        // }
    }

    public function view_check_ic(Request $request)
    {
        return view('auth.semak_kad_pengenalan');
    }

    public function check_ic(Request $request)
    {
        // dd($request);
        // $request->validate([
        //     'nric' => 'required|string|max:255|unique:users',
        // ]);

        $checkic = User::where('nric', $request->nric)->first();
        if ($checkic != null) {
            // alert()->error('Maaf, No. Kad Pengenalan yang dimasukkan telah digunakan. Sila masukkan nombor kad pengenalan semula', 'Pendaftaran Gagal');
            // return redirect('/authenticate-ic');
            echo '<script language="javascript">';
            echo 'alert("No. Kad Pengenalan yang dimasukkan telah wujud.");';
            echo "window.location.href='/authenticate-ic';";
            echo '</script>';
        } else {

            $GetDataXMLbyIC = new GetDataXMLbyIC();
            $hrmisData = $GetDataXMLbyIC->getDataHrmis($request->nric);
            // dd($hrmisData);
            if ($hrmisData == 'Tiada maklumat HRMIS dijumpai') {
                $name = null;
                $email = null;
                $nric = $request->nric;

                //pro_peserta
                $KOD_GELARAN = null;
                $NAMA_PESERTA = null;
                $TARIKH_LAHIR = null;
                $KOD_JANTINA = null;
                $EMEL_PESERTA = null;
                $KOD_KATEGORI_PESERTA = '01'; // 01 - Individu; 02 - Kumpulan
                $NO_KAD_PENGENALAN = null;
                $NO_TELEFON_BIMBIT = null;
                $NO_TELEFON_PEJABAT = null;
                // $user_id = null;

                ////pro_tempat_tugas
                $GELARAN_KETUA_JABATAN = null;;
                $KOD_KEMENTERIAN = null;
                $KOD_JABATAN = null;
                $BAHAGIAN = null;
                $ALAMAT_1 = null;
                $ALAMAT_2 = null;
                $ALAMAT_3 = null;
                $POSKOD = null;
                $BANDAR = null;
                $KOD_NEGERI = null;
                $KOD_NEGARA = null;
                $NAMA_PENYELIA = null;
                $EMEL_PENYELIA = null;
                $NO_TELEFON_PENYELIA = null;
                $NO_FAX_PENYELIA = null;

                //pro_perkhidmatan
                $KOD_GELARAN_JAWATAN = null;
                $KOD_PERINGKAT = null;
                $KOD_KLASIFIKASI_PERKHIDMATAN = null;
                $KOD_GRED_JAWATAN = null;
                $KOD_TARAF_PERJAWATAN = null;
                $KOD_JENIS_PERKHIDMATAN = null;
                $TARIKH_LANTIKAN = null;
            } else {
                // To get reference of JANTINA from table refgeneral
                $jantina = Refgeneral::where('MASTERCODE', 10004)->where('DESCRIPTION1', $hrmisData->Jantina)->get()->toArray();

                // To get reference of GELARAN from table refgeneral
                $gelaran = Refgeneral::where('MASTERCODE', 10009)->where('DESCRIPTION1', $hrmisData->Gelaran)->get()->toArray();

                // To get reference of NEGERI from table refgeneral
                $negeri = Refgeneral::where('MASTERCODE', 10021)->where('DESCRIPTION1', $hrmisData->Negeri)->get()->toArray();

                // To get reference of KLASIFIKASI_PERKHIDMATAN from table refgeneral
                $klasifikasiPerkhidmatan = Refgeneral::where('MASTERCODE', 10024)->where('DESCRIPTION1', 'like', '(' . str_replace(' ', '', $hrmisData->KlasifikasiPerkhidmatan) . ')%')->get()->toArray();

                // To get reference of GRED_JAWATAN from table refgeneral
                $gredJawatan = Refgeneral::where('MASTERCODE', 10025)->where('DESCRIPTION1', 'like', '%' . substr($hrmisData->GredGaji, 1, 2) . '%')->get()->toArray();

                // To get reference of TARAF_JAWATAN from table refgeneral
                $tarafJawatan = Refgeneral::where('MASTERCODE', 10026)->where('DESCRIPTION1', 'like', $hrmisData->StatusPerkhidmatan)->get()->toArray();

                $name = strtoupper($hrmisData->Nama);
                $email = $hrmisData->Emel;
                $nric = $hrmisData->NoKP;

                //pro_peserta
                $KOD_GELARAN = $hrmisData->Gelaran;
                $NAMA_PESERTA = strtoupper($hrmisData->Nama);
                $TARIKH_LAHIR = date('Y-m-d', strtotime($hrmisData->TarikhLahir));
                $KOD_JANTINA = count($jantina) == 1 ? $jantina[0]['DESCRIPTION1'] : NULL;
                $EMEL_PESERTA = $hrmisData->Emel;
                $KOD_KATEGORI_PESERTA = '01'; // 01 - Individu; 02 - Kumpulan
                $NO_KAD_PENGENALAN = $hrmisData->NoKP;
                $NO_TELEFON_BIMBIT = $hrmisData->TelBimbit;
                $NO_TELEFON_PEJABAT = $hrmisData->TelPejabat;
                // $user_id = null;

                ////pro_tempat_tugas
                $GELARAN_KETUA_JABATAN = NULL;
                $KOD_KEMENTERIAN = $hrmisData->Kementerian; // problem
                $KOD_JABATAN = $hrmisData->Agensi; // problem
                $BAHAGIAN = $hrmisData->Bahagian;
                $ALAMAT_1 = NULL; // must ask user about hrmis retrieve data
                $ALAMAT_2 = NULL;
                $ALAMAT_3 = NULL;
                $POSKOD = $hrmisData->Poskod;
                $BANDAR = $hrmisData->Bandar;
                $KOD_NEGERI = count($negeri) == 1 ? $negeri[0]['DESCRIPTION1'] : NULL;
                $KOD_NEGARA = $hrmisData->Negara;
                $NAMA_PENYELIA = $hrmisData->NamaPPP;
                $EMEL_PENYELIA = $hrmisData->Email_PPP;
                $NO_TELEFON_PENYELIA = NULL; // must ask user about hrmis retrieve data
                $NO_FAX_PENYELIA = NULL; // must ask user about hrmis retrieve data

                //pro_perkhidmatan
                $KOD_GELARAN_JAWATAN = $hrmisData->Jawatan;
                $KOD_PERINGKAT = NULL; // must ask SA about this
                $KOD_KLASIFIKASI_PERKHIDMATAN = count($klasifikasiPerkhidmatan) == 1 ? $klasifikasiPerkhidmatan[0]['DESCRIPTION1'] : NULL;
                $KOD_GRED_JAWATAN = count($gredJawatan) == 1 ? $gredJawatan[0]['DESCRIPTION1'] : NULL; // must ask client about GredGaji format
                $KOD_TARAF_PERJAWATAN = count($tarafJawatan) == 1 ? $tarafJawatan[0]['DESCRIPTION1'] : NULL; // must ask client about StatusPerkhidmatan format
                $KOD_JENIS_PERKHIDMATAN = NULL; // must ask user about hrmis retrieve data
                $TARIKH_LANTIKAN = NULL; // must ask user about hrmis retrieve data
            }

            // dd($name, $email, $nric);
            return view('auth.register', [
                'hrmisData' => $hrmisData,
                'names' => $name,
                'emails' => $email,
                'nrics' => $nric,
                //pro_peserta
                'KOD_GELARAN' => $KOD_GELARAN,
                'NAMA_PESERTA' => $NAMA_PESERTA,
                'TARIKH_LAHIR' => $TARIKH_LAHIR,
                'KOD_JANTINA' => $KOD_JANTINA,
                'EMEL_PESERTA' => $EMEL_PESERTA,
                'KOD_KATEGORI_PESERTA' => $KOD_KATEGORI_PESERTA,
                'NO_KAD_PENGENALAN' => $NO_KAD_PENGENALAN,
                'NO_TELEFON_BIMBIT' => $NO_TELEFON_BIMBIT,
                'NO_TELEFON_PEJABAT' => $NO_TELEFON_PEJABAT,
                // 'user_id' => $user_id,
                //pro_tempat_tugas
                'GELARAN_KETUA_JABATAN' => $GELARAN_KETUA_JABATAN,
                'KOD_KEMENTERIAN' => $KOD_KEMENTERIAN,
                'KOD_JABATAN' => $KOD_JABATAN,
                'BAHAGIAN' => $BAHAGIAN,
                'ALAMAT_1' => $ALAMAT_1,
                'ALAMAT_2' => $ALAMAT_2,
                'ALAMAT_3' => $ALAMAT_3,
                'POSKOD' => $POSKOD,
                'BANDAR' => $BANDAR,
                'KOD_NEGERI' => $KOD_NEGERI,
                'KOD_NEGARA' => $KOD_NEGARA,
                'NAMA_PENYELIA' => $NAMA_PENYELIA,
                'EMEL_PENYELIA' => $EMEL_PENYELIA,
                'NO_TELEFON_PENYELIA' => $NO_TELEFON_PENYELIA,
                'NO_FAX_PENYELIA' => $NO_FAX_PENYELIA,
                //pro_perkhidmatan
                'KOD_GELARAN_JAWATAN' => $KOD_GELARAN_JAWATAN,
                'KOD_PERINGKAT' => $KOD_PERINGKAT,
                'KOD_KLASIFIKASI_PERKHIDMATAN' => $KOD_KLASIFIKASI_PERKHIDMATAN,
                'KOD_GRED_JAWATAN' => $KOD_GRED_JAWATAN,
                'KOD_TARAF_PERJAWATAN' => $KOD_TARAF_PERJAWATAN,
                'KOD_JENIS_PERKHIDMATAN' => $KOD_JENIS_PERKHIDMATAN,
                'TARIKH_LANTIKAN' => $TARIKH_LANTIKAN,
            ]);
        }
    }
}
