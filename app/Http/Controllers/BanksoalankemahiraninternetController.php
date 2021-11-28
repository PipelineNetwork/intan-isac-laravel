<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banksoalankemahiran;
use App\Models\Soalankemahiraninternet;

class BanksoalankemahiraninternetController extends Controller
{
    public function createsoalankemahiraninternet($id_)
    {
        $banksoalankemahiran = Banksoalankemahiran::find($id_);
        // $soalankemahiraninternet =  Soalankemahiraninternet::where('id_soalankemahiran', $id_)->get();
        // $soalankemahiranword =  Soalankemahiranword::where('id_soalankemahiran', $id_)->get();
        // $soalankemahiranemail =  Soalankemahiranemail::where('id_soalankemahiran', $id_)->get();

        return view('bank_soalan.soalan_kemahiran.internet_create', [
            'banksoalankemahirans' => $banksoalankemahiran,
            // 'soalankemahiraninternets' => $soalankemahiraninternet,
            // 'soalankemahiranwords' => $soalankemahiranword,
            // 'soalankemahiranemails' => $soalankemahiranemail,
        ]);
    }

    public function soalankemahiraninternetsave(Request $request)
    {
        $soalankemahiraninternet = new Soalankemahiraninternet();

        $soalankemahiraninternet->tahap_soalan = $request->tahap_soalan;
        $soalankemahiraninternet->arahan_umum = $request->arahan_umum;
        $soalankemahiraninternet->arahan_soalan = $request->arahan_soalan;
        $soalankemahiraninternet->status_soalan = $request->status_soalan;
        $soalankemahiraninternet->id_soalankemahiran = $request->id_soalankemahiran;
        $soalankemahiraninternet->url_wikipedia = $request->url_wikipedia;
        if (!empty($request->soalan_1)) {
            $soalankemahiraninternet->soalan_1 = $request->soalan_1;
            $soalankemahiraninternet->jawapan_1 = $request->jawapan_1;
            $soalankemahiraninternet->markah_1 = $request->markah_1;
        }
        if (!empty($request->soalan_2)) {
            $soalankemahiraninternet->soalan_2 = $request->soalan_2;
            $soalankemahiraninternet->jawapan_2 = $request->jawapan_2;
            $soalankemahiraninternet->markah_2 = $request->markah_2;
        }
        if (!empty($request->soalan_3)) {
            $soalankemahiraninternet->soalan_3 = $request->soalan_3;
            $soalankemahiraninternet->jawapan_3 = $request->jawapan_3;
            $soalankemahiraninternet->markah_3 = $request->markah_3;
        }
        if (!empty($request->soalan_4)) {
            $soalankemahiraninternet->soalan_4 = $request->soalan_4;
            $soalankemahiraninternet->jawapan_4 = $request->jawapan_4;
            $soalankemahiraninternet->markah_4 = $request->markah_4;
        }
        if (!empty($request->soalan_5)) {
            $soalankemahiraninternet->soalan_5 = $request->soalan_5;
            $soalankemahiraninternet->jawapan_5 = $request->jawapan_5;
            $soalankemahiraninternet->markah_5 = $request->markah_5;
        }
        if (!empty($request->soalan_6)) {
            $soalankemahiraninternet->soalan_6 = $request->soalan_6;
            $soalankemahiraninternet->jawapan_6 = $request->jawapan_6;
            $soalankemahiraninternet->markah_6 = $request->markah_6;
        }
        if (!empty($request->soalan_7)) {
            $soalankemahiraninternet->soalan_7 = $request->soalan_7;
            $soalankemahiraninternet->jawapan_7 = $request->jawapan_7;
            $soalankemahiraninternet->markah_7 = $request->markah_7;
        }
        if (!empty($request->soalan_8)) {
            $soalankemahiraninternet->soalan_8 = $request->soalan_8;
            $soalankemahiraninternet->jawapan_8 = $request->jawapan_8;
            $soalankemahiraninternet->markah_8 = $request->markah_8;
        }
        if (!empty($request->soalan_9)) {
            $soalankemahiraninternet->soalan_9 = $request->soalan_9;
            $soalankemahiraninternet->jawapan_9 = $request->jawapan_9;
            $soalankemahiraninternet->markah_9 = $request->markah_9;
        }
        if (!empty($request->soalan_10)) {
            $soalankemahiraninternet->soalan_10 = $request->soalan_10;
            $soalankemahiraninternet->jawapan_10 = $request->jawapan_10;
            $soalankemahiraninternet->markah_10 = $request->markah_10;
        }
        if (!empty($request->soalan_11)) {
            $soalankemahiraninternet->soalan_11 = $request->soalan_11;
            $soalankemahiraninternet->jawapan_11 = $request->jawapan_11;
            $soalankemahiraninternet->markah_11 = $request->markah_11;
        }
        if (!empty($request->soalan_12)) {
            $soalankemahiraninternet->soalan_12 = $request->soalan_12;
            $soalankemahiraninternet->jawapan_12 = $request->jawapan_12;
            $soalankemahiraninternet->markah_12 = $request->markah_12;
        }
        if (!empty($request->soalan_13)) {
            $soalankemahiraninternet->soalan_13 = $request->soalan_13;
            $soalankemahiraninternet->jawapan_13 = $request->jawapan_13;
            $soalankemahiraninternet->markah_13 = $request->markah_13;
        }
        if (!empty($request->soalan_14)) {
            $soalankemahiraninternet->soalan_14 = $request->soalan_14;
            $soalankemahiraninternet->jawapan_14 = $request->jawapan_14;
            $soalankemahiraninternet->markah_14 = $request->markah_14;
        }
        if (!empty($request->soalan_15)) {
            $soalankemahiraninternet->soalan_15 = $request->soalan_15;
            $soalankemahiraninternet->jawapan_15 = $request->jawapan_15;
            $soalankemahiraninternet->markah_15 = $request->markah_15;
        }

        // dd($soalankemahiraninternet);

        $soalankemahiraninternet->save();

        return redirect('/bank-soalan-kemahiran/' . $request->id_soalankemahiran);
    }
}
