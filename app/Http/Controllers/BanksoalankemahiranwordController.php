<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banksoalankemahiran;
use App\Models\Soalankemahiranword;

class BanksoalankemahiranwordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function soalankemahiranwordcreate($id_)
    {
        $banksoalankemahiran = Banksoalankemahiran::find($id_);

        return view('bank_soalan.soalan_kemahiran.word_create', [
            'banksoalankemahirans' => $banksoalankemahiran,
        ]);
    }

    public function soalankemahiranwordsave(Request $request)
    {
        $soalankemahiranword = new Soalankemahiranword();

        $soalankemahiranword->tahap_soalan = $request->tahap_soalan;
        $soalankemahiranword->arahan_umum = $request->arahan_umum;
        $soalankemahiranword->arahan_soalan = $request->arahan_soalan;
        $soalankemahiranword->status_soalan = $request->status_soalan;
        $soalankemahiranword->id_soalankemahiran = $request->id_soalankemahiran;

        if (!empty($request->soalan_1)) {
            $soalankemahiranword->soalan_1 = $request->soalan_1;
            $soalankemahiranword->jawapan_1 = $request->jawapan_1;
            $soalankemahiranword->markah_1 = $request->markah_1;
        }
        if (!empty($request->soalan_2)) {
            $soalankemahiranword->soalan_2 = $request->soalan_2;
            $soalankemahiranword->jawapan_2 = $request->jawapan_2;
            $soalankemahiranword->markah_2 = $request->markah_2;
        }
        if (!empty($request->soalan_3)) {
            $soalankemahiranword->soalan_3 = $request->soalan_3;
            $soalankemahiranword->jawapan_3 = $request->jawapan_3;
            $soalankemahiranword->markah_3 = $request->markah_3;
        }
        if (!empty($request->soalan_4)) {
            $soalankemahiranword->soalan_4 = $request->soalan_4;
            $soalankemahiranword->jawapan_4 = $request->jawapan_4;
            $soalankemahiranword->markah_4 = $request->markah_4;
        }
        if (!empty($request->soalan_5)) {
            $soalankemahiranword->soalan_5 = $request->soalan_5;
            $soalankemahiranword->jawapan_5 = $request->jawapan_5;
            $soalankemahiranword->markah_5 = $request->markah_5;
        }
        if (!empty($request->soalan_6)) {
            $soalankemahiranword->soalan_6 = $request->soalan_6;
            $soalankemahiranword->jawapan_6 = $request->jawapan_6;
            $soalankemahiranword->markah_6 = $request->markah_6;
        }
        if (!empty($request->soalan_7)) {
            $soalankemahiranword->soalan_7 = $request->soalan_7;
            $soalankemahiranword->jawapan_7 = $request->jawapan_7;
            $soalankemahiranword->markah_7 = $request->markah_7;
        }
        if (!empty($request->soalan_8)) {
            $soalankemahiranword->soalan_8 = $request->soalan_8;
            $soalankemahiranword->jawapan_8 = $request->jawapan_8;
            $soalankemahiranword->markah_8 = $request->markah_8;
        }
        if (!empty($request->soalan_9)) {
            $soalankemahiranword->soalan_9 = $request->soalan_9;
            $soalankemahiranword->jawapan_9 = $request->jawapan_9;
            $soalankemahiranword->markah_9 = $request->markah_9;
        }
        if (!empty($request->soalan_10)) {
            $soalankemahiranword->soalan_10 = $request->soalan_10;
            $soalankemahiranword->jawapan_10 = $request->jawapan_10;
            $soalankemahiranword->markah_10 = $request->markah_10;
        }
        if (!empty($request->soalan_11)) {
            $soalankemahiranword->soalan_11 = $request->soalan_11;
            $soalankemahiranword->jawapan_11 = $request->jawapan_11;
            $soalankemahiranword->markah_11 = $request->markah_11;
        }
        if (!empty($request->soalan_12)) {
            $soalankemahiranword->soalan_12 = $request->soalan_12;
            $soalankemahiranword->jawapan_12 = $request->jawapan_12;
            $soalankemahiranword->markah_12 = $request->markah_12;
        }
        if (!empty($request->soalan_13)) {
            $soalankemahiranword->soalan_13 = $request->soalan_13;
            $soalankemahiranword->jawapan_13 = $request->jawapan_13;
            $soalankemahiranword->markah_13 = $request->markah_13;
        }
        if (!empty($request->soalan_14)) {
            $soalankemahiranword->soalan_14 = $request->soalan_14;
            $soalankemahiranword->jawapan_14 = $request->jawapan_14;
            $soalankemahiranword->markah_14 = $request->markah_14;
        }
        if (!empty($request->soalan_15)) {
            $soalankemahiranword->soalan_15 = $request->soalan_15;
            $soalankemahiranword->jawapan_15 = $request->jawapan_15;
            $soalankemahiranword->markah_15 = $request->markah_15;
        }

        // dd($soalankemahiranword);

        $soalankemahiranword->save();

        return redirect('/bank-soalan-kemahiran/' . $request->id_soalankemahiran);
    }

    public function soalankemahiranwordedit($id_, $id_soalan)
    {
        $banksoalankemahiran = Banksoalankemahiran::find($id_);
        $soalankemahiranword =  Soalankemahiranword::where('id', $id_soalan)->get()->first();

        // dd($soalankemahiraninternet);
        return view('bank_soalan.soalan_kemahiran.word_edit', [
            'banksoalankemahirans' => $banksoalankemahiran,
            'soalankemahiranwords' => $soalankemahiranword
        ]);
    }

    public function soalankemahiranwordeditsave(Request $request, $id_, $id_soalan)
    {

        $soalankemahiranword =  Soalankemahiranword::where('id', $id_soalan)->get()->first();

        $soalankemahiranword->tahap_soalan = $request->tahap_soalan;
        $soalankemahiranword->arahan_umum = $request->arahan_umum;
        $soalankemahiranword->arahan_soalan = $request->arahan_soalan;
        $soalankemahiranword->status_soalan = $request->status_soalan;
        $soalankemahiranword->id_soalankemahiran = $request->id_soalankemahiran;

        if (empty($request->soalan_1)) {
            $soalankemahiranword->soalan_1 = null;
            $soalankemahiranword->jawapan_1 = null;
            $soalankemahiranword->markah_1 = null;
        } else {
            $soalankemahiranword->soalan_1 = $request->soalan_1;
            $soalankemahiranword->jawapan_1 = $request->jawapan_1;
            $soalankemahiranword->markah_1 = $request->markah_1;
        }
        if (empty($request->soalan_2)) {
            $soalankemahiranword->soalan_2 = null;
            $soalankemahiranword->jawapan_2 = null;
            $soalankemahiranword->markah_2 = null;
        } else {
            $soalankemahiranword->soalan_2 = $request->soalan_2;
            $soalankemahiranword->jawapan_2 = $request->jawapan_2;
            $soalankemahiranword->markah_2 = $request->markah_2;
        }
        if (empty($request->soalan_3)) {
            $soalankemahiranword->soalan_3 = null;
            $soalankemahiranword->jawapan_3 = null;
            $soalankemahiranword->markah_3 = null;
        } else {
            $soalankemahiranword->soalan_3 = $request->soalan_3;
            $soalankemahiranword->jawapan_3 = $request->jawapan_3;
            $soalankemahiranword->markah_3 = $request->markah_3;
        }
        if (empty($request->soalan_4)) {
            $soalankemahiranword->soalan_4 = null;
            $soalankemahiranword->jawapan_4 = null;
            $soalankemahiranword->markah_4 = null;
        } else {
            $soalankemahiranword->soalan_4 = $request->soalan_4;
            $soalankemahiranword->jawapan_4 = $request->jawapan_4;
            $soalankemahiranword->markah_4 = $request->markah_4;
        }
        if (empty($request->soalan_5)) {
            $soalankemahiranword->soalan_5 = null;
            $soalankemahiranword->jawapan_5 = null;
            $soalankemahiranword->markah_5 = null;
        } else {
            $soalankemahiranword->soalan_5 = $request->soalan_5;
            $soalankemahiranword->jawapan_5 = $request->jawapan_5;
            $soalankemahiranword->markah_5 = $request->markah_5;
        }
        if (empty($request->soalan_6)) {
            $soalankemahiranword->soalan_6 = null;
            $soalankemahiranword->jawapan_6 = null;
            $soalankemahiranword->markah_6 = null;
        } else {
            $soalankemahiranword->soalan_6 = $request->soalan_6;
            $soalankemahiranword->jawapan_6 = $request->jawapan_6;
            $soalankemahiranword->markah_6 = $request->markah_6;
        }
        if (empty($request->soalan_7)) {
            $soalankemahiranword->soalan_7 = null;
            $soalankemahiranword->jawapan_7 = null;
            $soalankemahiranword->markah_7 = null;
        } else {
            $soalankemahiranword->soalan_7 = $request->soalan_7;
            $soalankemahiranword->jawapan_7 = $request->jawapan_7;
            $soalankemahiranword->markah_7 = $request->markah_7;
        }
        if (empty($request->soalan_8)) {
            $soalankemahiranword->soalan_8 = null;
            $soalankemahiranword->jawapan_8 = null;
            $soalankemahiranword->markah_8 = null;
        } else {
            $soalankemahiranword->soalan_8 = $request->soalan_8;
            $soalankemahiranword->jawapan_8 = $request->jawapan_8;
            $soalankemahiranword->markah_8 = $request->markah_8;
        }
        if (empty($request->soalan_9)) {
            $soalankemahiranword->soalan_9 = null;
            $soalankemahiranword->jawapan_9 = null;
            $soalankemahiranword->markah_9 = null;
        } else {
            $soalankemahiranword->soalan_9 = $request->soalan_9;
            $soalankemahiranword->jawapan_9 = $request->jawapan_9;
            $soalankemahiranword->markah_9 = $request->markah_9;
        }
        if (empty($request->soalan_10)) {
            $soalankemahiranword->soalan_10 = null;
            $soalankemahiranword->jawapan_10 = null;
            $soalankemahiranword->markah_10 = null;
        } else {
            $soalankemahiranword->soalan_10 = $request->soalan_10;
            $soalankemahiranword->jawapan_10 = $request->jawapan_10;
            $soalankemahiranword->markah_10 = $request->markah_10;
        }
        if (empty($request->soalan_11)) {
            $soalankemahiranword->soalan_11 = null;
            $soalankemahiranword->jawapan_11 = null;
            $soalankemahiranword->markah_11 = null;
        } else {
            $soalankemahiranword->soalan_11 = $request->soalan_11;
            $soalankemahiranword->jawapan_11 = $request->jawapan_11;
            $soalankemahiranword->markah_11 = $request->markah_11;
        }
        if (empty($request->soalan_12)) {
            $soalankemahiranword->soalan_12 = null;
            $soalankemahiranword->jawapan_12 = null;
            $soalankemahiranword->markah_12 = null;
        } else {
            $soalankemahiranword->soalan_12 = $request->soalan_12;
            $soalankemahiranword->jawapan_12 = $request->jawapan_12;
            $soalankemahiranword->markah_12 = $request->markah_12;
        }
        if (empty($request->soalan_13)) {
            $soalankemahiranword->soalan_13 = null;
            $soalankemahiranword->jawapan_13 = null;
            $soalankemahiranword->markah_13 = null;
        } else {
            $soalankemahiranword->soalan_13 = $request->soalan_13;
            $soalankemahiranword->jawapan_13 = $request->jawapan_13;
            $soalankemahiranword->markah_13 = $request->markah_13;
        }
        if (empty($request->soalan_14)) {
            $soalankemahiranword->soalan_14 = null;
            $soalankemahiranword->jawapan_14 = null;
            $soalankemahiranword->markah_14 = null;
        } else {
            $soalankemahiranword->soalan_14 = $request->soalan_14;
            $soalankemahiranword->jawapan_14 = $request->jawapan_14;
            $soalankemahiranword->markah_14 = $request->markah_1;
        }
        if (empty($request->soalan_15)) {
            $soalankemahiranword->soalan_15 = null;
            $soalankemahiranword->jawapan_15 = null;
            $soalankemahiranword->markah_15 = null;
        } else {
            $soalankemahiranword->soalan_15 = $request->soalan_15;
            $soalankemahiranword->jawapan_15 = $request->jawapan_15;
            $soalankemahiranword->markah_15 = $request->markah_15;
        }

        // dd($soalankemahiranword);

        $soalankemahiranword->save();

        return redirect('/bank-soalan-kemahiran/' . $request->id_soalankemahiran);
    }

    public function soalankemahiranworddelete($id_, $id_soalan)
    {

        $soalankemahiranword =  Soalankemahiranword::where('id', $id_soalan)->get()->first();

        $soalankemahiranword->delete();

        return redirect('/bank-soalan-kemahiran/' . $soalankemahiranword->id_soalankemahiran);
    }
}
