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
        $tahunLahir = $request->tahunlahir;
        $keluhan = $request->keluhan;
        $ambil = new penggunaan($tahunLahir, $keluhan);
        $data = [
            'namajamu' => $ambil->namajamu(),
            'khasiat' => $keluhan,
            'keluhan' => $keluhan,
            'umur' => $ambil->hitungUmur(),
            'saran' => $ambil->cara() . $ambil->saran(),
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

class Jamu {
    public function __construct($tahunLahir, $keluhan)
    {
        $this->tahun = $tahunLahir;
        $this->keluhan = $keluhan;
    }
    public function namajamu()
    {
        if ($this->keluhan == 'keseleo' || $this->keluhan == 'kurang nafsu makan') {
            return 'Beras Kencur';
        } else if ($this->keluhan == 'pegal-pegal'){
            return 'Kunyit Asam';
        } else if ($this->keluhan == 'darah tinggi' || $this->keluhan == 'gula darah'){
            return 'Brotowali';
        } else if ($this->keluhan == 'kram perut' || $this->keluhan == 'masuk angin'){
            return 'Temulawak';
        } else {
            return 'Jamu Belum Ditemukan';
        }
        
    }
    public function hitungUmur()
    {
        return date('Y') - $this->tahun;
    }
}
class penggunaan extends Jamu{
    public function saran()
    {
        if ($this->hitungUmur() <= 10) {
            return ' 1x';
        } else {
            return '2x';
        }
    }
    public function cara()
    {
        if ($this->namajamu() == 'Beras Kencur' && $this->keluhan = 'keseleo') {
            return 'Dioleskan';
        } else {
            return 'Diminum';
        }
        
    }
}
