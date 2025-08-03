<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Profil;
use App\Models\M_Koleksi;
use App\Models\M_Publikasi;
use App\Models\M_Ulasan;

class C_Home extends Controller
{
    protected $M_Profil;
    protected $M_Koleksi;
    protected $M_Publikasi;
    protected $M_Ulasan;

    public function __construct(M_Profil $M_Profil, M_Koleksi $M_Koleksi, M_Publikasi $M_Publikasi, M_Ulasan $M_Ulasan)
    {
        $this->M_Profil = $M_Profil;
        $this->M_Koleksi = $M_Koleksi;
        $this->M_Publikasi = $M_Publikasi;
        $this->M_Ulasan = $M_Ulasan;
    }

    public function index()
    {
        $profil = $this->M_Profil->allData()->first();
        $koleksi = $this->M_Koleksi->allData();
        $publikasi = $this->M_Publikasi->allData();
        $ulasans = $this->M_Ulasan->all();

        return view('home', compact('profil', 'koleksi', 'publikasi', 'ulasans'));
    }
}
