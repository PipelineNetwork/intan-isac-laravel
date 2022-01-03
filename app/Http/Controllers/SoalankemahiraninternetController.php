<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bankjawapancalon;
use App\Models\Soalankemahiraninternet;
use Illuminate\Support\Facades\Auth;

class SoalankemahiraninternetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_penilaian)
    {
        $jawapancalon = Bankjawapancalon::all();
        $soalankemahiraninternet = Soalankemahiraninternet::where('status_soalan', 1)->inRandomOrder()->limit(1)->get();
        $id_penilaian = $id_penilaian;
        // dd($id_penilaian);
        // dd($soalankemahiraninternet);
        return view('proses_penilaian.soalan_kemahiran.internet', [
            'jawapancalons' => $jawapancalon,
            'soalankemahiraninternets' => $soalankemahiraninternet,
            'id_penilaian' => $id_penilaian
        ]);
    }

    public function page1($id_penilaian, $id_internet)
    {
        $soalankemahiraninternet = Soalankemahiraninternet::where('id', $id_internet)->get()->first();
        $id_penilaian = $id_penilaian;

        // dd($soalankemahiraninternet);
        return view('proses_penilaian.soalan_kemahiran.internet1', [
            'soalankemahiraninternets' => $soalankemahiraninternet,
            'id_penilaian' => $id_penilaian,
            'id_internet' => $id_internet
        ]);
    }

    public function savepage1(Request $request, $id_penilaian, $id_internet)
    {
        $current_user = $request->user();

        // $jawapancalon = new Bankjawapancalon();

        // $jawapancalon->url_teks = $request->url_teks;
        // $jawapancalon->jawapansebenar_urlteks = $request->jawapansebenar_urlteks;
        // if ($jawapancalon->url_teks == $jawapancalon->jawapansebenar_urlteks) {
        //     $jawapancalon->markah_urlteks = 1;
        // } else {
        //     $jawapancalon->markah_urlteks = 0;
        // }
        // $jawapancalon->jawapansebenar_carianteks = strtolower($request->jawapansebenar_carianteks);
        // $jawapancalon->user_id = $current_user->id;
        // $jawapancalon->id_soalankemahiraninternet = $id_internet;
        // $jawapancalon->id_penilaian = $id_penilaian;
        // $jawapancalon->ic_calon = Auth::user()->nric;
        // $jawapancalon->save();

        $url_teks = $request->url_teks;
        $jawapansebenar_urlteks = $request->jawapansebenar_urlteks;
        if ($url_teks == $jawapansebenar_urlteks) {
            $markah_urlteks = 1;
        } else {
            $markah_urlteks = 0;
        }
        $jawapansebenar_carianteks = strtolower($request->jawapansebenar_carianteks);
        $user_id = $current_user->id;
        $id_soalankemahiraninternet = $id_internet;
        $ic_calon = Auth::user()->nric;
        $url_wikipedia = $request->url_wikipedia;

        $id_penilaian = $id_penilaian;

        // dd($url_teks,$jawapansebenar_urlteks,$markah_urlteks,$jawapansebenar_carianteks,$user_id,$id_soalankemahiraninternet,$ic_calon,$id_penilaian, $url_wikipedia);
        return view('proses_penilaian.soalan_kemahiran.internet2', [
            // 'jawapancalons' => $jawapancalon,
            'url_teks' => $url_teks,
            'jawapansebenar_urlteks' => $jawapansebenar_urlteks,
            'markah_urlteks' => $markah_urlteks,
            'jawapansebenar_carianteks' => $jawapansebenar_carianteks,
            'user_id' => $user_id,
            'url_wikipedia' => $url_wikipedia,
            'id_soalankemahiraninternet' => $id_soalankemahiraninternet,
            'ic_calon' => $ic_calon,
            'id_penilaian' => $id_penilaian,
            'id_internet' => $id_internet
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
    public function savepage2(Request $request, $id_penilaian, $id_internet)
    {
        // $current_user = $request->user();
        // $jawapancalon = Bankjawapancalon::where('id_soalankemahiraninternet', $id_internet)->first();
        // $jawapancalon = Bankjawapancalon::where('id_penilaian', $id_penilaian)->where('ic_calon', $current_user->nric)->first();
        // dd($jawapancalon);
        $tukar_lowercase = $request->carianteks;
        // $jawapancalon->carian_teks = strtolower($tukar_lowercase);
        // if ($jawapancalon->carian_teks == $jawapancalon->jawapansebenar_carianteks) {
        //     $jawapancalon->markah_carianteks = 1;
        // } else {
        //     $jawapancalon->markah_carianteks = 0;
        // }
        // $jawapancalon->save();
        $url_teks = $request->url_teks;
        $jawapansebenar_urlteks = $request->jawapansebenar_urlteks;
        $markah_urlteks = $request->markah_urlteks;
        $markah_urlteks = $request->markah_urlteks;
        $jawapansebenar_carianteks = $request->jawapansebenar_carianteks;
        $url_wikipedia = $request->url_wikipedia;
        $user_id = $request->user_id;
        $id_internet = $id_internet;
        $ic_calon = Auth::user()->nric;
        $carian_teks = strtolower($tukar_lowercase);
        if ($carian_teks == $jawapansebenar_carianteks) {
            $markah_carianteks = 1;
        } else {
            $markah_carianteks = 0;
        }
        $url_wikipedia = $request->url_wikipedia;

        // dd($url_teks, $jawapansebenar_urlteks, $markah_urlteks, $carian_teks, $jawapansebenar_carianteks, $markah_carianteks, $user_id, $id_internet, $ic_calon, $id_penilaian);
        return view('proses_penilaian.soalan_kemahiran.internet3', [
            'id_penilaian' => $id_penilaian,
            'id_internet' => $id_internet,
            'url_teks' => $url_teks,
            'jawapansebenar_urlteks' => $jawapansebenar_urlteks,
            'markah_urlteks' => $markah_urlteks,
            'carian_teks' => $carian_teks,
            'jawapansebenar_carianteks' => $jawapansebenar_carianteks,
            'user_id' => $user_id,
            'ic_calon' => $ic_calon,
            'markah_carianteks' => $markah_carianteks,
            'url_wikipedia' => $url_wikipedia
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

    public function page3(Request $request, $id_penilaian, $id_internet)
    {
        // $jawapancalon = Bankjawapancalon::join('soalankemahiraninternets', 'bankjawapancalons.id_soalankemahiraninternet', 'soalankemahiraninternets.id')
        //     ->where('id_soalankemahiraninternet', $id_internet)
        //     ->get()->first();

        $url_teks = $request->url_teks;
        $jawapansebenar_urlteks = $request->jawapansebenar_urlteks;
        $markah_urlteks = $request->markah_urlteks;
        $markah_urlteks = $request->markah_urlteks;
        $jawapansebenar_carianteks = $request->jawapansebenar_carianteks;
        $url_wikipedia = $request->url_wikipedia;
        $user_id = $request->user_id;
        $id_internet = $id_internet;
        $ic_calon = Auth::user()->nric;
        $carian_teks = $request->carian_teks;
        $markah_carianteks = $request->markah_carianteks;
        $url_wikipedia = $request->url_wikipedia;

        // dd($url_teks, $jawapansebenar_urlteks, $markah_urlteks, $carian_teks, $jawapansebenar_carianteks, $markah_carianteks, $user_id, $id_internet, $ic_calon, $id_penilaian);
        return view('proses_penilaian.soalan_kemahiran.internet4', [
            // 'jawapancalons' => $jawapancalon,
            'id_penilaian' => $id_penilaian,
            'id_internet' => $id_internet,
            'url_teks' => $url_teks,
            'jawapansebenar_urlteks' => $jawapansebenar_urlteks,
            'markah_urlteks' => $markah_urlteks,
            'carian_teks' => $carian_teks,
            'jawapansebenar_carianteks' => $jawapansebenar_carianteks,
            'user_id' => $user_id,
            'ic_calon' => $ic_calon,
            'markah_carianteks' => $markah_carianteks,
            'url_wikipedia' => $url_wikipedia
        ]);
    }

    public function page4(Request $request, $id_penilaian, $id_internet)
    {
        // $jawapancalon = Bankjawapancalon::join('soalankemahiraninternets', 'bankjawapancalons.id_soalankemahiraninternet', 'soalankemahiraninternets.id')
        //     ->where('id_soalankemahiraninternet', $id_internet)
        //     ->get()->first();

        $url_teks = $request->url_teks;
        $jawapansebenar_urlteks = $request->jawapansebenar_urlteks;
        $markah_urlteks = $request->markah_urlteks;
        $markah_urlteks = $request->markah_urlteks;
        $jawapansebenar_carianteks = $request->jawapansebenar_carianteks;
        $url_wikipedia = $request->url_wikipedia;
        $user_id = $request->user_id;
        $id_internet = $id_internet;
        $ic_calon = Auth::user()->nric;
        $carian_teks = $request->carian_teks;
        $markah_carianteks = $request->markah_carianteks;
        $url_wikipedia = $request->url_wikipedia;

        // dd($url_teks, $jawapansebenar_urlteks, $markah_urlteks, $carian_teks, $jawapansebenar_carianteks, $markah_carianteks, $user_id, $id_internet, $ic_calon, $id_penilaian);
        return view('proses_penilaian.soalan_kemahiran.internet5', [
            // 'jawapancalons' => $jawapancalon,
            'id_penilaian' => $id_penilaian,
            'id_internet' => $id_internet,
            'url_teks' => $url_teks,
            'jawapansebenar_urlteks' => $jawapansebenar_urlteks,
            'markah_urlteks' => $markah_urlteks,
            'carian_teks' => $carian_teks,
            'jawapansebenar_carianteks' => $jawapansebenar_carianteks,
            'user_id' => $user_id,
            'ic_calon' => $ic_calon,
            'markah_carianteks' => $markah_carianteks,
            'url_wikipedia' => $url_wikipedia
        ]);
    }

    public function page5(Request $request, $id_penilaian, $id_internet)
    {
        $jawapancalon = new Bankjawapancalon();

        $jawapancalon->url_teks = $request->url_teks;
        $jawapancalon->jawapansebenar_urlteks = $request->jawapansebenar_urlteks;
        $jawapancalon->markah_urlteks = $request->markah_urlteks;
        $jawapancalon->carian_teks = $request->carian_teks;
        $jawapancalon->jawapansebenar_carianteks = $request->jawapansebenar_carianteks;
        $jawapancalon->markah_carianteks = $request->markah_carianteks;
        $jawapancalon->user_id = $request->user_id;
        $jawapancalon->id_soalankemahiraninternet = $id_internet;
        $jawapancalon->id_penilaian = $id_penilaian;
        $jawapancalon->ic_calon = Auth::user()->nric;

        // dd($url_teks, $jawapansebenar_urlteks, $markah_urlteks, $carian_teks, $jawapansebenar_carianteks, $markah_carianteks, $user_id, $id_internet, $ic_calon, $id_penilaian);
        $jawapancalon->save();
        return view('proses_penilaian.soalan_kemahiran.internet6', [
            'jawapancalons' => $jawapancalon,
            'id_penilaian' => $id_penilaian,
            'id_internet' => $id_internet,
        ]);
    }
}
