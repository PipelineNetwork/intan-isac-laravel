<?php

namespace App\Http\Controllers;

use App\Models\TambahAduan;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Mail;
use App\Mail\AduanDicipta;
use App\Mail\AduanDibalas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class TambahAduanController extends Controller
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
        $current_user = Auth::user()->id;
        $user_role = Auth::user()->user_group_id;
        $role = Role::where('id', $user_role)->first();
        $role = $role->name;

        if ($role == 'calon') {
            $tambahaduans = TambahAduan::where('user_id', $current_user)
                ->join('users', 'tambah_aduans.user_id', 'users.id')
                ->select('tambah_aduans.*', 'users.name', 'users.email')
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $tambahaduans = TambahAduan::join('users', 'tambah_aduans.user_id', 'users.id')
                ->select('tambah_aduans.*', 'users.name', 'users.email')
                ->orderBy('created_at', 'desc')
                ->get();
        }
        // dd($tambahaduans);
        if (Auth::check()) {
            return view('tambahaduan.index', [
                'tambahaduans' => $tambahaduans
            ]);
        } else {
            alert()->warning('Sila log masuk untuk lihat Aduan!');
            return redirect('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambahaduan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tajuk' => 'required',
            'file_aduan_send' => 'max:5128',
        ]);

        $current_user = $request->user();

        if (!empty($request->file('file_aduan_send'))) {
            $file_aduan_send = $request->file('file_aduan_send')->store('dokumen');
        }

        $tambahaduan = new TambahAduan;
        if (!empty($request->file('file_aduan_send'))) {
            $tambahaduan->file_aduan_send = $file_aduan_send;
        }
        $tambahaduan->id = $request->id;
        $tambahaduan->tajuk = $request->tajuk;
        $tambahaduan->keterangan_aduan_send = $request->keterangan_aduan_send;
        $tambahaduan->status = "baru";
        $tambahaduan->user_id = $current_user->id;
        $tambahaduan->save();

        $tambahaduan = TambahAduan::join('users', 'tambah_aduans.user_id', 'users.id')
            ->join('pro_peserta', 'users.nric', 'pro_peserta.NO_KAD_PENGENALAN')
            ->select('tambah_aduans.*', 'users.id', 'users.nric', 'pro_peserta.NAMA_PESERTA', 'pro_peserta.NO_KAD_PENGENALAN')
            ->where('users.id', $current_user->id)
            ->get()->first();

        // dd($tambahaduan);
        $users = User::where('user_group_id', '=', '1')->get();
        foreach ($users as $user) {
            Mail::to($user->email)->send(new AduanDicipta($tambahaduan));
        }

        return redirect('/tambahaduans');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TambahAduan  $tambahAduan
     * @return \Illuminate\Http\Response
     */
    public function show(TambahAduan $tambahAduan)
    {
        return view('tambahaduan.show', [
            'tambahaduan' => $tambahAduan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TambahAduan  $tambahAduan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tambahAduan = TambahAduan::where('id', $id)->first();
        return view('tambahaduan.edit', ['tambahaduan' => $tambahAduan, 'id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TambahAduan  $tambahAduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TambahAduan $tambahaduan)
    {
        $request->validate([
            'file_aduan_reply' => 'max:5128',
        ]);

        $tambahaduan = TambahAduan::where('id', $request->id)->first();
        if (!empty($request->file('file_aduan_reply'))) {
            $file_aduan_reply = $request->file('file_aduan_reply')->store('dokumen');
        }
        $tambahaduan->keterangan_aduan_reply = $request->keterangan_aduan_reply;
        if (!empty($request->file('file_aduan_reply'))) {
            $tambahaduan->file_aduan_reply = $file_aduan_reply;
        }
        $tambahaduan->status = "dibalas";
        $tambahaduan->user_id = $request->user_id;
        $tambahaduan->save();

        $user = User::where('users.id', '=', $tambahaduan->user_id)
            ->get()->first();

        // dd($user);
        Mail::to($user->email)->send(new AduanDibalas($tambahaduan));

        return redirect('/tambahaduans');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TambahAduan  $tambahAduan
     * @return \Illuminate\Http\Response
     */
    public function destroy($tambahAduan)
    {
        $tambahaduan = TambahAduan::find($tambahAduan);

        $tambahaduan->delete();
        return redirect('/tambahaduans');
    }
}
