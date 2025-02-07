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
<a href="{{route('local.create')}}" class="btn btn-primary mb-2 ">Tambah Data Kelas</a>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5 class="m-0 font-weight-bold text-gray">
                    Manajemen Data Kelas
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datakelas as $dk)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$dk['nama_kelas']}}</td>
                                <td>{{$dk['wali_kelas']}}</td>
                                <td>
                                    <div class="action-btns">
                                        
                                        <a href="" class='btn btn-outline-warning btn-sm'><i class='fas fa-pencil-alt' title="edit"></i></a>
                                        <a href="" class='btn btn-outline-danger btn-sm'><i class='far fa-trash-alt' title="hapus"></i></a>
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