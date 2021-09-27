<?php

namespace App\Http\Controllers;

use App\Models\TambahRayuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RayuanDicipta;
use App\Models\User;

class TambahRayuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tambahrayuans = TambahRayuan::all();
        return view('tambahrayuan.index', [
            'tambahrayuans' => $tambahrayuans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambahrayuan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tajuk' => 'required',

        ]);
        $file_rayuan_send = $request->file('file_rayuan_send')->store('dokumen');

        $tambahrayuan = new TambahRayuan;
        $tambahrayuan->id = $request->id;
        $tambahrayuan->tajuk = $request->tajuk;
        $tambahrayuan->keterangan_rayuan_send = $request->keterangan_rayuan_send;
        $tambahrayuan->file_rayuan_send = $file_rayuan_send;
        $tambahrayuan->status = "baru";

        $tambahrayuan->save();

        $users = User::where('user_group_id', '=', '1')->get();
        foreach ($users as $user) {
            Mail::to($user->email)->send(new RayuanDicipta($tambahrayuan));
        }

        return redirect('/tambahrayuans');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TambahRayuan  $tambahRayuan
     * @return \Illuminate\Http\Response
     */
    public function show(TambahRayuan $tambahRayuan)
    {
        return view('tambahrayuan.show', [
            'tambahrayuan' => $tambahRayuan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TambahRayuan  $tambahRayuan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tambahRayuan = TambahRayuan::where('id', $id)->first();
        return view('tambahrayuan.edit', ['tambahrayuan' => $tambahRayuan, 'id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TambahRayuan  $tambahRayuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TambahRayuan $tambahRayuan)
    {
        $tambahrayuan = TambahRayuan::where('id', $request->id)->first();
        $file_rayuan_reply = $request->file('file_rayuan_reply')->store('dokumen');
        $tambahrayuan->keterangan_rayuan_reply = $request->keterangan_rayuan_reply;
        $tambahrayuan->file_rayuan_reply = $file_rayuan_reply;
        $tambahrayuan->status = "dibalas";

        $tambahrayuan->save();
        return redirect('/tambahrayuans');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TambahRayuan  $tambahRayuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(TambahRayuan $tambahRayuan)
    {
        //
    }
}
