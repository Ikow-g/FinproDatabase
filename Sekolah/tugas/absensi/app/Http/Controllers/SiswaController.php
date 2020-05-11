<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Kelas;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::get();
        $kelas = Kelas::get();
        return view('siswa.index',compact('siswa','kelas'));
    }

    public function add(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'no_hp' =>$request->nomor,
            'id_kelas' =>$request->kelas,
        ];

        Siswa::create($data);

        return redirect()->back()->with('info','Berhasil Menambahkan Data');
    }

    public function update(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'no_hp' =>$request->nomor,
            'id_kelas' =>$request->kelas,
        ];
        Siswa::find($request->id)->update($data);
        return redirect()->back()->with('info','Berhasil Mengubah Data');
    }

    public function delete($id_siswa)
    {
        Siswa::destroy($id_siswa);
        return redirect()->back()->with('info','Berhasil Menghapus Data');
    }
}
