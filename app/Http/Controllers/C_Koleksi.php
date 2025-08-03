<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Koleksi;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class C_Koleksi extends Controller
{
    protected $M_Koleksi;
    public function __construct(M_Koleksi $M_Koleksi)
    {
        $this->M_Koleksi = new M_Koleksi();
    }

    public function index()
    {

        $data = [
            'koleksi' => $this->M_Koleksi->allData()
        ];
        return view('kelola koleksi.v_koleksi2', $data);
    }

    public function tampilankoleksi()
    {

        $data = [
            'koleksi' => $this->M_Koleksi->allData()
        ];
        return view('v_koleksi', $data);
    }

    public function show($id_koleksi)
    {
        $koleksi = $this->M_Koleksi->detailData($id_koleksi);
        return response()->json($koleksi);
    }

    public function detail($id_koleksi)
    {
        if (!$this->M_Koleksi->detailData($id_koleksi)) {
            abort(404);
        }
        $data = [
            'koleksi' => $this->M_Koleksi->detailData($id_koleksi)
        ];
        return view('kelola koleksi.v_detailkoleksi', $data);
    }

    public function detailKoleksi($id_koleksi)
    {
        $koleksi = $this->M_Koleksi->detailData($id_koleksi);
        if (!$koleksi) {
            abort(404);
        }
        return view('v_detailkoleksi', ['koleksi' => $koleksi]);
    }

    public function cetakQR($id_koleksi)
    {

        $data = [
            'koleksi' => $this->M_Koleksi->find($id_koleksi)
        ];
        return view('kelola koleksi.v_cetakqrcode', $data);
    }


    public function add()
    {
        return view('kelola koleksi.v_addkoleksi');
    }

    public function insert()
    {
        request()->validate([
            'nama_koleksi' => 'required',
            'deskripsi_koleksi' => 'required',
            'foto_koleksi' => 'required|mimes:jpg,jpeg,png|max:1024',
            'url_koleksi' => 'required|url',
        ], [
            'nama_koleksi.required' => 'Nama Koleksi wajib di isi !',
            'deskripsi_koleksi.required' => 'Deskripsi Koleksi wajib di isi !',
            'foto_koleksi.required' => 'Foto Koleksi wajib di unggah !',
            'foto_koleksi.mimes' => 'Format foto harus jpg, jpeg, atau png !',
            'foto_koleksi.max' => 'Ukuran foto tidak boleh melebihi 1024 KB !',
            'url_koleksi.required' => 'URL Koleksi wajib di isi !',
            'url_koleksi.url' => 'URL Koleksi harus berupa URL yang valid !',
        ]);
        $idKoleksi = $this->M_Koleksi->generateKoleksiID();

        // upload gambar/foto koleksi
        $fileKoleksi = request()->foto_koleksi;
        $fileNameKoleksi = request()->nama_koleksi . '.' . $fileKoleksi->extension();
        $fileKoleksi->move(public_path('foto_koleksi'), $fileNameKoleksi);

        // generate QR Code from URL
        $urlQRCode = request()->url_koleksi;
        $qrCode = QrCode::format('png')->size(200)->generate($urlQRCode);
        $fileNameQRCode = request()->nama_koleksi . '_qr.png';
        $qrCodePath = 'qr_code_koleksi/' . $fileNameQRCode;
        file_put_contents(public_path($qrCodePath), $qrCode);

        $data = [
            'id_koleksi' => $idKoleksi,
            'nama_koleksi' => request()->nama_koleksi,
            'deskripsi_koleksi' => request()->deskripsi_koleksi,
            'foto_koleksi' => $fileNameKoleksi,
            'qr_code_koleksi' => $fileNameQRCode, // Menggunakan $qrCodePath yang sudah diambil dari request
            'url_koleksi' => $urlQRCode, // Menggunakan $urlQRCode yang sudah diambil dari request
        ];

        $this->M_Koleksi->addData($data);
        return redirect()->route('koleksi')->with('pesan', 'Data berhasil ditambahkan !');
    }
    public function edit($id_koleksi)
    {
        if (!$this->M_Koleksi->detailData($id_koleksi)) {
            abort(404);
        }

        $data = ['koleksi' => $this->M_Koleksi->detailData($id_koleksi)];
        return view('kelola koleksi.v_editkoleksi', $data);
    }

    public function update($id_koleksi)
    {
        $existingKoleksi = $this->M_Koleksi->detailData($id_koleksi);

        if (
            ($existingKoleksi->nama_koleksi == request()->nama_koleksi ||
                $existingKoleksi->deskripsi_koleksi == request()->deskripsi_koleksi ||
                $existingKoleksi->url_koleksi == request()->url_koleksi) &&
            !request()->hasFile('foto_koleksi')
        ) {
            request()->validate([
                'nama_koleksi' => 'required',
                'deskripsi_koleksi' => 'required',
                'url_koleksi' => 'required|url',
            ], [
                'nama_koleksi.required' => 'Nama Koleksi wajib terisi !',
                'deskripsi_koleksi.required' => 'Deskripsi Koleksi wajib terisi !',
                'url_koleksi.required' => 'URL Koleksi wajib terisi !',
                'url_koleksi.url' => 'URL Koleksi harus berupa URL yang valid !',
            ]);

            $data = [
                'id_koleksi' => request()->id_koleksi,
                'nama_koleksi' => request()->nama_koleksi,
                'deskripsi_koleksi' => request()->deskripsi_koleksi,
                'url_koleksi' => request()->url_koleksi,
            ];
        } else {
            request()->validate([
                'nama_koleksi' => 'required',
                'deskripsi_koleksi' => 'required',
                'foto_koleksi' => 'sometimes|mimes:jpg,jpeg,png|max:1024',
                'url_koleksi' => 'required|url',
            ], [
                'nama_koleksi.required' => 'Nama Koleksi wajib terisi !',
                'deskripsi_koleksi.required' => 'Deskripsi Koleksi wajib terisi !',
                'foto_koleksi.mimes' => 'Format foto harus jpg, jpeg, atau png !',
                'foto_koleksi.max' => 'Ukuran foto tidak boleh melebihi 1024 KB !',
                'url_koleksi.required' => 'URL Koleksi wajib terisi !',
                'url_koleksi.url' => 'URL Koleksi harus berupa URL yang valid !',
            ]);

            $data = [
                'id_koleksi' => request()->id_koleksi,
                'nama_koleksi' => request()->nama_koleksi,
                'deskripsi_koleksi' => request()->deskripsi_koleksi,
                'url_koleksi' => request()->url_koleksi,
            ];

            if (request()->hasFile('foto_koleksi')) {
                $fileKoleksi = request()->file('foto_koleksi');
                $fileNameKoleksi = request()->nama_koleksi . '.' . $fileKoleksi->extension();
                $fileKoleksi->move(public_path('foto_koleksi'), $fileNameKoleksi);
                $data['foto_koleksi'] = $fileNameKoleksi;
            } else {
                $data['foto_koleksi'] = $existingKoleksi->foto_koleksi;
            }
        }

        // Update QR Code if URL has changed
        if ($existingKoleksi->url_koleksi !== request()->url_koleksi) {
            $qrCode = QrCode::format('png')->size(200)->generate(request()->url_koleksi);
            $fileNameQRCode = request()->nama_koleksi . '_qr.png';
            $qrCodePath = 'qr_code_koleksi/' . $fileNameQRCode;
            file_put_contents(public_path($qrCodePath), $qrCode);
            $data['qr_code_koleksi'] = $fileNameQRCode;
        } else {
            $data['qr_code_koleksi'] = $existingKoleksi->qr_code_koleksi;
        }

        $this->M_Koleksi->editData($id_koleksi, $data);

        return redirect()->route('koleksi')->with('pesan', 'Data Koleksi berhasil diperbarui!');
    }
    public function delete($id_koleksi)
    {
        //hapus atau delete foto
        $koleksi = $this->M_Koleksi->detailData($id_koleksi);
        if ($koleksi->foto_koleksi <> "") {
            unlink(public_path('foto_koleksi') . '/' . $koleksi->foto_koleksi);
        }
        $this->M_Koleksi->deleteData($id_koleksi);
        return redirect()->route('koleksi')->with('pesan', 'Data berhasil dihapus !');
    }

    public function updateQRCode($id_koleksi, $qr_code)
    {
        $this->M_Koleksi->updateQRCode($id_koleksi, $qr_code);
    }
}
