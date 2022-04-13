<?php

namespace App\Http\Controllers;

use App\Models\Cuti;

class StatusPengajuan extends Controller
{
    public function index()
    {
        return view('pengajuan.status_pengajuan', [
            'data' => Cuti::all(),
        ]);
    }
}
