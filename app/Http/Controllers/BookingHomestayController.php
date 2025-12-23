<?php

namespace App\Http\Controllers;

use App\Models\BookingHomestay;
use App\Models\KamarHomestay;
use App\Models\Warga;
use App\Models\Media;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingHomestayController extends Controller
{
    public function index()
    {
        return view('pages.booking.index', [
            'booking' => BookingHomestay::with(['kamar', 'warga', 'media'])
                ->latest()
                ->get()
        ]);
    }

    public function create()
    {
        return view('pages.booking.create', [
            'kamar' => KamarHomestay::orderBy('nama_kamar')->get(),
            'warga' => Warga::orderBy('nama')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kamar_id'     => 'required|exists:kamar_homestay,kamar_id',
            'warga_id'     => 'required|exists:warga,warga_id',
            'checkin'      => 'required|date',
            'checkout'     => 'required|date|after:checkin',
            'status'       => 'required',
            'metode_bayar' => 'required',
            'bukti'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $kamar = KamarHomestay::findOrFail($request->kamar_id);
        $malam = Carbon::parse($request->checkin)
            ->diffInDays(Carbon::parse($request->checkout));

        $total = $malam * $kamar->harga;

        $booking = BookingHomestay::create([
            'kamar_id'     => $request->kamar_id,
            'warga_id'     => $request->warga_id,
            'checkin'      => $request->checkin,
            'checkout'     => $request->checkout,
            'total'        => $total,
            'status'       => $request->status,
            'metode_bayar' => $request->metode_bayar,
        ]);

        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');
            $path = $file->store('bukti-pembayaran', 'public');

            Media::create([
                'ref_table' => 'booking_homestay',
                'ref_id'    => $booking->booking_id,
                'file_name' => $path,
                'caption'   => 'Bukti Pembayaran',
                'mime_type' => $file->getClientMimeType(),
                'sort_order'=> 1
            ]);
        }

        return redirect()->route('booking.index')
            ->with('success', 'Booking homestay berhasil ditambahkan.');
    }

    public function show(BookingHomestay $booking)
    {
        $booking->load('media');
        return view('pages.booking.show', compact('booking'));
    }

    public function edit(BookingHomestay $booking)
    {
        return view('pages.booking.edit', [
            'booking' => $booking,
            'kamar'   => KamarHomestay::orderBy('nama_kamar')->get(),
            'warga'   => Warga::orderBy('nama')->get(),
        ]);
    }

    public function update(Request $request, BookingHomestay $booking)
    {
        $request->validate([
            'kamar_id'     => 'required|exists:kamar_homestay,kamar_id',
            'warga_id'     => 'required|exists:warga,warga_id',
            'checkin'      => 'required|date',
            'checkout'     => 'required|date|after:checkin',
            'status'       => 'required',
            'metode_bayar' => 'required',
            'bukti'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $kamar = KamarHomestay::findOrFail($request->kamar_id);
        $malam = Carbon::parse($request->checkin)
            ->diffInDays(Carbon::parse($request->checkout));

        $total = $malam * $kamar->harga;

        $booking->update([
            'kamar_id'     => $request->kamar_id,
            'warga_id'     => $request->warga_id,
            'checkin'      => $request->checkin,
            'checkout'     => $request->checkout,
            'total'        => $total,
            'status'       => $request->status,
            'metode_bayar' => $request->metode_bayar,
        ]);

        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');
            $path = $file->store('bukti-pembayaran', 'public');

            Media::create([
                'ref_table' => 'booking_homestay',
                'ref_id'    => $booking->booking_id,
                'file_name' => $path,
                'caption'   => 'Bukti Pembayaran',
                'mime_type' => $file->getClientMimeType(),
                'sort_order'=> 1
            ]);
        }

        return redirect()->route('booking.index')
            ->with('success', 'Booking berhasil diperbarui.');
    }

    public function destroy(BookingHomestay $booking)
    {
        $booking->media()->delete();
        $booking->delete();

        return redirect()->route('booking.index')
            ->with('success', 'Booking berhasil dihapus.');
    }
}
