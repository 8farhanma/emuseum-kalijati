<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_pengunjungIndividu extends Model
{
    // Tentukan nama tabel
    protected $table = 'tb_pengunjungindividu';

    // Tentukan primary key
    protected $primaryKey = 'id_individu';

    // Tentukan apakah primary key auto-incrementing
    public $incrementing = true;

    // Tentukan tipe data primary key
    protected $keyType = 'int';

    // Tentukan apakah timestamps digunakan
    public $timestamps = false;

    // Tentukan kolom yang dapat diisi
    protected $fillable = [
        'nama_pengunjung',
        'alamat',
        'pekerjaan'
    ];

    public function kunjungan()
    {
        return $this->hasMany(M_Kunjungan::class, 'id_individu');
    }
}
