@extends('layouts.nav')
@section('content')
<h2 class="text-center mt-3">Rekomendasi Jamu</h2>
    <div class="row m-5">
        <div class="col">
            <form action="{{ route('rekomendasi.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Tahun Lahir</label>
                    <select name="tahunlahir" id="" class="form-select">
                        <option selected disabled>Masukkan Tahun Lahir</option>
                        @for($i = 1900; $i < date('Y'); $i++)
                        <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Keluhan</label>
                    <select name="keluhan" id="" class="form-select">
                        <option selected disabled>Pilih Keluhan Anda</option>
                        <option value="keseleo">keseleo</option>
                        <option value="kurang nafsu makan">kurang nafsu makan</option>
                        <option value="pegal-pegal">pegal-pegal</option>
                        <option value="darah tinggi">darah tinggi</option>
                        <option value="gula darah">gula darah</option>
                        <option value="kram perut">kram perut</option>
                        <option value="masuk angin">masuk angin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col">
            <table class="table table-dark">
                @isset($data)
                <tbody>
                    <tr>
                    <th scope="row">Nama Jamu</th>
                    <td>{{ $data['namajamu'] }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Khasiat</th>
                    <td>Mengobati {{ $data['khasiat'] }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Keluhan</th>
                    <td>{{ $data['keluhan'] }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Umur</th>
                    <td>{{ $data['umur'] }}</td>
                  </tr>
                  <tr>
                      <th scope="row">Saran Penggunaan</th>
                      <td>{{ $data['saran'] }}</td>
                    </tr>
                </tbody>
                @endisset
            </table>
        </div>
    </div>
@endsection