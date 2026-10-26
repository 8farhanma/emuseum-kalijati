<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class M_Koleksi extends Model
{
    protected $table = 'tb_koleksi';
    protected $primaryKey = 'id_koleksi';
    protected $fillable = ['nama_koleksi', 'deskripsi_koleksi', 'foto_koleksi', 'url_koleksi'];

    public function allData()
    {
        return DB::table('tb_koleksi')->get();
    }

    public function detailData($id_koleksi)
    {
        return DB::table('tb_koleksi')->where('id_koleksi', $id_koleksi)->first();
    }

    public function addData($data)
    {
        DB::table('tb_koleksi')->insert($data);
    }

    public function generateKoleksiID()
    {
        $lastKoleksi = DB::table('tb_koleksi')->orderBy('id_koleksi', 'desc')->first();
        if (!$lastKoleksi) {
            return "KOL001";
        } else {
            $number = intval(substr($lastKoleksi->id_koleksi, 3)) + 1;
            return 'KOL' . str_pad($number, 3, '0', STR_PAD_LEFT);
        }
    }

    public function editData($id_koleksi, $data)
    {
        DB::table('tb_koleksi')->where('id_koleksi', $id_koleksi)->update($data);
    }

    public function deleteData($id_koleksi)
    {
        DB::table('tb_koleksi')->where('id_koleksi', $id_koleksi)->delete();
    }

    public function updateQRCode($id_koleksi, $url)
    {
        $qr_code = QrCode::format('png')->size(200)->generate($url);
        DB::table('tb_koleksi')->where('id_koleksi', $id_koleksi)->update(['qr_code_koleksi' => $qr_code]);
    }
}
