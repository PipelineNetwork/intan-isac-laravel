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

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'nric' => 'required|string|max:255',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'ministry_code' => $request->ministry_code,
            'office_number' => $request->office_number,
            'fax_number' => $request->fax_number,
            'telephone_number' => $request->telephone_number,
            'password' => Hash::make($request->password),
            'nric' => $request->nric,
            'user_group_id' => 5,
        ]);

        $GetDataXMLbyIC = new GetDataXMLbyIC();
        $hrmisData = $GetDataXMLbyIC->getDataHrmis($request->nric);
        if (gettype($hrmisData) == "object") {
            // To get reference of JANTINA from table refgeneral
            $jantina = Refgeneral::where('MASTERCODE', 10004)->where('DESCRIPTION1', $hrmisData->Jantina)->get()->toArray();

            // To get reference of GELARAN from table refgeneral
            $gelaran = Refgeneral::where('MASTERCODE', 10009)->where('DESCRIPTION1', $hrmisData->Gelaran)->get()->toArray();

            // To get reference of NEGERI from table refgeneral
            $negeri = Refgeneral::where('MASTERCODE', 10021)->where('DESCRIPTION1', $hrmisData->Negeri)->get()->toArray();

            // To get reference of KLASIFIKASI_PERKHIDMATAN from table refgeneral
            $klasifikasiPerkhidmatan = Refgeneral::where('MASTERCODE', 10024)->where('DESCRIPTION1', 'like', '('.str_replace(' ', '', $hrmisData->KlasifikasiPerkhidmatan).')%' )->get()->toArray();

            // To get reference of GRED_JAWATAN from table refgeneral
            $gredJawatan = Refgeneral::where('MASTERCODE', 10025)->where('DESCRIPTION1', 'like', '%'.substr($hrmisData->GredGaji, 1, 2).'%' )->get()->toArray();

            // To get reference of TARAF_JAWATAN from table refgeneral
            $tarafJawatan = Refgeneral::where('MASTERCODE', 10026)->where('DESCRIPTION1', 'like', $hrmisData->StatusPerkhidmatan)->get()->toArray();

            // select * from users
            // join pro_peserta on users.id = pro_peserta.user_id
            // join pro_tempat_tugas on pro_peserta.ID_PESERTA = pro_tempat_tugas.ID_PESERTA
            // join pro_perkhidmatan on pro_peserta.ID_PESERTA = pro_perkhidmatan.ID_PESERTA;

            $peserta = Permohanan::create([
                'KOD_GELARAN' => count($gelaran) == 1 ? $gelaran[0]['REFERENCECODE'] : NULL,
                'NAMA_PESERTA' => $hrmisData->Nama,
                'TARIKH_LAHIR' => substr($hrmisData->TarikhLahir, 0, 10),
                'KOD_JANTINA' => count($jantina) == 1 ? $jantina[0]['REFERENCECODE'] : NULL,
                'EMEL_PESERTA' => $hrmisData->Emel,
                'KOD_KATEGORI_PESERTA' => '01', // 01 - Individu, 02 - Kumpulan
                'NO_KAD_PENGENALAN' => $hrmisData->NoKP,
                'NO_TELEFON_BIMBIT' => $hrmisData->TelBimbit,
                'NO_TELEFON_PEJABAT' => $hrmisData->TelPejabat,
                'user_id' => $user->id,
            ]);

            $tempat_tugas = Tugas::create([
                'ID_PESERTA' => $peserta->ID_PESERTA,
                'GELARAN_KETUA_JABATAN' => NULL,
                'KOD_KEMENTERIAN' => NULL, // problem
                'KOD_JABATAN' => NULL, // problem
                'BAHAGIAN' => $hrmisData->Bahagian,
                'ALAMAT_1' => NULL, // must ask user about hrmis retrieve data
                'ALAMAT_2' => NULL,
                'ALAMAT_3' => NULL,
                'POSKOD' => $hrmisData->Poskod,
                'BANDAR' => $hrmisData->Bandar,
                'KOD_NEGERI' => count($negeri) == 1 ? $negeri[0]['REFERENCECODE'] : NULL,
                'KOD_NEGARA' => 'MYS',
                'NAMA_PENYELIA' => $hrmisData->NamaPPP,
                'EMEL_PENYELIA' => $hrmisData->Email_PPP,
                'NO_TELEFON_PENYELIA' => NULL, // must ask user about hrmis retrieve data
                'NO_FAX_PENYELIA' => NULL, // must ask user about hrmis retrieve data
            ]);

            $perkhidmatan = Perkhidmatan::create([
                'KOD_GELARAN_JAWATAN' => $hrmisData->Jawatan,
                'KOD_PERINGKAT' => NULL, // must ask SA about this
                'KOD_KLASIFIKASI_PERKHIDMATAN' => count($klasifikasiPerkhidmatan) == 1 ? $klasifikasiPerkhidmatan[0]['REFERENCECODE'] : NULL,
                'KOD_GRED_JAWATAN' => count($gredJawatan) == 1 ? $gredJawatan[0]['REFERENCECODE'] : NULL, // must ask client about GredGaji format
                'KOD_TARAF_PERJAWATAN' => count($tarafJawatan) == 1 ? $tarafJawatan[0]['REFERENCECODE'] : NULL, // must ask client about StatusPerkhidmatan format
                'KOD_JENIS_PERKHIDMATAN' => NULL, // must ask user about hrmis retrieve data
                'TARIKH_LANTIKAN' => NULL, // must ask user about hrmis retrieve data
                'ID_PESERTA' => $peserta->ID_PESERTA,
            ]);
        } else {
            $peserta = Permohanan::create([
                'KOD_GELARAN' => NULL,
                'NAMA_PESERTA' => $request->name,
                'TARIKH_LAHIR' => NULL,
                'KOD_JANTINA' => NULL,
                'EMEL_PESERTA' => $request->email,
                'KOD_KATEGORI_PESERTA' => NULL,
                'NO_KAD_PENGENALAN' => $request->nric,
                'NO_TELEFON_BIMBIT' => NULL,
                'NO_TELEFON_PEJABAT' => NULL,
                'user_id' => $user->id,
            ]);
        }
        event(new Registered($user));
        Auth::login($user);

        dd($user);
        return redirect(RouteServiceProvider::HOME);
    }
}
