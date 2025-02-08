<?php

namespace App\Http\Controllers;

use App\Models\local;
use App\Models\Siswa;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index():view
    {
        $datasiswa= Siswa::all();
        return view('siswa.index',[
            'menu'=>'siswa',
            'title'=>'Data Siswa',
            'datasiswa'=>$datasiswa
        ]);
    }
    public function create():view
    {
        $kelas = local::all();
        return view('siswa.create', [
            'menu' => 'siswa',
            'title' => 'Tambah Data Siswa',
            'kelas' => $kelas
        ]);
    }
    public function store(Request $request):RedirectResponse
    {
        $validasi=$request->validate([
            'nama'=>'required',
            'nisn'=>'required',
            'jk'=>'required',
            'alamat'=>'required',
            'local_id'=>'required',
            'foto'=>'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ],[
            'nama.required'=>'Nama Harus Diisi',
            'nisn.required'=>'NISN Harus Diisi',
            'jk.required'=>'Jenis Kelamin Harus Diisi',
            'alamat.required'=>'Alamat Harus Diisi',
            'local_id.required'=>'Kelas Harus Diisi',
            'foto.image'=>'File Harus Berupa Gambar',
            'foto.mimes'=>'Format File Harus jpg,png,jpeg,gif,svg',
            'foto.max'=>'Ukuran File Maksimal 2MB'
        ]);

        $simpan_foto=$request->file('foto')->store('foto_siswa');

        $siswa=new Siswa;
        $siswa->nama=$validasi['nama'];
        $siswa->nisn=$validasi['nisn'];
        $siswa->jk=$validasi['jk'];
        $siswa->alamat=$validasi['alamat'];
        $siswa->local_id=$validasi['local_id'];
        $siswa->foto=$simpan_foto;
        $siswa->save();
        return redirect(route('siswa.index'));
    }
}
