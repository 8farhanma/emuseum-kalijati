<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_FAQ;

class C_FAQ extends Controller
{
    protected $M_FAQ;
    public function __construct(M_FAQ $M_FAQ)
    {
        $this->M_FAQ = new M_FAQ();
    }

    public function faq()
    {

        $data = [
            'faq' => $this->M_FAQ->allData()
        ];
        return view('faq.v_faq2', $data);
    }

    public function tampilanFAQ()
    {

        $data = [
            'faqs' => $this->M_FAQ->allData()
        ];
        return view('v_faq', $data);
    }

    public function detail($id_faq)
    {
        if (!$this->M_FAQ->detailData($id_faq)) {
            abort(404);
        }
        $data = [
            'faq' => $this->M_FAQ->detailData($id_faq)
        ];
        return view('faq.v_detailfaq', $data);
    }

    public function edit($id_faq)
    {
        if (!$this->M_FAQ->detailData($id_faq)) {
            abort(404);
        }

        $data = ['faq' => $this->M_FAQ->detailData($id_faq)];
        return view('faq.v_editfaq', $data);
    }

    public function update($id_faq)
    {
        Request()->validate(
            [
                'id_faq' => 'required',
                'pertanyaan' => 'required',
                'jawaban' => 'required',
            ],
            [
                'id_faq.required' => '* ID faq wajib di isi !',
                'pertanyaan.required' => 'Pertanyaan wajib di isi !',
                'jawaban.required' => 'Jawaban wajib di isi !',
            ]
        );
        //jika validasi tidak ada maka lakukan simpan data
        $data = [
            'id_faq' => Request()->id_faq,
            'pertanyaan' => Request()->pertanyaan,
            'jawaban' => Request()->jawaban,
        ];
        $this->M_FAQ->editData($id_faq, $data);

        return redirect()->route('faq')->with('pesan', 'Data berhasil didupdate!');
    }
}
