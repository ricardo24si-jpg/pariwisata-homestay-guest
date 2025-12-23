<?php

namespace App\Http\Controllers;

use App\Models\UlasanWisata;
use App\Models\DestinasiWisata;
use App\Models\Warga;
use Illuminate\Http\Request;

class UlasanWisataController extends Controller
{
    public function index()
    {
        return view('pages.ulasan.index', [
            'ulasan' => UlasanWisata::with(['destinasi', 'warga'])
                        ->orderByDesc('waktu')
                        ->get(),
        ]);
    }

    public function create()
    {
        return view('pages.ulasan.create', [
            'destinasi' => DestinasiWisata::orderBy('nama')->get(),
            'warga'     => Warga::orderBy('nama')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'destinasi_id' => 'required|exists:destinasi_wisata,destinasi_id',
            'warga_id'     => 'required|exists:warga,warga_id',
            'rating'       => 'required|integer|min:1|max:5',
            'komentar'     => 'required|min:10',
        ]);

        $validated['waktu'] = now();

        UlasanWisata::create($validated);

        return redirect()
            ->route('ulasan.index')
            ->with('success', 'Ulasan wisata berhasil ditambahkan.');
    }

    public function edit(UlasanWisata $ulasan)
    {
        return view('pages.ulasan.edit', [
            'ulasan'    => $ulasan,
            'destinasi' => DestinasiWisata::orderBy('nama')->get(),
            'warga'     => Warga::orderBy('nama')->get(),
        ]);
    }

    public function update(Request $request, UlasanWisata $ulasan)
    {
        $validated = $request->validate([
            'destinasi_id' => 'required|exists:destinasi_wisata,destinasi_id',
            'warga_id'     => 'required|exists:warga,warga_id',
            'rating'       => 'required|integer|min:1|max:5',
            'komentar'     => 'required|min:10',
        ]);

        $ulasan->update($validated);

        return redirect()
            ->route('ulasan.index')
            ->with('success', 'Ulasan wisata berhasil diperbarui.');
    }

    public function destroy(UlasanWisata $ulasan)
    {
        $ulasan->delete();

        return redirect()
            ->route('ulasan.index')
            ->with('success', 'Ulasan wisata berhasil dihapus.');
    }
}
