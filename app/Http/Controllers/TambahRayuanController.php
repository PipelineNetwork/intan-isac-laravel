<?php

namespace App\Http\Controllers;

use App\Models\TambahRayuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RayuanDicipta;
use App\Mail\RayuanDibalas;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class TambahRayuanController extends Controller
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
        // $tambahrayuans = TambahRayuan::all();

        $current_user = Auth::user()->id;
        $user_role = Auth::user()->user_group_id;
        $role = Role::where('id', $user_role)->first();
        $role = $role->name;

        if ($role == 'calon'){
            $tambahrayuans = TambahRayuan::where('user_id', $current_user)
                ->join('users', 'tambah_rayuans.user_id', 'users.id')
                ->select('tambah_rayuans.*', 'users.name', 'users.email')
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $tambahrayuans = TambahRayuan::join('users', 'tambah_rayuans.user_id', 'users.id')
                ->select('tambah_rayuans.*', 'users.name', 'users.email')
                ->orderBy('created_at', 'desc')
                ->get();
        }

        if (Auth::check()) {
            return view('tambahrayuan.index', [
                'tambahrayuans' => $tambahrayuans
            ]);
        } else {

            return redirect('/')->with('warning', 'Sila log masuk untuk lihat Rayuan!');
        }
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
        $request->validate([
            'tajuk' => 'required',
            'file_rayuan_send' => 'required|mimes:pdf|max:5128'
        ]);

        $file_rayuan_send = $request->file('file_rayuan_send')->store('dokumen');

        $current_user = $request->user();

        $tambahrayuan = new TambahRayuan;
        $tambahrayuan->id = $request->id;
        $tambahrayuan->tajuk = $request->tajuk;
        $tambahrayuan->keterangan_rayuan_send = $request->keterangan_rayuan_send;
        $tambahrayuan->file_rayuan_send = $file_rayuan_send;
        $tambahrayuan->status = "baru";
        $tambahrayuan->user_id = $current_user->id;

        $tambahrayuan->save();

        $users = User::where('user_group_id', '=', '1')->get();
        foreach ($users as $user) {
            Mail::to($user->email)->send(new RayuanDibalas($tambahrayuan));
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
        $request->validate([
            'file_rayuan_reply' => 'max:5128'
        ]);

        $tambahrayuan = TambahRayuan::where('id', $request->id)->first();
        if (!empty($request->file('file_rayuan_reply'))) {
            $file_rayuan_reply = $request->file('file_rayuan_reply')->store('dokumen');
        }
        $tambahrayuan->keterangan_rayuan_reply = $request->keterangan_rayuan_reply;
        if (!empty($request->file('file_rayuan_reply'))) {
            $tambahrayuan->file_rayuan_reply = $file_rayuan_reply;
        }
        // $file_rayuan_reply = $request->file('file_rayuan_reply')->store('dokumen');
        $tambahrayuan->keterangan_rayuan_reply = $request->keterangan_rayuan_reply;
        // $tambahrayuan->file_rayuan_reply = $file_rayuan_reply;
        $tambahrayuan->status = "dibalas";
        $tambahrayuan->save();

        $user = User::where('id', '=', $tambahrayuan->user_id)
            ->select('email')
            ->get();

        Mail::to($user)->send(new RayuanDibalas($tambahrayuan));
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
