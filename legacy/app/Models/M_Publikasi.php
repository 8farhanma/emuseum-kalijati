<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class M_Publikasi extends Model
{
    public function allData()
    {
        return DB::table('tb_publikasi')->get();
    }

    public function detailData($id_publikasi)
    {
        return DB::table('tb_publikasi')->where('id_publikasi', $id_publikasi)->first();
    }

    public function addData($data)
    {
        DB::table('tb_publikasi')->insert($data);
    }

    public function editData($id_publikasi, $data)
    {
        DB::table('tb_publikasi')->where('id_publikasi', $id_publikasi)->update($data);
    }

    public function deleteData($id_publikasi)
    {
        DB::table('tb_publikasi')->where('id_publikasi', $id_publikasi)->delete();
    }

    public function relatedPublications($kategori, $id_publikasi)
    {
        return DB::table('tb_publikasi')
            ->where('kategori', $kategori)
            ->where('id_publikasi', '!=', $id_publikasi)
            ->orderBy('tanggal_publikasi', 'desc')
            ->take(5)
            ->get();
    }
}
