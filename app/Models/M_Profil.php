<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_Profil extends Model
{
    public function allData()
    {
        return DB::table('tb_profil')->get();
    }

    public function detailData($id_profil)
    {
        return DB::table('tb_profil')->where('id_profil', $id_profil)->first();
    }

    public function editData($id_profil, $data)
    {
        DB::table('tb_profil')->where('id_profil', $id_profil)->update($data);
    }
}
