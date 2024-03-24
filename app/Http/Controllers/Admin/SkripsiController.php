<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Skripsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SkripsiController extends Controller
{
    public function index()
    {
        $skripsis = Skripsi::latest()->when(request()->q, function($skripsis) {
            $skripsis = $skripsis->where('judul', 'like', '%'. request()->q . '%');
        })->paginate(10);

        return view('admin.skripsi.index', compact('skripsis'));
    }

    public function download($file)
    {
        $path = storage_path('app/public/file/' . $file);
        if (file_exists($path)) {
            return response()->download($path);
        } else {
            abort(404);
        }
    }




    public function create()
    {
        $dosens = Dosen::latest()->get();
        $sekrpod = 2;

        return view('admin.skripsi.create',compact('dosens','sekprod'));

    }

    public function store(Request $request)
    {

        // dd($request->all());
        $this->validate($request, [
            'dosen_id' => 'required',
            'judul_skripsi' => 'required',
            'file' => 'required|file|mimes:pdf,doc,docx'

        ]);
        $file = $request->file('file');
        $file->storeAs('public/file', $file->hashName());

        $skripsi = Skripsi::create([
            'mahasiswa_id' => $request->input('mahasiswa_id'),
            'dosen_id' => $request->input('dosen_id'),
            'judul_skripsi' => $request->input('judul_skripsi'),
            'sekprod_id' => $request->input('sekprod_id'),
            'file'     => $file->hashName()
        ]);

        if($skripsi){
            //redirect dengan pesan sukses
            return redirect()->route('admin.skripsi.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.skripsi.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function show($id)
    {
        $skripsi = Skripsi::findOrFail($id);

        return view('admin.skripsi.show', compact('skripsi'));
    }


    public function edit(Skripsi $skripsi)
    {
        return view('admin.skripsi.edit', compact('skripsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skripsi $skripsi)
    {
        $this->validate($request,[
            'judul_skripsi'       => 'required',
            'file' => 'required|file|mimes:pdf,doc,docx'
        ]);

        if ($request->file('file') == "") {

            $skripsi = Skripsi::findOrFail($skripsi->id);
            $skripsi->update([

                'judul_skripsi'       => $request->input('judul_skripsi'),

            ]);

        } else {

            Storage::disk('local')->delete('public/file/'.$skripsi->file);

            $file = $request->file('file');
            $file->storeAs('public/file', $file->hashName());

            $skripsi = Skripsi::findOrFail($skripsi->id);
            $skripsi->update([
                'file'       => $file->hashName(),
                'judul_skripsi'       => $request->input('judul_skripsi'),

            ]);

        }

        if($skripsi){
            //redirect dengan pesan sukses
            return redirect()->route('admin.post.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.post.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skripsi = Skripsi::findOrFail($id);
        $skripsi->delete();

        if($skripsi){
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}
