<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_Kunjungan extends Model
{
    protected $table = 'tb_kunjungan';
    protected $primaryKey = 'id_kunjungan';
    public $timestamps = false; // Menonaktifkan timestamps
    protected $fillable = [
        'tanggal_kunjungan',
        'alasan_kunjungan',
        'kategori_pengunjung',
        'id_individu',
        'id_kelompok',
    ];

    public function individu()
    {
        return $this->belongsTo(M_pengunjungIndividu::class, 'id_individu');
    }

    public function kelompok()
    {
        return $this->belongsTo(M_pengunjungKelompok::class, 'id_kelompok');
    }

    public function allData()
    {
        return [
            'kunjungan' => $this->with(['individu', 'kelompok'])->get()
        ];
    }

    public function detailData($id_kunjungan)
    {
        $kunjungan = $this->with(['individu', 'kelompok'])->find($id_kunjungan);
        return $kunjungan ?: null;
    }

    public function addData($data)
    {
        if (!isset($data['kategori_pengunjung'])) {
            $data['kategori_pengunjung'] = 'kategori'; // Nilai default
        }
        return $this->create($data);
    }

    public function addDataIndividu($data)
    {
        return M_pengunjungIndividu::create($data);
    }

    public function addDataKelompok($data)
    {
        return M_pengunjungKelompok::create($data);
    }

    public function getPengunjungIndividuWithKunjungan()
    {
        return M_pengunjungIndividu::with('kunjungan')->get();
    }

    public function getPengunjungKelompokWithKunjungan()
    {
        return M_pengunjungKelompok::with('kunjungan')->get();
    }

    public function getKunjunganByPengunjungId($id_pengunjung)
    {
        return $this->where('id_pengunjung', $id_pengunjung)->first();
    }
}
