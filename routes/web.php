<?php

use App\Http\Controllers\LatihanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/home', function () {
    $mbr=array('rejomok','dikadal','apisuki','angga barbershop');
    return view('home',[
        'name' => '  haliq raikageh',
        'kelas' => 'XI RPL 1',
        'alamat' => 'desa kumo',
        'mbr' => $mbr,
        'menu'=>'home'
    ]);
})->name('home');

Route::get('/latihan', [LatihanController::class, 'index'])->name('latihan');

Route::get('/biodata', [LatihanController::class, 'biodata'])->name('biodata');
Route::get('/kenapa', [LatihanController::class, 'biodata'])->name('kenapa');

Route::get('/sbadmin', function () {
    return view('index',[
        "menu"=>"dashboard",
    ]);
})->name('sbadmin');

