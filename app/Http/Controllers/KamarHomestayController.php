<?php
namespace App\Http\Controllers;

use App\Models\Homestay;
use App\Models\KamarHomestay;
use Illuminate\Http\Request;

class KamarHomestayController extends Controller
{
    public function index(Request $request)
    {
        // kolom untuk filter exact
        $filterColumns = ['homestay_id', 'kapasitas'];

        // kolom untuk search LIKE
        $searchColumns = ['nama_kamar', 'harga', 'fasilitas_json'];

        $kamars = KamarHomestay::with('homestay')
            ->filter($request, $filterColumns)
            ->search($request, $searchColumns)
            ->paginate(12)
            ->withQueryString();

        $homestays = Homestay::all();

        return view('pages.kamar.index', compact('kamars', 'homestays'));
    }

    public function create()
    {
        $homestays = Homestay::all();
        return view('pages.kamar.create', compact('homestays'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'homestay_id' => 'required|integer|exists:homestay,homestay_id',
            'nama_kamar'  => 'required|string|max:100',
            'kapasitas'   => 'required|integer|min:1',
            'harga'       => 'required|numeric|min:0',
            'fasilitas'   => 'nullable|array',
            'foto.*'      => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $kamar = KamarHomestay::create([
            'homestay_id'    => $validated['homestay_id'],
            'nama_kamar'     => $validated['nama_kamar'],
            'kapasitas'      => $validated['kapasitas'],
            'harga'          => $validated['harga'],
            'fasilitas_json' => json_encode($validated['fasilitas'] ?? [])
        ]);

        // Upload foto
        // if ($request->hasFile('foto')) {
        // foreach ($request->file('foto') as $file) {
        // $path = $file->store('uploads/kamar', 'public');
        // Media::create([
        // 'kamar_id'  => $kamar->kamar_id,
        // 'file_path' => $path,
        // ]);
        // }
        // }

        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil ditambahkan');
    }

    public function edit(KamarHomestay $kamar)
    {
        $homestays = Homestay::all();
        return view('pages.kamar.edit', compact('kamar', 'homestays'));
    }

    public function update(Request $request, KamarHomestay $kamar)
    {
        $validated = $request->validate([
            'homestay_id' => 'required|integer|exists:homestay,homestay_id',
            'nama_kamar'  => 'required|string|max:100',
            'kapasitas'   => 'required|integer|min:1',
            'harga'       => 'required|numeric|min:0',
            'fasilitas'   => 'nullable|array',
            'foto.*'      => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $kamar->update([
            'homestay_id'    => $validated['homestay_id'],
            'nama_kamar'     => $validated['nama_kamar'],
            'kapasitas'      => $validated['kapasitas'],
            'harga'          => $validated['harga'],
            'fasilitas_json' => json_encode($validated['fasilitas'] ?? [])
        ]);

        // Upload tambahan foto
        // if ($request->hasFile('foto')) {
        // foreach ($request->file('foto') as $file) {
        // $path = $file->store('uploads/kamar', 'public');
        // Media::create([
        // 'kamar_id'  => $kamar->kamar_id,
        // 'file_path' => $path,
        // ]);
        // }
        // }

        return redirect()->route('kamar.index')->with('success', 'Data kamar berhasil diperbarui!');
    }

    public function destroy(KamarHomestay $kamar)
    {
        // $kamar->media()->delete();
        $kamar->delete();
        return redirect()->route('kamar.index')->with('success', 'Data kamar berhasil dihapus!');
    }
}
