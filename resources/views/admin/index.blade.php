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
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->id_admin }}">
                    Hapus
                </button>

                <!-- Modal -->
                <div class="modal fade" id="hapusModal{{ $data->id_admin }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <!-- Modal Body -->
                            <form method="POST" action="{{ route('admin.delete', $data->id_admin) }}">
                                @csrf
                                @method('DELETE') <!-- Tambahkan method DELETE untuk Laravel -->

                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus data ini?
                                </div>

                                <!-- Modal Footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Ya</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
@stop