<?php
namespace App\Http\Controllers;

use App\Models\DestinasiWisata;
use Illuminate\Http\Request;

class DestinasiWisataController extends Controller
{
    public function index(Request $request)
    {
        // Kolom untuk filter dan search
        $filterColumns = ['rt', 'rw'];
        $searchColumns = ['nama', 'alamat', 'deskripsi'];

        // Query builder memakai scope search() dan filter()
        $data = DestinasiWisata::filter($request, $filterColumns)
            ->search($request, $searchColumns)
            ->latest()
            ->paginate(9)
            ->withQueryString();

        return view('pages.destinasi.index', compact('data'));
    }

    public function create()
    {
        return view('pages.destinasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|max:100',
            'deskripsi' => 'nullable',
            'alamat'    => 'nullable|max:255',
            'rt'        => 'nullable|max:5',
            'rw'        => 'nullable|max:5',
            'jam_buka'  => 'nullable|max:50',
            'tiket'     => 'nullable|numeric',
            'kontak'    => 'nullable|max:50',
        ]);

        DestinasiWisata::create($request->all());

        return redirect()->route('destinasi.index')->with('success', 'Destinasi berhasil ditambahkan.');
    }

    public function show($id)
    {
        $destinasi = DestinasiWisata::findOrFail($id);
        return view('pages.destinasi.show', compact('destinasi'));
    }

    public function edit($id)
    {
        $destinasi = DestinasiWisata::findOrFail($id);
        return view('pages.destinasi.edit', compact('destinasi'));
    }

    public function update(Request $request, $id)
    {
        $destinasi = DestinasiWisata::findOrFail($id);

        $request->validate([
            'nama'      => 'required|max:100',
            'deskripsi' => 'nullable',
            'alamat'    => 'nullable|max:255',
            'rt'        => 'nullable|max:5',
            'rw'        => 'nullable|max:5',
            'jam_buka'  => 'nullable|max:50',
            'tiket'     => 'nullable|numeric',
            'kontak'    => 'nullable|max:50',
        ]);

        $destinasi->update($request->all());

        return redirect()->route('destinasi.index')->with('success', 'Destinasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        DestinasiWisata::destroy($id);
        return redirect()->route('destinasi.index')->with('success', 'Destinasi berhasil dihapus.');
    }
}
