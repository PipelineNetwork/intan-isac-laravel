<?php

namespace App\Http\Controllers;

use App\Models\MarkahSoalanKemahiran;
use Illuminate\Http\Request;

class MarkahSoalanKemahiranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $markah_soalan_kemahiran = MarkahSoalanKemahiran::all();

        return view('bank_soalan.soalan_kemahiran.markah_kemahiran.markah_soalan_kemahiran', [
            'markah_soalan_kemahirans' => $markah_soalan_kemahiran
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bank_soalan.soalan_kemahiran.markah_kemahiran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $markah_soalan_kemahiran = new MarkahSoalanKemahiran();

        $markah_soalan_kemahiran->markah_internet = $request->markah_internet;
        $markah_soalan_kemahiran->markah_word = $request->markah_word;
        $markah_soalan_kemahiran->markah_email = $request->markah_email;

        $markah_soalan_kemahiran->save();

        return redirect('/markah_soalan_kemahiran');
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
    public function edit($id)
    {
        $markah_soalan_kemahiran = MarkahSoalanKemahiran::find($id);
        return view('bank_soalan.soalan_kemahiran.markah_kemahiran.edit',[
            'markah_soalan_kemahirans' => $markah_soalan_kemahiran
        ]);
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
        $markah_soalan_kemahiran = MarkahSoalanKemahiran::find($id);

        $markah_soalan_kemahiran->markah_internet = $request->markah_internet;
        $markah_soalan_kemahiran->markah_word = $request->markah_word;
        $markah_soalan_kemahiran->markah_email = $request->markah_email;

        $markah_soalan_kemahiran->save();

        return redirect('/markah_soalan_kemahiran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $markah_soalan_kemahiran = MarkahSoalanKemahiran::find($id);

        $markah_soalan_kemahiran->delete();

        return redirect('/markah_soalan_kemahiran');
    }
}
