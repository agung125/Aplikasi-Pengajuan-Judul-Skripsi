<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class MahasiswaController extends Controller
{

    public function index()
    {
        $mahasiswas = Mahasiswa::latest()->when(request()->q, function($mahasiswas) {
            $mahasiswas = $mahasiswas->where('title', 'like', '%'. request()->q . '%');
        })->paginate(10);

        return view('admin.mahasiswa.index', compact('mahasiswas'));
    }


    public function create()
    {
        $roles = Role::latest()->get();
        $lastMahasiswa = Mahasiswa::orderBy('nim', 'desc')->first();
        $mahasiswa_id = $lastMahasiswa ? $lastMahasiswa->nim + 1 : 2301;

        // return $mahasiswa_id;


        return view('admin.mahasiswa.create',compact('roles','mahasiswa_id'));
    }

    public function store(Request $request)
    {

        // dd($request->all());

        $this->validate($request, [

            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'total_sks' => 'required',
        ]);


        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'user_id' => null,
        ]);

        // return $user;


        $user->assignRole($request->input('role'));

        $mahasiswa = new Mahasiswa();
        $mahasiswa->mahasiswa_id = $user->id;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama_mahasiswa = $user->name;
        $mahasiswa->total_sks = $request->input('total_sks');
        if ($mahasiswa->total_sks >= 110) {
            $mahasiswa->status_matkul = 'lulus';
        } else {
            $mahasiswa->status_matkul = 'tidak lulus';
            $mahasiswa->save();
            $mahasiswa->invoice = 'Jumlah SKS mata kuliah Metodologi Penelitian tidak mencukupi';
        }
        $mahasiswa->save();

        $user->user_id = $mahasiswa->id;
        $user->save();



        if ($mahasiswa) {
            // Redirect dengan pesan sukses
            return redirect()->route('admin.mahasiswa.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            // Redirect dengan pesan error
            return redirect()->route('admin.mahasiswa.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('admin.mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mahasiswa $mahasiswa)
    {
        $this->validate($request, [

            'nama_mahasiswa' => 'required',
            'status' => 'required',
            'total_sks' => 'required'
        ]);

        $mahasiswa = Mahasiswa::findOrFail($mahasiswa->id);
        $mahasiswa->update([
            'nama_mahasiswa' => $request->input('nama_mahasiswa'),
            'status' => $request->input('status'),
            'total_sks' => $request->input('total_sks'),
        ]);

        if($mahasiswa){
            //redirect dengan pesan sukses
            return redirect()->route('admin.mahasiswa.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.mahasiswa.index')->with(['error' => 'Data Gagal Diupdate!']);
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
        $mahasiswa = mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        if($mahasiswa){
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
