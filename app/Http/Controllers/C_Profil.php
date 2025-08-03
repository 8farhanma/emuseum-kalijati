<?php

namespace App\Http\Controllers;

use App\Models\M_Profil;
use Illuminate\Http\Request;

class C_Profil extends Controller
{
    protected $M_Profil;
    public function __construct(M_Profil $M_Profil)
    {
        $this->M_Profil = new M_Profil();
    }

    public function index()
    {

        $data = [
            'profil' => $this->M_Profil->allData()
        ];
        return view('profil.v_profil2', $data);
    }

    public function show()
    {
        $data = $this->M_Profil->allData()->first(); // Assuming there's only one row in the table
        return view('v_tentang', ['profil' => $data]);
    }


    public function detail($id_profil)
    {
        if (!$this->M_Profil->detailData($id_profil)) {
            abort(404);
        }
        $data = [
            'profil' => $this->M_Profil->detailData($id_profil)
        ];
        return view('profil.v_detailprofil', $data);
    }

    public function edit($id_profil)
    {
        if (!$this->M_Profil->detailData($id_profil)) {
            abort(404);
        }

        $data = ['profil' => $this->M_Profil->detailData($id_profil)];
        return view('profil.v_editprofil', $data);
    }

    public function update($id_profil)
    {
        Request()->validate(
            [
                'sejarah' => 'required',
                'visi' => 'required',
                'misi' => 'required',
            ]
        );
        //jika validasi tidak ada maka lakukan simpan data
        $data = [
            'sejarah' => Request()->sejarah,
            'visi' => Request()->visi,
            'misi' => Request()->misi,
        ];
        $this->M_Profil->editData($id_profil, $data);

        return redirect()->route('profil')->with('pesan', 'Data berhasil diperbarui!');
    }
}
