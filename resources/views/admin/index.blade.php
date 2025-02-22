@extends('admin.layout')

@section('content')
    <!-- Judul Halaman -->
    <h4 class="mt-5">Data Admin</h4>

    <!-- Tombol Tambah Data -->
    <a href="{{ route('admin.create') }}" type="button" class="btn btn-success rounded-3">
        Tambah Data
    </a>

    <!-- Pesan Sukses -->
    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-3" role="alert">
            {{ $message }}
        </div>
    @endif

    <!-- Tabel Data Admin -->
    <table class="table table-hover mt-2">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Username</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
                <tr>
                    <td>{{ $data->id_admin }}</td>
                    <td>{{ $data->nama_admin }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td>{{ $data->username }}</td>
                    <td>
                        <!-- Tombol Ubah Data -->
                        <a href="{{ route('admin.edit', $data->id_admin) }}" type="button" class="btn btn-warning rounded-3">
                            Ubah
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop