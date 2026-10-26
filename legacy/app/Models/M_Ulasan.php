<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Ulasan extends Model
{
    use HasFactory;

    protected $table = 'tb_ulasan';
    protected $primaryKey = 'id_ulasan';
    public $timestamps = true;

    protected $fillable = [
        'nama', 'asal_kota', 'isi_ulasan', 'rating_pelayanan', 'rating_fasilitas', 'rating_kebersihan', 'rating_avg'
    ];
}
