<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Absen;
use App\Kelas;
use App\Siswa;

class AbsenController extends Controller
{
    public function index(Request $request)
    {
        $date = Carbon::now()->toDateString();
        $kelas = Kelas::get();
        return view('absen.index', compact('kelas', 'date'));
    }

    public function view_siswa($id_kelas, $date)
    {
        $siswa = Siswa::where('id_kelas', $id_kelas)->get();
        return view('absen.view_siswa', compact('siswa', 'date','id_kelas'));
    }

    public function view_absen(Request $request, $id_kelas)
    {
        $date = $request->date ? $request->date : Carbon::now()->toDateString();

        $absen = Absen::join('siswa', 'absen.id_siswa', '=', 'siswa.id_siswa')
                        ->join('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')
                        ->where('siswa.id_kelas', $id_kelas)
                        ->whereDate('tanggal', $date)
                        ->select('absen.*', 'siswa.nama', 'kelas.nama_kelas')
                        ->get();
        $kelas = Kelas::where('id_kelas', $id_kelas)->first();
        return view('absen.view_absen', compact('absen', 'kelas', 'date'));
    }

    public function add(Request $request)
    {
        $data = [
            'keterangan' => $request->keterangan,
            'status'    => $request->stat,
        ];
        $compare = [
            'tanggal' => $request->tanggal,
            'id_siswa' => $request->id_siswa,
        ];

        Absen::updateOrInsert($compare,$data);

        return response()->json(['stat' => $request->stat,'ket' => $request->keterangan]);
    }

    public function del($id)
    {
        Absen::destroy($id);
        return redirect()->back()->with('info','Berhasil Menghapus Data');
    }
}
