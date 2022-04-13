<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanCutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pengajuan.index', [
            'name' => Auth::user()->name,
            'id' => Auth::user()->id,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $request->validate([
            'id_users' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'jenis_cuti' => 'required',
            'keterangan' => 'required',
            'bukti' => 'required',
            'nip' => 'required',
        ]);

        // upload file
        $file = $request->file('bukti');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload, $nama_file);

        //insert data
        $cuti = new Cuti();
        $cuti->id_users = $request->id_users;
        $cuti->tanggal_mulai = $request->tanggal_mulai;
        $cuti->tanggal_selesai = $request->tanggal_selesai;
        $cuti->jenis_cuti = $request->jenis_cuti;
        $cuti->keterangan = $request->keterangan;
        $cuti->bukti_cuti = $request->bukti;
        $cuti->nip = $request->nip;
        $cuti->save();

        return redirect('/pengajuan')->with('status', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    public function show(Cuti $cuti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    public function edit(Cuti $cuti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cuti $cuti)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cuti $cuti)
    {
        //
    }
}
