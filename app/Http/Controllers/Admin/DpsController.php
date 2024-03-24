<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Dps;
use App\Models\Skripsi;
use App\Models\User;
use Illuminate\Http\Request;

class DpsController extends Controller
{
    public function index()
    {
        $dpss = Dps::latest()->when(request()->q, function($dpss) {
            $dpss = $dpss->where('created_at', 'like', '%'. request()->q . '%');
        })->paginate(5);

        return view('admin.dps.index', compact('dpss'));
    }

    public function show($id)
    {
        $skripsi = Skripsi::findOrFail($id);
        $dosen = Dosen::get();

        return view('admin.dps.show', compact('skripsi','dosen'));
    }

    public function cetak($id)
    {
        $dps = Dps::findOrFail($id);

        $kaprod = 3;
        $user = User::findOrFail($kaprod);

        return view('admin.dps.cetak', compact('dps','user'));
    }

    public function store(Request $request)
    {

        // dd($request->all());
        $this->validate($request, [

            'dosen_id' => 'required',

        ]);

        $dps = Dps::create([
            'mahasiswa_id' => $request->input('mahasiswa_id'),
            'judul_skripsi' => $request->input('judul_skripsi'),
            'dosen_id' => $request->input('dosen_id'),

        ]);

        if($dps){

            return redirect()->route('admin.dps.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{

            return redirect()->route('admin.dps.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit(Dps $dps)
    {

        return view('admin.dps.edit', compact('dps'));
    }

    public function update(Request $request, Dps $dps)
    {
        $this->validate($request, [
            'dosen_id' => 'required',

        ]);

        $dps = Dps::findOrFail($dps->id);
        $dps->update([
            'dosen_id' => $request->input('dosen_id'),

        ]);

        if($dps){
            //redirect dengan pesan sukses
            return redirect()->route('admin.dps.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.dps.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }


}
