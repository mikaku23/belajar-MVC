@extends('Templats.layouts')

@section('title', 'Data Kelas')

@section('style')
<link href="{{ asset('dist/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<style>
    .action-btns {
        display: flex;
        justify-content: center;
        gap: 8px;
    }

    .action-btns .btn {
        margin: 0;
    }
</style>
@endsection

@section('konten')
<a href="{{route('siswa.create')}}" class="btn btn-success mb-2 "><i class="fas fa-plus"></i>  Tambah Data Siswa</a>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5 class="m-0 font-weight-bold text-gray text-primary">
                    Manajemen Data Siswa
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nisn</th>
                                <th>Nama Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach($datasiswa as $ds)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$ds->nama}}</td>
                                <td>{{$ds->nisn}}</td>
                                <td>{{$ds->local->nama_kelas}}</td>
                                <td>
                                    <div class="action-btns">
                                        <a href="{{ route('siswa.show', $ds->id) }}" class='btn btn-outline-primary btn-sm'><i class='fas fa-eye' title="show"></i></a>

                                        <a href="{{route('siswa.edit',$ds['id'])}}" class='btn btn-outline-warning btn-sm'><i class='fas fa-pencil-alt' title="edit"></i></a>

                                       <form action="{{route('siswa.destroy',$ds['id'])}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class='btn btn-outline-danger btn-sm'><i class='far fa-trash-alt' title="hapus" onclick="return confirm('apakah anda yakin ingin menghapus data ini?')"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
<!-- Page level plugins -->
<script src="{{ asset('dist/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dist/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('dist/js/demo/datatables-demo.js') }}"></script>
@endsection