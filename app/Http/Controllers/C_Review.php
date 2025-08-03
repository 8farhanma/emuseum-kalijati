<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Ulasan;

class C_Review extends Controller
{
    public function index()
    {
        $ulasans = M_Ulasan::all();
        return view('v_ulasan', compact('ulasans'));
    }

    public function create()
    {
        return view('v_tambahUlasan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|regex:/^[a-zA-Z\s]+$/|max:25',
            'asal_kota' => 'required|regex:/^[a-zA-Z\s]+$/|max:25',
            'isi_ulasan' => 'max:100',
            'rating_pelayanan' => 'required|integer|between:1,5',
            'rating_fasilitas' => 'required|integer|between:1,5',
            'rating_kebersihan' => 'required|integer|between:1,5',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.regex' => 'Nama hanya boleh mengandung huruf dan spasi.',
            'nama.max' => 'Nama tidak boleh lebih dari 25 karakter.',
            'asal_kota.required' => 'Asal kota wajib diisi.',
            'asal_kota.regex' => 'Asal kota hanya boleh mengandung huruf dan spasi.',
            'asal_kota.max' => 'Asal kota tidak boleh lebih dari 25 karakter.',
            'isi_ulasan.max' => 'Isi ulasan tidak boleh lebih dari 100 karakter.',
            'rating_pelayanan.required' => 'Rating pelayanan wajib dipilih.',
            'rating_pelayanan.integer' => 'Rating pelayanan harus berupa angka.',
            'rating_pelayanan.between' => 'Rating pelayanan harus antara 1 hingga 5.',
            'rating_fasilitas.required' => 'Rating fasilitas wajib dipilih.',
            'rating_fasilitas.integer' => 'Rating fasilitas harus berupa angka.',
            'rating_fasilitas.between' => 'Rating fasilitas harus antara 1 hingga 5.',
            'rating_kebersihan.required' => 'Rating kebersihan wajib dipilih.',
            'rating_kebersihan.integer' => 'Rating kebersihan harus berupa angka.',
            'rating_kebersihan.between' => 'Rating kebersihan harus antara 1 hingga 5.',
        ]);

        $averageRating = ($request->rating_pelayanan + $request->rating_fasilitas + $request->rating_kebersihan) / 3;

        $data = $request->only(['nama', 'asal_kota', 'isi_ulasan', 'rating_pelayanan', 'rating_fasilitas', 'rating_kebersihan']);
        $data['rating_avg'] = round($averageRating, 2); // Menambahkan rating yang telah dihitung ke dalam data dan membulatkannya ke dua desimal

        M_Ulasan::create($data);

        return redirect()->route('ulasan.create')
            ->with('success', 'Ulasan berhasil ditambahkan.');
    }
}
