@extends('layouts.app')
@section('content')
    <h2 class="text-center">POSTINGAN</h2>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambah">Tambah</button>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Judul</th>
                <th scope="col">Isi</th>
                <th scope="col">Tanggal Dibuat</th>
                <th scope="col">Penulis</th>
                <th scope="col">Kategori</th>
                <th scope="col">Status</th>
                <th scope="col" colspan="2" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $post)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $post->judul }}</td>
                    <td>{{ $post->isi }}</td>
                    <td>{{ $post->tanggalDibuat }}</td>
                    <td>{{ $post->users_id }}</td>
                    <td>{{ $post->kategori->nama_kategori }}</td>
                    <td>{{ $post->status }}</td>
                    <td><button type="button" class="btn btn-warning" data-bs-toggle="modal"
                            data-bs-target="#edit{{ $post->id }}">Edit</button></td>
                    <td><a href="{{ url('delpost/' . $post->id) }}"><button type="button"
                                class="btn btn-danger">Delete</button></a></td>
                </tr>

                {{-- BEGIN MODAL EDIT --}}
                <div class="modal fade" id="edit{{ $post->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title fs-5" id="exampleModalLabel">Update Postingan</h3>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('post.update', $post->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="mb-3">
                                        <label class="form-label">Judul</label>
                                        <input type="text" class="form-control" name="judul"
                                            value="{{ $post->judul }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Isi</label>
                                        <input type="text" class="form-control" name="isi"
                                            value="{{ $post->isi }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Dibuat</label>
                                        <input type="date" class="form-control" name="tanggalDibuat"
                                            value="{{ $post->tanggalDibuat }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Petugas</label>
                                        <input type="text" class="form-control" name="users_id"
                                            value="{{ Auth::User()->id }}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Kategori</label>
                                        <select class="form-control" name="kategori_id">
                                            <option value="">Pilih Kategori</option>
                                            @foreach ($data2 as $item)
                                                <option value="{{ $item->id }}" @selected($post->kategori_id == $item->id)>
                                                    {{ $item->nama_kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        @if(Auth::User()->role == 'admin')
                                        <label class="form-label">Satus</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status"
                                                id="flexRadioDefault1" value="aktif" @if($post->status == 'aktif')
                                                    @checked(true)
                                                @endif>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Aktif
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status"
                                                id="flexRadioDefault2" value="tidak" @if($post->status != 'aktif')
                                                    @checked(true)
                                                @endif>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Tidak Aktif
                                            </label>
                                        </div>
                                        @endif
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Sumbit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- END MODAL EDIT --}}
            @endforeach
        </tbody>
    </table>
@endsection

{{-- MODAL TAMBAH --}}
<div class="modal fade" id="tambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="exampleModalLabel">Tambah post</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input type="text" class="form-control" name="judul" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Isi</label>
                        <input type="text" class="form-control" name="isi" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Dibuat</label>
                        <input type="date" class="form-control" name="tanggalDibuat" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Petugas</label>
                        <input type="text" class="form-control" name="users_id" value="{{ Auth::User()->id }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select class="form-select" name="kategori_id">
                            <option selected disabled>Pilih Kategori</option>
                            @foreach ($data2 as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Sumbit</button>
                </form>
            </div>
        </div>
    </div>
</div>
