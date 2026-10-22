<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Kunjungan;
use App\Models\M_pengunjungIndividu;
use App\Models\M_pengunjungKelompok;

class C_Kunjungan extends Controller
{
    protected $M_Kunjungan;
    protected $M_pengunjungIndividu;
    protected $M_pengunjungKelompok;

    public function __construct(M_Kunjungan $M_Kunjungan, M_pengunjungIndividu $M_pengunjungIndividu, M_pengunjungKelompok $M_pengunjungKelompok)
    {
        $this->M_Kunjungan = $M_Kunjungan;
        $this->M_pengunjungIndividu = $M_pengunjungIndividu;
        $this->M_pengunjungKelompok = $M_pengunjungKelompok;
    }

    public function index()
    {
        $pengunjungIndividu = $this->M_pengunjungIndividu->with('kunjungan')->get();
        $pengunjungKelompok = $this->M_pengunjungKelompok->with('kunjungan')->get();

        return view('kunjungan.v_kunjungan2', [
            'pengunjungIndividu' => $pengunjungIndividu,
            'pengunjungKelompok' => $pengunjungKelompok
        ]);
    }

    public function detail($id_kunjungan)
    {
        $detailKunjungan = $this->M_Kunjungan->with(['individu', 'kelompok'])->find($id_kunjungan);

        if (empty($detailKunjungan)) {
            abort(404);
        }

        return view('kunjungan.v_detailkunjungan', [
            'kunjungan' => $detailKunjungan,
            'individu' => $detailKunjungan->individu,
            'kelompok' => $detailKunjungan->kelompok
        ]);
    }

    public function add()
    {
        return view('v_kunjungan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_kunjungan' => 'required|date',
            'kategori_pengunjung' => 'required|in:individu,kelompok',
            'alasan_kunjungan' => 'required', // Validasi alasan kunjungan
        ], [
            'tanggal_kunjungan.required' => 'Tanggal kunjungan harus diisi.',
            'tanggal_kunjungan.date' => 'Tanggal kunjungan harus berformat tanggal yang valid.',
            'kategori_pengunjung.required' => 'Kategori pengunjung harus diisi.',
            'kategori_pengunjung.in' => 'Kategori pengunjung harus berupa individu atau kelompok.',
            'alasan_kunjungan.required' => 'Alasan kunjungan harus diisi.',
        ]);
        if ($request->kategori_pengunjung == 'individu') {
            $individu = M_pengunjungIndividu::create($request->only(['nama_pengunjung', 'alamat', 'pekerjaan']));
            $kunjungan = M_Kunjungan::create([
                'tanggal_kunjungan' => $request->tanggal_kunjungan,
                'kategori_pengunjung' => 'individu',
                'alasan_kunjungan' => $request->alasan_kunjungan,
                'id_individu' => $individu->id_individu
            ]);
        } elseif ($request->kategori_pengunjung == 'kelompok') {
            $kelompok = M_pengunjungKelompok::create($request->only(['nama_ketua', 'asal_instansi', 'jumlah_rombongan']));
            $kunjungan = M_Kunjungan::create([
                'tanggal_kunjungan' => $request->tanggal_kunjungan,
                'kategori_pengunjung' => 'kelompok',
                'alasan_kunjungan' => $request->alasan_kunjungan,
                'id_kelompok' => $kelompok->id_kelompok
            ]);
        }

        return back()->with('pesan', 'Data kunjungan berhasil dikirim.');
    }

    public function cetakIndividu()
    {
        $pengunjungIndividu = M_pengunjungIndividu::all();
        return view('kunjungan.v_cetak_individu', compact('pengunjungIndividu'));
    }

    public function cetakKelompok()
    {
        $pengunjungKelompok = M_pengunjungKelompok::all();
        return view('kunjungan.v_cetak_kelompok', compact('pengunjungKelompok'));
    }
}
