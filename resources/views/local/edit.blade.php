@extends('Templats.layouts')
@section('title','data kelas')
@section('konten')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                tambah data kelas
            </div>
            <div class="card-body">
                <form action="{{route('local.update')}}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{$datakelas->id}}">
                    <div class="col mt-2">
                        <label for="nama_kelas" class="text-gray-900">Nama Kelas</label>
                        <input type="text" name="nama_kelas" id="nama_kelas" class="form-control" value="{{$datakelas->nama_kelas}}">
                    </div>
                    <div class="col mt-2">
                        <label for="wali_kelas" class="text-gray-900">Wali Kelas</label>
                        <input type="text" name="wali_kelas" id="wali_kelas" class="form-control" value="{{$datakelas->wali_kelas}}">
                    </div>
                    <button type="submit" class="btn btn-md btn-primary float-right mt-4">Simpan</button>
                    <a href="{{route('local.index')}}">
                        <button type="button" class="btn btn-md btn-success float-right mt-4 mr-2">Kembali</button>
                    </a>
                </form>
            </div>
        </div>
        <div class="col">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection