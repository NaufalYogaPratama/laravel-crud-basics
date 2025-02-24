@extends('admin.layout')

@section('content')
    <h4 class="mt-5">Data Admin yang Dihapus</h4>

    <!-- Tabel Data Admin yang Dihapus -->
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
                        <!-- Tombol Restore -->
                        <a href="{{ route('admin.restore', $data->id_admin) }}" class="btn btn-success">Restore</a>

                        <!-- Tombol Force Delete -->
                        <form method="POST" action="{{ route('admin.forceDelete', $data->id_admin) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus permanen?')">Hapus Permanen</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop