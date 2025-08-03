<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_pengunjungKelompok extends Model
{
    // Tentukan nama tabel
    protected $table = 'tb_pengunjungkelompok';

    // Tentukan primary key
    protected $primaryKey = 'id_kelompok';

    // Tentukan apakah primary key auto-incrementing
    public $incrementing = true;

    // Tentukan tipe data primary key
    protected $keyType = 'int';

    // Tentukan apakah timestamps digunakan
    public $timestamps = false;

    // Tentukan kolom yang dapat diisi
    protected $fillable = [
        'nama_ketua',
        'asal_instansi',
        'jumlah_rombongan'
    ];

    public function kunjungan()
    {
        return $this->hasMany(M_Kunjungan::class, 'id_kelompok');
    }
}
