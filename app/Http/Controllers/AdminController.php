<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Menampilkan halaman form untuk menambah data admin.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.add');
    }

    /**
     * Menyimpan data admin baru ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi input dari request
        $request->validate([
            'id_admin'    => 'required',
            'nama_admin'  => 'required',
            'alamat'      => 'required',
            'username'    => 'required',
            'password'    => 'required',
        ]);

        // Insert data ke tabel admin menggunakan query builder
        DB::insert(
            'INSERT INTO admin (id_admin, nama_admin, alamat, username, password) VALUES (:id_admin, :nama_admin, :alamat, :username, :password)',
            [
                'id_admin'   => $request->id_admin,
                'nama_admin' => $request->nama_admin,
                'alamat'     => $request->alamat,
                'username'   => $request->username,
                'password'   => $request->password,
            ]
        );

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.index')->with('success', 'Data Admin berhasil disimpan');
    }
}
