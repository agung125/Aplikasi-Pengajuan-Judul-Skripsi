<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skripsi;
use Illuminate\Http\Request;

class SekproController extends Controller
{

    public function setujui($skripsiId)
    {
        $skripsi = Skripsi::findOrFail($skripsiId);

        $skripsi->user_approve_2_id = auth()->user()->id;
        $skripsi->invoice = 'Sekpro : Berkas Sudah Sesuai';
        $skripsi->save();

        return redirect()->back()->with('success', 'Skripsi berhasil disetujui');
    }

    public function tolak($skripsiId)
    {
        $skripsi = Skripsi::findOrFail($skripsiId);

        $skripsi->user_approve_2_id = auth()->user()->id;
        $skripsi->invoice = 'Sekpro Berkas tidak sesuai';
        $skripsi->save();

        return redirect()->back()->with('success', 'Skripsi berhasil ditolak ');
    }

}
