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
}
