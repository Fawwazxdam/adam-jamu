<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekomendasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //HALAMAN REKOMENDASI

        // DEKLARASI VARIABEL KELUHAN

        return view('rekomendasi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //MENGANALISA KELUHAN
        $keluhan = $request->keluhan;
        $lahir = $request->lahir;
        $ambil = new masukan($keluhan, $lahir);
        $data = [
            'nama_jamu' => $ambil->namaJamu(),
            'khasiat' => $keluhan,
            'keluhan' => $keluhan,
            'umur' => $ambil->hitungUmur(), 
            'saranPenggunaan' => $ambil->penggunaan() . $ambil->saran()
        ];
        return view('rekomendasi',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

class jamu {
    public function __construct($keluhan, $lahir) {
        $this->keluhan = $keluhan;
        $this->lahir = $lahir;
    }
    public function namaJamu()
    {
        if ($this->keluhan == 'keseleo' && 'kurang nafsu makan') {
            return 'Beras Kencur';
        } else if ($this->keluhan == 'pegal-pegal') {
            return 'Kunyit Asam';
        } else if ($this->keluhan == 'darah tinggi' && 'gula darah') {
            return 'Brotowali';
        } else if ($this->keluhan == 'kram perut' && 'masuk angin') {
            return 'Temulawak Pait';
        } else {
            return 'Jamu Belum Tersedia';
        }
        
    }
    public function hitungUmur()
    {
        return date('Y') - $this->lahir;
    }
}
class masukan extends jamu {
    public function saran()
    {
        if ($this->hitungUmur() <= 10) {
            return ' 1x';
        } else {
            return ' 2x';
        }
        
    }
    public function penggunaan()
    {
        if ($this->namaJamu() == 'Beras Kencur') {
            return 'Dioleskan';
        } else {
            return 'Dikonsumsi';
        }
        
    }
}
