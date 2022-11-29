@extends('layouts.nav')
@section('content')
<h2 class="text-center">Rekomendasi</h2>
<div class="row">
    <div class="col">
        <form action="{{ route('rekomendasi.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Tahun Lahir</label>
                <input type="text" class="form-control" name="lahir" value="{{old('lahir')}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Keluhan</label>
                <input type="text" class="form-control" name="keluhan" value="{{old('keluhan')}}">
            </div>
            <button type="submit" class="btn btn-success">CHECK</button>
        </form>
    </div>
    <div class="col">
        <h4 class="text-center">Data Anda Akan Ditampilkan Disini</h4>
        @isset($data)
        <table class="table">
            <tbody>
              <tr>
                <th scope="row">Nama Jamu</th>
                <td>{{$data['nama_jamu']}}</td>
              </tr>
              <tr>
                <th scope="row">Keluhan</th>
                <td>{{$data['keluhan']}}</td>
              </tr>
              <tr>
                <th scope="row">Khasiat</th>
                <td>Menyembuhkan {{$data['khasiat']}}</td>
              </tr>
              <tr>
                <th scope="row">Umur</th>
                <td>{{$data['umur']}}</td>
              </tr>
              <tr>
                <th scope="row">Saran Penggunaan</th>
                <td>{{$data['saranPenggunaan']}}</td>
              </tr>
            </tbody>
          </table>
        @endisset
    </div>
</div>
@endsection