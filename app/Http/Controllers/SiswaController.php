<?php

namespace App\Http\Controllers;

use App\Models\local;
use App\Models\Siswa;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(): view
    {
        $datasiswa = Siswa::all();
        return view('siswa.index', [
            'menu' => 'siswa',
            'title' => 'Data Siswa',
            'datasiswa' => $datasiswa
        ]);
    }

    public function create(): view
    {
        $kelas = local::all();
        return view('siswa.create', [
            'menu' => 'siswa',
            'title' => 'Tambah Data Siswa',
            'kelas' => $kelas
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validasi = $request->validate([
            'nama' => 'required',
            'nisn' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'local_id' => 'required',
            'foto' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ], [
            'nama.required' => 'Nama Harus Diisi',
            'nisn.required' => 'NISN Harus Diisi',
            'jk.required' => 'Jenis Kelamin Harus Diisi',
            'alamat.required' => 'Alamat Harus Diisi',
            'local_id.required' => 'Kelas Harus Diisi',
            'foto.image' => 'File Harus Berupa Gambar',
            'foto.mimes' => 'Format File Harus jpg,png,jpeg,gif,svg',
            'foto.max' => 'Ukuran File Maksimal 2MB'
        ]);

        $simpan_foto = $request->file('foto')->store('foto_siswa');

        $siswa = new Siswa;
        $siswa->nama = $validasi['nama'];
        $siswa->nisn = $validasi['nisn'];
        $siswa->jk = $validasi['jk'];
        $siswa->alamat = $validasi['alamat'];
        $siswa->nohp = $validasi['nohp'];
        $siswa->local_id = $validasi['local_id'];
        $siswa->foto = $simpan_foto;
        $siswa->save();
        return redirect(route('siswa.index'));
    }

    public function show($id): view
    {
        $siswa = Siswa::find($id);
        return view('siswa.show', [
            'menu' => 'siswa',
            'title' => 'Detail Data Siswa',
            'siswa' => $siswa
        ]);
    }

    public function edit($id): view
    {
        $siswa = Siswa::with('local')->find($id);
        $kelas = Local::all();
        return view('siswa.edit', [
            'menu' => 'siswa',
            'title' => 'Edit Data Siswa',
            'siswa' => $siswa,
            'dtkelas' => $kelas
        ]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $validasi = $request->validate([
            'nama' => 'nullable',
            'nisn' => 'nullable',
            'jk' => 'nullable',
            'alamat' => 'nullable',
            'nohp' => 'nullable',
            'local_id' => 'nullable',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        $siswa = Siswa::find($id);
        $siswa->nama = $validasi['nama'] ?? $siswa->nama;
        $siswa->nisn = $validasi['nisn'] ?? $siswa->nisn;
        $siswa->jk = $validasi['jk'] ?? $siswa->jk;
        $siswa->alamat = $validasi['alamat'] ?? $siswa->alamat;
        $siswa->nohp = $validasi['nohp'] ?? $siswa->nohp;
        $siswa->local_id = $validasi['local_id'] ?? $siswa->local_id;

        $siswa->foto = $request->file('foto') ? $request->file('foto')->store('foto_siswa') : $siswa->foto;

        $siswa->save();
        return redirect(route('siswa.index'));
    }
    public function destroy($id): RedirectResponse
    {
        $siswa = Siswa::find($id);
        $siswa->delete();
        return redirect(route('siswa.index'));
    }
}