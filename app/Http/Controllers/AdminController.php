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
    /**
     * Menampilkan semua data admin dari tabel.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil semua data dari tabel admin
        $datas = DB::select('SELECT * FROM admin');

        // Mengirim data ke view admin.index
        return view('admin.index')->with('datas', $datas);
    }
    /**
     * Menampilkan halaman edit data admin berdasarkan ID.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        // Mengambil data admin berdasarkan ID
        $data = DB::table('admin')->where('id_admin', $id)->first();

        // Mengirim data ke view admin.edit
        return view('admin.edit')->with('data', $data);
    }

    /**
     * Memperbarui data admin di tabel berdasarkan ID.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, Request $request)
    {
        // Validasi input dari request
        $request->validate([
            'id_admin'    => 'required',
            'nama_admin'  => 'required',
            'alamat'      => 'required',
            'username'    => 'required',
            'password'    => 'required',
        ]);

        // Update data di tabel admin
        DB::update(
            'UPDATE admin 
             SET id_admin = :id_admin, nama_admin = :nama_admin, alamat = :alamat, username = :username, password = :password 
             WHERE id_admin = :id',
            [
                'id'         => $id,
                'id_admin'   => $request->id_admin,
                'nama_admin' => $request->nama_admin,
                'alamat'     => $request->alamat,
                'username'   => $request->username,
                'password'   => $request->password,
            ]
        );

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.index')->with('success', 'Data Admin berhasil diubah');
    }
}
