@extends('Templats.layouts')

@section('title', 'Halaman Home')

@section('konten')

    <h1>Ini adalah halaman Home</h1>
    <h3>Selamat datang {{$name}}, Anda berada di kelas {{$kelas}}, Anda tinggal di {{$alamat}}</h3>
    <h3>Teman-Teman:</h3>
    <ol>
        @foreach($mbr as $m)
            <li>{{$m}}</li>
        @endforeach
    </ol>
@endsection