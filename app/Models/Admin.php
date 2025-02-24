<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    // protected $table = 'admin';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    // protected $guarded = [];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    // public $timestamps = false;

    use SoftDeletes; // Aktifkan soft delete
    protected $table = 'admin'; // Nama tabel
    protected $primaryKey = 'id_admin'; // Tentukan primary key
    public $incrementing = true; // Jika id_admin adalah auto-increment
    protected $keyType = 'int'; // Tipe data primary key (integer)
    protected $guarded = []; // Semua field bisa diisi
    public $timestamps = false; // Nonaktifkan timestamps jika tidak digunakan

    // Kolom yang digunakan untuk soft delete
    protected $dates = ['deleted_at'];
}
