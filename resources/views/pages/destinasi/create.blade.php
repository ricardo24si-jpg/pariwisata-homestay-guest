@extends('layouts.guest.app')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4">Tambah Destinasi Wisata</h2>

        <form action="{{ route('destinasi.store') }}" method="POST"enctype="multipart/form-data">
            @csrf
            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label fw-bold">Nama Destinasi</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama', $destinasi->nama ?? '') }}"
                        required>
                </div>

                <div class="col-md-12">
                    <label class="form-label fw-bold">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi', $destinasi->deskripsi ?? '') }}</textarea>
                </div>

                <div class="col-md-8">
                    <label class="form-label fw-bold">Alamat</label>
                    <input type="text" name="alamat" class="form-control"
                        value="{{ old('alamat', $destinasi->alamat ?? '') }}">
                </div>

                <div class="col-md-2">
                    <label class="form-label fw-bold">RT</label>
                    <input type="text" name="rt" class="form-control" value="{{ old('rt', $destinasi->rt ?? '') }}">
                </div>

                <div class="col-md-2">
                    <label class="form-label fw-bold">RW</label>
                    <input type="text" name="rw" class="form-control" value="{{ old('rw', $destinasi->rw ?? '') }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-bold">Jam Buka</label>
                    <input type="text" name="jam_buka" class="form-control"
                        value="{{ old('jam_buka', $destinasi->jam_buka ?? '') }}">
                </div>

                <div class="col-md-3">
                    <label class="form-label fw-bold">Harga Tiket</label>
                    <input type="number" name="tiket" class="form-control"
                        value="{{ old('tiket', $destinasi->tiket ?? '') }}">
                </div>

                <div class="col-md-3">
                    <label class="form-label fw-bold">Kontak</label>
                    <input type="text" name="kontak" class="form-control"
                        value="{{ old('kontak', $destinasi->kontak ?? '') }}">
                </div>
                <div class="col-md-12 mt-3">
                    <label class="form-label fw-bold">Upload Gambar Destinasi</label>
                    <input type="file" name="media[]" multiple accept="image/*">
                </div>


            </div>

            <button class="btn btn-primary mt-3 px-4">Simpan</button>
        </form>
    </div>
@endsection
