<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bankjawapancalon;
use App\Models\Soalankemahiraninternet;

class SoalankemahiraninternetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jawapancalon = Bankjawapancalon::all();
        $soalankemahiraninternet = Soalankemahiraninternet::where('status_soalan', 1)->inRandomOrder()->limit(1)->get();

        // dd($soalankemahiraninternet);
        return view('proses_penilaian.soalan_kemahiran.internet', [
            'jawapancalons' => $jawapancalon,
            'soalankemahiraninternets' => $soalankemahiraninternet,
        ]);
    }

    public function page1($id_internet)
    {
        $soalankemahiraninternet = Soalankemahiraninternet::where('id', $id_internet)->get()->first();

        // dd($soalankemahiraninternet);
        return view('proses_penilaian.soalan_kemahiran.internet1', [
            'soalankemahiraninternets' => $soalankemahiraninternet,
        ]);
    }

    public function savepage1(Request $request, $id_internet)
    {
        $current_user = $request->user();

        $jawapancalon = new Bankjawapancalon();

        $jawapancalon->url_teks = $request->url_teks;
        $jawapancalon->jawapansebenar_urlteks = $request->jawapansebenar_urlteks;
        if ($jawapancalon->url_teks == $jawapancalon->jawapansebenar_urlteks) {
            $jawapancalon->markah_urlteks = 1;
        } else {
            $jawapancalon->markah_urlteks = 0;
        }
        $jawapancalon->jawapansebenar_carianteks = strtolower($request->jawapansebenar_carianteks);
        $jawapancalon->user_id = $current_user->id;
        $jawapancalon->id_soalankemahiraninternet = $request->id_soalankemahiraninternet;
        $jawapancalon->save();

        return view('proses_penilaian.soalan_kemahiran.internet2', [
            'jawapancalons' => $jawapancalon,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function page2($id)
    // {
    //     $jawapancalon = Bankjawapancalon::find($id);

    //     return view('proses_penilaian.soalan_kemahiran.internet2', [
    //         'jawapancalons' => $jawapancalon,
    //     ]);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function savepage2(Request $request, $id)
    {
        $jawapancalon = Bankjawapancalon::find($id);

        $jawapancalon->carian_teks = strtolower($request->carian_teks);
        if ($jawapancalon->carian_teks == $jawapancalon->jawapansebenar_carianteks) {
            $jawapancalon->markah_carianteks = 1;
        } else {
            $jawapancalon->markah_carianteks = 0;
        }

        $jawapancalon->save();

        return view('proses_penilaian.soalan_kemahiran.internet3', [
            'jawapancalons' => $jawapancalon,
        ]);
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

    public function page3($id)
    {
        $jawapancalon = Bankjawapancalon::join('soalankemahiraninternets', 'bankjawapancalons.id_soalankemahiraninternet', 'soalankemahiraninternets.id')
            ->where('bankjawapancalons.id', $id)
            ->select('bankjawapancalons.*', 'soalankemahiraninternets.*')
            ->get()->first();

        // $soalankemahiraninternet = Soalankemahiraninternet::find($id);

        // dd($soalankemahiraninternet);
        return view('proses_penilaian.soalan_kemahiran.internet4', [
            'jawapancalons' => $jawapancalon,
            // 'soalankemahiraninternets' => $soalankemahiraninternet,
        ]);
    }

    public function page4($id)
    {
        $jawapancalon = Bankjawapancalon::join('soalankemahiraninternets', 'bankjawapancalons.id_soalankemahiraninternet', 'soalankemahiraninternets.id')
            ->where('bankjawapancalons.id_soalankemahiraninternet', $id)
            ->select('bankjawapancalons.*', 'soalankemahiraninternets.*')
            ->get()->first();

        return view('proses_penilaian.soalan_kemahiran.internet5', [
            'jawapancalons' => $jawapancalon,
        ]);
    }

    public function page5($id)
    {
        $jawapancalon = Bankjawapancalon::find($id);

        return view('proses_penilaian.soalan_kemahiran.internet6', [
            'jawapancalons' => $jawapancalon,
        ]);
    }
}
