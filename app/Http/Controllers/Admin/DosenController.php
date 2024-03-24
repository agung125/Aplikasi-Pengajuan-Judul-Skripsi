<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Skripsi;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class DosenController extends Controller
{
    public function index()
    {
        $dosens = Dosen::latest()->when(request()->q, function($dosens) {
            $dosens = $dosens->where('nama_dosen', 'like', '%'. request()->q . '%');
        })->paginate(10);

        return view('admin.dosen.index', compact('dosens'));
    }


    public function create()
    {
        $roles = Role::latest()->get();

        return view('admin.dosen.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'nipy' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);


        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'user_id' => null,
        ]);

        $user->assignRole($request->input('role'));

        $dosen = new Dosen();
        $dosen->dosen_id = $user->id;
        $dosen->nama_dosen = $user->name;
        $dosen->nipy =  $request->input('nipy');
        $dosen->save();

        $user->user_id = $dosen->id;
        $user->save();



        if ($dosen) {
            // Redirect dengan pesan sukses
            return redirect()->route('admin.dosen.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            // Redirect dengan pesan error
            return redirect()->route('admin.dosen.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit(dosen $dosen)
    {
        return view('admin.dosen.edit', compact('dosen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dosen $dosen)
    {
        $this->validate($request, [
            'nama_dosen' => 'required',
            'nipy' => 'required'
        ]);

        $dosen = dosen::findOrFail($dosen->id);
        $dosen->update([
            'nama_dosen' => $request->input('nama_dosen'),
            'nipy' => $request->input('nipy'),

        ]);

        if($dosen){
            //redirect dengan pesan sukses
            return redirect()->route('admin.dosen.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.dosen.index')->with(['error' => 'Data Gagal Diupdate!']);
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
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();

        if($dosen){
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'error'
            ]);
        }
    }


    public function setujui($skripsiId)
    {
        $skripsi = Skripsi::findOrFail($skripsiId);


        $skripsi->user_approve_1_id = auth()->user()->id;
        $skripsi->invoice = 'Dosen : Judul sudah sesuai';
        $skripsi->save();

        return redirect()->back()->with('success', 'Skripsi berhasil disetujui');
    }

    public function tolak($skripsiId)
    {
        $skripsi = Skripsi::findOrFail($skripsiId);


        $skripsi->user_approve_1_id = auth()->user()->id;
        $skripsi->invoice = 'Dosen : Judul tidak sesuai';
        $skripsi->save();

        return redirect()->back()->with('success', 'Skripsi berhasil ditolak ');
    }


}
