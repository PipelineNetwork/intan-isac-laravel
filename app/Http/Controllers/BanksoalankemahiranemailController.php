<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banksoalankemahiran;
use App\Models\Soalankemahiranemail;

class BanksoalankemahiranemailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function soalankemahiranemailcreate($id_)
    {
        $banksoalankemahiran = Banksoalankemahiran::find($id_);

        return view('bank_soalan.soalan_kemahiran.emel_create', [
            'banksoalankemahirans' => $banksoalankemahiran,
        ]);
    }

    public function soalankemahiranemailsave(Request $request)
    {
        $soalankemahiranemail = new Soalankemahiranemail();

        $soalankemahiranemail->tahap_soalan = $request->tahap_soalan;
        $soalankemahiranemail->arahan_umum = $request->arahan_umum;
        $soalankemahiranemail->arahan_soalan = $request->arahan_soalan;
        $soalankemahiranemail->status_soalan = $request->status_soalan;
        $soalankemahiranemail->id_soalankemahiran = $request->id_soalankemahiran;

        if (!empty($request->soalan_1)) {
            $soalankemahiranemail->soalan_1 = $request->soalan_1;
            $soalankemahiranemail->jawapan_1 = $request->jawapan_1;
            $soalankemahiranemail->markah_1 = $request->markah_1;
        }
        if (!empty($request->soalan_2)) {
            $soalankemahiranemail->soalan_2 = $request->soalan_2;
            $soalankemahiranemail->jawapan_2 = $request->jawapan_2;
            $soalankemahiranemail->markah_2 = $request->markah_2;
        }
        if (!empty($request->soalan_3)) {
            $soalankemahiranemail->soalan_3 = $request->soalan_3;
            $soalankemahiranemail->jawapan_3 = $request->jawapan_3;
            $soalankemahiranemail->markah_3 = $request->markah_3;
        }
        if (!empty($request->soalan_4)) {
            $soalankemahiranemail->soalan_4 = $request->soalan_4;
            $soalankemahiranemail->jawapan_4 = $request->jawapan_4;
            $soalankemahiranemail->markah_4 = $request->markah_4;
        }
        if (!empty($request->soalan_5)) {
            $soalankemahiranemail->soalan_5 = $request->soalan_5;
            $soalankemahiranemail->jawapan_5 = $request->jawapan_5;
            $soalankemahiranemail->markah_5 = $request->markah_5;
        }
        if (!empty($request->soalan_6)) {
            $soalankemahiranemail->soalan_6 = $request->soalan_6;
            $soalankemahiranemail->jawapan_6 = $request->jawapan_6;
            $soalankemahiranemail->markah_6 = $request->markah_6;
        }
        if (!empty($request->soalan_7)) {
            $soalankemahiranemail->soalan_7 = $request->soalan_7;
            $soalankemahiranemail->jawapan_7 = $request->jawapan_7;
            $soalankemahiranemail->markah_7 = $request->markah_7;
        }
        if (!empty($request->soalan_8)) {
            $soalankemahiranemail->soalan_8 = $request->soalan_8;
            $soalankemahiranemail->jawapan_8 = $request->jawapan_8;
            $soalankemahiranemail->markah_8 = $request->markah_8;
        }
        if (!empty($request->soalan_9)) {
            $soalankemahiranemail->soalan_9 = $request->soalan_9;
            $soalankemahiranemail->jawapan_9 = $request->jawapan_9;
            $soalankemahiranemail->markah_9 = $request->markah_9;
        }
        if (!empty($request->soalan_10)) {
            $soalankemahiranemail->soalan_10 = $request->soalan_10;
            $soalankemahiranemail->jawapan_10 = $request->jawapan_10;
            $soalankemahiranemail->markah_10 = $request->markah_10;
        }
        if (!empty($request->soalan_11)) {
            $soalankemahiranemail->soalan_11 = $request->soalan_11;
            $soalankemahiranemail->jawapan_11 = $request->jawapan_11;
            $soalankemahiranemail->markah_11 = $request->markah_11;
        }
        if (!empty($request->soalan_12)) {
            $soalankemahiranemail->soalan_12 = $request->soalan_12;
            $soalankemahiranemail->jawapan_12 = $request->jawapan_12;
            $soalankemahiranemail->markah_12 = $request->markah_12;
        }
        if (!empty($request->soalan_13)) {
            $soalankemahiranemail->soalan_13 = $request->soalan_13;
            $soalankemahiranemail->jawapan_13 = $request->jawapan_13;
            $soalankemahiranemail->markah_13 = $request->markah_13;
        }
        if (!empty($request->soalan_14)) {
            $soalankemahiranemail->soalan_14 = $request->soalan_14;
            $soalankemahiranemail->jawapan_14 = $request->jawapan_14;
            $soalankemahiranemail->markah_14 = $request->markah_14;
        }
        if (!empty($request->soalan_15)) {
            $soalankemahiranemail->soalan_15 = $request->soalan_15;
            $soalankemahiranemail->jawapan_15 = $request->jawapan_15;
            $soalankemahiranemail->markah_15 = $request->markah_15;
        }

        // dd($soalankemahiranemail);

        $soalankemahiranemail->save();

        return redirect('/bank-soalan-kemahiran/' . $request->id_soalankemahiran);
    }

    public function soalankemahiranemailedit($id_, $id_soalan)
    {
        $banksoalankemahiran = Banksoalankemahiran::find($id_);
        $soalankemahiranemail =  Soalankemahiranemail::where('id', $id_soalan)->get()->first();

        // dd($soalankemahiraninternet);
        return view('bank_soalan.soalan_kemahiran.emel_edit', [
            'banksoalankemahirans' => $banksoalankemahiran,
            'soalankemahiranemails' => $soalankemahiranemail
        ]);
    }

    public function soalankemahiranemaileditsave(Request $request, $id_, $id_soalan)
    {
        $soalankemahiranemail =  Soalankemahiranemail::where('id', $id_soalan)->get()->first();

        $soalankemahiranemail->tahap_soalan = $request->tahap_soalan;
        $soalankemahiranemail->arahan_umum = $request->arahan_umum;
        $soalankemahiranemail->arahan_soalan = $request->arahan_soalan;
        $soalankemahiranemail->status_soalan = $request->status_soalan;
        $soalankemahiranemail->id_soalankemahiran = $request->id_soalankemahiran;

        if (empty($request->soalan_1)) {
            $soalankemahiranemail->soalan_1 = null;
            $soalankemahiranemail->jawapan_1 = null;
            $soalankemahiranemail->markah_1 = null;
        } else {
            $soalankemahiranemail->soalan_1 = $request->soalan_1;
            $soalankemahiranemail->jawapan_1 = $request->jawapan_1;
            $soalankemahiranemail->markah_1 = $request->markah_1;
        }
        if (empty($request->soalan_2)) {
            $soalankemahiranemail->soalan_2 = null;
            $soalankemahiranemail->jawapan_2 = null;
            $soalankemahiranemail->markah_2 = null;
        } else {
            $soalankemahiranemail->soalan_2 = $request->soalan_2;
            $soalankemahiranemail->jawapan_2 = $request->jawapan_2;
            $soalankemahiranemail->markah_2 = $request->markah_2;
        }
        if (empty($request->soalan_3)) {
            $soalankemahiranemail->soalan_3 = null;
            $soalankemahiranemail->jawapan_3 = null;
            $soalankemahiranemail->markah_3 = null;
        } else {
            $soalankemahiranemail->soalan_3 = $request->soalan_3;
            $soalankemahiranemail->jawapan_3 = $request->jawapan_3;
            $soalankemahiranemail->markah_3 = $request->markah_3;
        }
        if (empty($request->soalan_4)) {
            $soalankemahiranemail->soalan_4 = null;
            $soalankemahiranemail->jawapan_4 = null;
            $soalankemahiranemail->markah_4 = null;
        } else {
            $soalankemahiranemail->soalan_4 = $request->soalan_4;
            $soalankemahiranemail->jawapan_4 = $request->jawapan_4;
            $soalankemahiranemail->markah_4 = $request->markah_4;
        }
        if (empty($request->soalan_5)) {
            $soalankemahiranemail->soalan_5 = null;
            $soalankemahiranemail->jawapan_5 = null;
            $soalankemahiranemail->markah_5 = null;
        } else {
            $soalankemahiranemail->soalan_5 = $request->soalan_5;
            $soalankemahiranemail->jawapan_5 = $request->jawapan_5;
            $soalankemahiranemail->markah_5 = $request->markah_5;
        }
        if (empty($request->soalan_6)) {
            $soalankemahiranemail->soalan_6 = null;
            $soalankemahiranemail->jawapan_6 = null;
            $soalankemahiranemail->markah_6 = null;
        } else {
            $soalankemahiranemail->soalan_6 = $request->soalan_6;
            $soalankemahiranemail->jawapan_6 = $request->jawapan_6;
            $soalankemahiranemail->markah_6 = $request->markah_6;
        }
        if (empty($request->soalan_7)) {
            $soalankemahiranemail->soalan_7 = null;
            $soalankemahiranemail->jawapan_7 = null;
            $soalankemahiranemail->markah_7 = null;
        } else {
            $soalankemahiranemail->soalan_7 = $request->soalan_7;
            $soalankemahiranemail->jawapan_7 = $request->jawapan_7;
            $soalankemahiranemail->markah_7 = $request->markah_7;
        }
        if (empty($request->soalan_8)) {
            $soalankemahiranemail->soalan_8 = null;
            $soalankemahiranemail->jawapan_8 = null;
            $soalankemahiranemail->markah_8 = null;
        } else {
            $soalankemahiranemail->soalan_8 = $request->soalan_8;
            $soalankemahiranemail->jawapan_8 = $request->jawapan_8;
            $soalankemahiranemail->markah_8 = $request->markah_8;
        }
        if (empty($request->soalan_9)) {
            $soalankemahiranemail->soalan_9 = null;
            $soalankemahiranemail->jawapan_9 = null;
            $soalankemahiranemail->markah_9 = null;
        } else {
            $soalankemahiranemail->soalan_9 = $request->soalan_9;
            $soalankemahiranemail->jawapan_9 = $request->jawapan_9;
            $soalankemahiranemail->markah_9 = $request->markah_9;
        }
        if (empty($request->soalan_10)) {
            $soalankemahiranemail->soalan_10 = null;
            $soalankemahiranemail->jawapan_10 = null;
            $soalankemahiranemail->markah_10 = null;
        } else {
            $soalankemahiranemail->soalan_10 = $request->soalan_10;
            $soalankemahiranemail->jawapan_10 = $request->jawapan_10;
            $soalankemahiranemail->markah_10 = $request->markah_10;
        }
        if (empty($request->soalan_11)) {
            $soalankemahiranemail->soalan_11 = null;
            $soalankemahiranemail->jawapan_11 = null;
            $soalankemahiranemail->markah_11 = null;
        } else {
            $soalankemahiranemail->soalan_11 = $request->soalan_11;
            $soalankemahiranemail->jawapan_11 = $request->jawapan_11;
            $soalankemahiranemail->markah_11 = $request->markah_11;
        }
        if (empty($request->soalan_12)) {
            $soalankemahiranemail->soalan_12 = null;
            $soalankemahiranemail->jawapan_12 = null;
            $soalankemahiranemail->markah_12 = null;
        } else {
            $soalankemahiranemail->soalan_12 = $request->soalan_12;
            $soalankemahiranemail->jawapan_12 = $request->jawapan_12;
            $soalankemahiranemail->markah_12 = $request->markah_12;
        }
        if (empty($request->soalan_13)) {
            $soalankemahiranemail->soalan_13 = null;
            $soalankemahiranemail->jawapan_13 = null;
            $soalankemahiranemail->markah_13 = null;
        } else {
            $soalankemahiranemail->soalan_13 = $request->soalan_13;
            $soalankemahiranemail->jawapan_13 = $request->jawapan_13;
            $soalankemahiranemail->markah_13 = $request->markah_13;
        }
        if (empty($request->soalan_14)) {
            $soalankemahiranemail->soalan_14 = null;
            $soalankemahiranemail->jawapan_14 = null;
            $soalankemahiranemail->markah_14 = null;
        } else {
            $soalankemahiranemail->soalan_14 = $request->soalan_14;
            $soalankemahiranemail->jawapan_14 = $request->jawapan_14;
            $soalankemahiranemail->markah_14 = $request->markah_1;
        }
        if (empty($request->soalan_15)) {
            $soalankemahiranemail->soalan_15 = null;
            $soalankemahiranemail->jawapan_15 = null;
            $soalankemahiranemail->markah_15 = null;
        } else {
            $soalankemahiranemail->soalan_15 = $request->soalan_15;
            $soalankemahiranemail->jawapan_15 = $request->jawapan_15;
            $soalankemahiranemail->markah_15 = $request->markah_15;
        }

        // dd($soalankemahiranemail);

        $soalankemahiranemail->save();

        return redirect('/bank-soalan-kemahiran/' . $request->id_soalankemahiran);
    }

    public function soalankemahiranemaildelete($id_, $id_soalan) {

        $soalankemahiranemail =  Soalankemahiranemail::where('id', $id_soalan)->get()->first();

        $soalankemahiranemail->delete();

        return redirect('/bank-soalan-kemahiran/' . $soalankemahiranemail->id_soalankemahiran);
    }
}
