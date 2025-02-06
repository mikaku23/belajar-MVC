<?php

namespace App\Http\Controllers;

use App\Models\LatihanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Biodata;

class LatihanController extends Controller
{
    public function index(){
    $tanggal=new Carbon();
        return view('latihan',[
           'judul' => 'Belajar Laravel 11',
            'materi' => 'MVC Laravel',
            'tanggal' => $tanggal->now()->isoFormat('dddd, D MMMM Y'), 
            'menu' => 'latihan'
        ]);
    }

    public function biodata(){
    $biodata = new biodata();
    return view('biodata',[
        'biodata' => $biodata->data_siswa(),
        'menu'=> 'biodata'
    ]);
}


}