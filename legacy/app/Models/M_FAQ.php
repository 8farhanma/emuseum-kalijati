<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_FAQ extends Model
{
    public function allData()
    {
        return DB::table('tb_faq')->get();
    }

    public function detailData($id_faq)
    {
        return DB::table('tb_faq')->where('id_faq', $id_faq)->first();
    }

    public function editData($id_faq, $data)
    {
        DB::table('tb_faq')->where('id_faq', $id_faq)->update($data);
    }
}
