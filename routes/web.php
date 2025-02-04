<?php

use App\Http\Controllers\LatihanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    $mbr=array('rejomok','dikadal','apisuki','angga barbershop');
    return view('home',[
        'name' => '  haliq raikageh',
        'kelas' => 'XI RPL 1',
        'alamat' => 'desa kumo',
        'mbr' => $mbr
    ]);
});

Route::get('/latihan', [LatihanController::class, 'index']);

Route::get('/biodata', [LatihanController::class, 'biodata']);

Route::get('/sbadmin', function () {
    return view('index');
});