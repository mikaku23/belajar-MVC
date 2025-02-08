<?php

namespace App\Http\Controllers;

use App\Models\local;
use Illuminate\Http\Request;

class LocalController extends Controller
{
    public function index(){
        $datakelas=local::all();
        return view('local.index',[
            'menu' => 'local',
            'datakelas' => $datakelas,
        ]);
    }
    public function create(){
        return view('local.create',[
            'menu' => 'local',
        ]);
    }
    public function store(Request $request){
        $validasi=$request->validate([
            'nama_kelas' => 'required',
            'wali_kelas' => 'required'
        ]);
        $databaru = new local();
        $databaru->nama_kelas = $validasi['nama_kelas'];
        $databaru->wali_kelas = $validasi['wali_kelas'];
        $databaru->save(); 
        return redirect(route('local.index'));
    }
    public function edit($id){
        $datakelas = local::find($id);
        return view('local.edit', [
            'menu' => 'local',
            'datakelas' => $datakelas,
        ]);
    }
    public function update(){
        $validasi = request()->validate([
            'id'=>'required',
            'nama_kelas' => 'required',
            'wali_kelas' => 'required'
        ]);
        $datakelas = local::find($validasi['id']);
        $datakelas->nama_kelas = $validasi['nama_kelas'];
        $datakelas->wali_kelas = $validasi['wali_kelas'];
        $datakelas->save();
        return redirect(route('local.index'));
    }
    public function destroy($id){
        $datakelas = local::find($id);
        $datakelas->delete();
        return redirect(route('local.index'));
    }
    public function show($id){
        $datakelas = local::find($id);
        return view('local.view', [
            'menu' => 'local',
            'datakelas' => $datakelas,
        ]);
    }
}
