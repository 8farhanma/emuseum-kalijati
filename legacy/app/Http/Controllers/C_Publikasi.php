<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Publikasi;


class C_Publikasi extends Controller
{
    protected $M_Publikasi;
    public function __construct(M_Publikasi $M_Publikasi)
    {
        $this->M_Publikasi = new M_Publikasi();
    }

    public function index()
    {
        return $this->loadViewWithAllData('kelola publikasi.v_publikasi2');
    }

    public function tampilanPublikasi()
    {
        return $this->loadViewWithAllData('v_publikasi');
    }

    protected function loadViewWithAllData($viewName)
    {
        $data = [
            'publikasi' => $this->M_Publikasi->allData()
        ];
        return view($viewName, $data);
    }

    public function show($id_publikasi)
    {
        $publication = $this->M_Publikasi->detailData($id_publikasi);
        $relatedPublications = $this->M_Publikasi->relatedPublications($publication->kategori, $id_publikasi);
        return view('v_detailpublikasi', compact('publication', 'relatedPublications'));
    }

    public function detail($id_publikasi)
    {
        if (!$this->M_Publikasi->detailData($id_publikasi)) {
            abort(404);
        }
        $data = [
            'publikasi' => $this->M_Publikasi->detailData($id_publikasi)
        ];
        return view('kelola publikasi.v_detailpublikasi', $data);
    }

    public function add()
    {
        return view('kelola publikasi.v_addpublikasi');
    }

    public function insert()
    {
        Request()->validate([
            'judul' => 'required',
            'tanggal_publikasi' => 'required|date_format:Y-m-d',
            'isi_publikasi' => 'required',
            'gambar' => 'required|mimes:jpg,jpeg,png,bmp|max:1024',
            'kategori' => 'required',
        ], [
            'judul.required' => 'Masukkan judul publikasi!',
            'tanggal_publikasi.required' => 'Masukkan tanggal publikasi dengan format yang benar (YYYY-MM-DD)!',
            'isi_publikasi.required' => 'Masukkan isi publikasi!',
            'gambar.required' => 'Unggah foto publikasi!',
            'kategori.required' => 'Pilih kategori publikasi!',
        ]);

        // Jika validasi tidak ada maka lakukan simpan data
        // upload gambar/foto
        $file = Request()->gambar;
        $fileName = 'publikasi_' . Request()->id_publikasi . '.' . $file->extension();
        $file->move(public_path('foto_publikasi'), $fileName);
        $data = [
            // 'id_publikasi' => Request()->id_publikasi,
            'judul' => Request()->judul,
            'tanggal_publikasi' => Request()->tanggal_publikasi,
            'isi_publikasi' => Request()->isi_publikasi,
            'gambar' => $fileName,
            'kategori' => Request()->kategori,
        ];

        $this->M_Publikasi->addData($data);
        return redirect()->route('publikasi')->with('pesan', 'Data berhasil ditambahkan !');
    }

    public function edit($id_publikasi)
    {
        if (!$this->M_Publikasi->detailData($id_publikasi)) {
            abort(404);
        }

        $data = ['publikasi' => $this->M_Publikasi->detailData($id_publikasi)];
        return view('kelola publikasi.v_editpublikasi', $data);
    }

    public function update($id_publikasi)
    {
        Request()->validate(
            [
                'judul' => 'required',
                'tanggal_publikasi' => 'required',
                'isi_publikasi' => 'required',
                'gambar' => 'mimes:jpg,jpeg,png,bmp|max:1024',
                'kategori' => 'required',
            ],
            [
                'judul.required' => 'Judul publikasi wajib terisi !',
                'tanggal_publikasi.required' => 'Tanggal publikasi wajib terisi !',
                'isi_publikasi.required' => 'Isi publikasi wajib terisi !',
                'gambar.required' => 'Foto publikasi wajib terisi !',
                'kategori.required' => 'Kategori publikasi wajib terisi !',
            ]
        );
        //jika validasi tidak ada maka lakukan simpan data
        if (Request()->gambar <> "") {
            //jika ganti gambar/foto
            $file = Request()->gambar;
            $fileName = Request()->id_publikasi . '.' . $file->extension();
            $file->move(public_path('foto_publikasi'), $fileName);

            $data = [
                'id_publikasi' => Request()->id_publikasi,
                'judul' => Request()->judul,
                'tanggal_publikasi' => Request()->tanggal_publikasi,
                'isi_publikasi' => Request()->isi_publikasi,
                'gambar' => $fileName,
                'kategori' => Request()->kategori,
            ];
            $this->M_Publikasi->editData($id_publikasi, $data);
        } else {
            //jika tidak ganti gambar/foto
            $data = [
                'id_publikasi' => Request()->id_publikasi,
                'judul' => Request()->judul,
                'tanggal_publikasi' => Request()->tanggal_publikasi,
                'isi_publikasi' => Request()->isi_publikasi,
                'kategori' => Request()->kategori,
            ];
            $this->M_Publikasi->editData($id_publikasi, $data);
        }
        return redirect()->route('publikasi')->with('pesan', 'Data berhasil didupdate!');
    }

    public function delete($id_publikasi)
    {
        //hapus atau delete foto
        $publikasi = $this->M_Publikasi->detailData($id_publikasi);
        if ($publikasi->gambar <> "") {
            unlink(public_path('foto_publikasi') . '/' . $publikasi->gambar);
        }
        $this->M_Publikasi->deleteData($id_publikasi);
        return redirect()->route('publikasi')->with('pesan', 'Data berhasil dihapus !');
    }
}
