@extends('layouts.guest.app')

@section('content')
<div class="container py-5">

    <div class="section-title text-center mb-5">
        <h5 class="sub-title text-primary px-3">ULASAN WISATA</h5>
        <h1 class="display-5 mb-4">Edit Ulasan</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ulasan.update', $ulasan) }}" method="POST" class="card shadow-sm p-4">
        @csrf
        @method('PUT')

        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label">Destinasi</label>
                <select name="destinasi_id" class="form-control">
                    @foreach ($destinasi as $d)
                        <option value="{{ $d->destinasi_id }}"
                            {{ old('destinasi_id', $ulasan->destinasi_id) == $d->destinasi_id ? 'selected' : '' }}>
                            {{ $d->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4">
                <label class="form-label">Warga</label>
                <select name="warga_id" class="form-control">
                    @foreach ($warga as $w)
                        <option value="{{ $w->warga_id }}"
                            {{ old('warga_id', $ulasan->warga_id) == $w->warga_id ? 'selected' : '' }}>
                            {{ $w->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4">
                <label class="form-label">Rating</label>
                <input type="number" name="rating" min="1" max="5"
                    value="{{ old('rating', $ulasan->rating) }}" class="form-control">
            </div>

            <div class="col-12">
                <label class="form-label">Komentar</label>
                <textarea name="komentar" rows="3"
                    class="form-control">{{ old('komentar', $ulasan->komentar) }}</textarea>
            </div>

            <div class="col-12 text-end">
                <a href="{{ route('ulasan.index') }}" class="btn btn-secondary">Kembali</a>
                <button class="btn btn-primary px-4">Update</button>
            </div>
        </div>
    </form>

</div>
@endsection
