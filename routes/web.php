<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\LatihanController;

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
 
Route::get('/sbadmin', function () {
    return view('index',[
        "menu"=>"dashboard",
    ]);
})->name('sbadmin');

Route::get('/local', [LocalController::class, 'index'])->name('local.index');

Route::get('/local/create', [LocalController::class, 'create'])->name('local.create');

Route::post('/local', [LocalController::class, 'store'])->name('local.store');
