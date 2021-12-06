<?php

namespace App\Http\Controllers;

use App\Models\RayuanCalonBlacklist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class RayuanCalonBlacklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nric = Auth::user()->nric;
        $group = Auth::user()->user_group_id;
        $role = Role::where('id', $group)->first();
        $role = $role->name;

        if($role == 'calon'){
            $rayuan = RayuanCalonBlacklist::where('ic_calon',$nric)->get();
            return view('rayuan_calon_blacklist.index',[
                'rayuan'=>$rayuan
            ]);
        }
        else{
            $rayuan = RayuanCalonBlacklist::all();
            return view('rayuan_calon_blacklist.index',[
                'rayuan'=>$rayuan
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $calon = Auth::user();
        return view('rayuan_calon_blacklist.create',[
            'calon'=>$calon
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rayuan = new RayuanCalonBlacklist;

        $rules = [
            'nama'=>'required',
            'ic_calon'=>'required',
            'tahap'=>'required',
        ];

        $messages = [
            'nama.required'=>'Sila isi nama penuh anda',
            'ic_calon.required'=>'Sila isi No.My Kad/Polis/Tentera/Pasport anda',
            'tahap.required'=>'Sila pilih tahap penilaian',
        ];

        $rayuan->nama = $request->nama;
        $rayuan->ic_calon = $request->nric;
        $rayuan->tahap = $request->tahap;
        $rayuan->status = 'Baru';

        Validator::make($request->input(), $rules, $messages)->validate();
        $rayuan->save();
        return redirect('/rayuan_calon_blacklist');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RayuanCalonBlacklist  $rayuanCalonBlacklist
     * @return \Illuminate\Http\Response
     */
    public function show(RayuanCalonBlacklist $rayuanCalonBlacklist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RayuanCalonBlacklist  $rayuanCalonBlacklist
     * @return \Illuminate\Http\Response
     */
    public function edit(RayuanCalonBlacklist $rayuan)
    {
        return view('rayuan_calon_blacklist.edit', [
            'rayuan'=>$rayuan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RayuanCalonBlacklist  $rayuanCalonBlacklist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rayuan = RayuanCalonBlacklist::find($id);
        $rayuan->status = $request->status;
        $rayuan->save();
        return redirect('/rayuan_calon_blacklist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RayuanCalonBlacklist  $rayuanCalonBlacklist
     * @return \Illuminate\Http\Response
     */
    public function destroy(RayuanCalonBlacklist $rayuanCalonBlacklist)
    {
        //
    }
}
