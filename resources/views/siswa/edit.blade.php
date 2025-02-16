@extends('Templats.layouts')
@section('title','data kelas')
@section('konten')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header text-warning">
                Edit Data Siswa
            </div>
            <div class="card-body">
                <form action="{{route('siswa.update', $siswa->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{$siswa->id}}">
                    <div class="col mt-2">
                        <label for="nama" class="text-gray-900">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="{{$siswa->nama}}">
                    </div>
                    <div class="col mt-2">
                        <label for="nisn" class="text-gray-900">Nisn</label>
                        <input type="text" name="nisn" id="nisn" class="form-control" value="{{$siswa->nisn}}">
                    </div>
                    <div class="col mt-2">
                        <label for="kelas" class="text-gray-900">Kelas</label>
                        <select name="local_id" id="local_id" class="form-control mt-2">
                            <option disabled selected value="{{$siswa->local_id}}">{{ $siswa->local ? $siswa->local->nama_kelas : 'Pilih Kelas' }}</option>
                            @foreach($dtkelas as $k)
                            <option value="{{$k['id']}}">{{$k['nama_kelas']}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col mt-2">
                        <label for="jk" class="text-gray-900">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control mt-2">
                            <option disabled selected value="{{$siswa->jk}}">{{$siswa->jk}}</option>
                            <option value="Laki-Laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="col mt-2">
                        <label for="alamat" class="text-gray-900">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" value="{{$siswa->alamat}}">{{$siswa->alamat}}</textarea>
                    </div>
                    <div class=" col mt-2">
                        <label for="nohp" class="text-gray-900">Nomor Handphone</label>
                        <input type="number" name="nohp" id="nohp" class="form-control" value="{{$siswa->nohp}}">
                    </div>
                    <div class="col mt-2">
                        <label for="foto" class="text-gray-900">Foto Awal</label><br>
                        <img src="{{ asset('storage/' . $siswa->foto) }}" alt="foto" width="100">
                    </div>
                    <div class="col mt-2">
                        <label for="foto" class="text-gray-900">Ganti Foto</label>
                        <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
                    </div>

                    <button type="submit" class="btn btn-md btn-primary float-right mt-4">Simpan</button>
                    <a href="{{route('siswa.index')}}">
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