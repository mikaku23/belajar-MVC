@extends('Templats.layouts')
@section('title','data kelas')
@section('konten')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                Show data kelas
            </div>
            <div class="card-body">
                    @csrf
                    <input type="hidden" name="id" value="{{$datakelas->id}}">
                    <div class="col mt-2">
                        <label for="nama_kelas" class="text-gray-900">Nama Kelas</label>
                        <input type="text" name="nama_kelas" id="nama_kelas" class="form-control" value="{{$datakelas->nama_kelas}}" disabled>
                    </div>
                    <div class="col mt-2">
                        <label for="wali_kelas" class="text-gray-900">Wali Kelas</label>
                        <input type="text" name="wali_kelas" id="wali_kelas" class="form-control" value="{{$datakelas->wali_kelas}}" disabled>
                    </div>
                    <a href="{{route('local.index')}}">
                        <button type="button" class="btn btn-md btn-primary float-right mt-4">kembali</button>
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