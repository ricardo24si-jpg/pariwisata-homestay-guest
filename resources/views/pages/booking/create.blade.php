@extends('layouts.guest.app')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">Tambah Booking Homestay</h3>
        </div>
    </div>
    <!-- Header End -->

    <div class="container py-5">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data"
            class="card shadow-sm p-4">
            @csrf

            <div class="row g-3">

                {{-- KAMAR --}}
                <div class="col-md-6">
                    <label class="form-label">Kamar</label>
                    <select name="kamar_id" id="kamar" class="form-control">
                        <option value="">-- Pilih Kamar --</option>
                        @foreach ($kamar as $k)
                            <option value="{{ $k->kamar_id }}" data-harga="{{ $k->harga }}">
                                {{ $k->nama_kamar }} (Rp {{ number_format($k->harga, 0, ',', '.') }}/malam)
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- WARGA --}}
                <div class="col-md-6">
                    <label class="form-label">Warga</label>
                    <select name="warga_id" class="form-control">
                        <option value="">-- Pilih Warga --</option>
                        @foreach ($warga as $w)
                            <option value="{{ $w->warga_id }}">{{ $w->nama }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- CHECKIN --}}
                <div class="col-md-6">
                    <label class="form-label">Check-in</label>
                    <input type="date" name="checkin" id="checkin" class="form-control">
                </div>

                {{-- CHECKOUT --}}
                <div class="col-md-6">
                    <label class="form-label">Check-out</label>
                    <input type="date" name="checkout" id="checkout" class="form-control">
                </div>

                {{-- TOTAL --}}
                <div class="col-md-4">
                    <label class="form-label">Total Pembayaran</label>
                    <input type="number" name="total" id="total" class="form-control" readonly>
                </div>

                {{-- STATUS --}}
                <div class="col-md-4">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="pending">Pending</option>
                        <option value="paid">Paid</option>
                        <option value="cancel">Cancel</option>
                    </select>
                </div>

                {{-- METODE --}}
                <div class="col-md-4">
                    <label class="form-label">Metode Pembayaran</label>
                    <select name="metode_bayar" class="form-control">
                        <option value="transfer">Transfer</option>
                        <option value="cash">Cash</option>
                        <option value="qris">QRIS</option>
                    </select>
                </div>

                {{-- BUKTI --}}
                <div class="col-md-6">
                    <label class="form-label">Bukti Pembayaran</label>
                    <input type="file" name="bukti" class="form-control">
                </div>

                <div class="col-12 text-end">
                    <button class="btn btn-primary px-4">Simpan Booking</button>
                    <a href="{{ route('booking.index') }}" class="btn btn-secondary">Kembali</a>
                </div>

            </div>
        </form>
    </div>

    {{-- AUTO HITUNG --}}
    <script>
        function hitungTotal() {
            const kamar = document.getElementById('kamar');
            const harga = kamar.options[kamar.selectedIndex]?.dataset.harga || 0;

            const checkin = new Date(document.getElementById('checkin').value);
            const checkout = new Date(document.getElementById('checkout').value);

            if (!harga || !checkin || !checkout || checkout <= checkin) {
                document.getElementById('total').value = '';
                return;
            }

            const diffTime = checkout - checkin;
            const malam = diffTime / (1000 * 60 * 60 * 24);

            document.getElementById('total').value = malam * harga;
        }

        document.getElementById('kamar').addEventListener('change', hitungTotal);
        document.getElementById('checkin').addEventListener('change', hitungTotal);
        document.getElementById('checkout').addEventListener('change', hitungTotal);
    </script>
@endsection
