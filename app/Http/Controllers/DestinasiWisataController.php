<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use App\Models\DestinasiWisata;

class DestinasiWisataController extends Controller
{
    public function index(Request $request)
    {
        $filterColumns = ['rt', 'rw'];
        $searchColumns = ['nama', 'alamat', 'deskripsi'];

        // load data destinasi dengan medias
        $data = DestinasiWisata::with('medias') // <-- penting
            ->filter($request, $filterColumns)
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
            'media.*'   => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Simpan destinasi dulu, simpan ke variabel
        $destinasi = DestinasiWisata::create($request->all());

        // Simpan media jika ada
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('destinasi', $filename, 'public');

                Media::create([
                    'ref_table' => 'destinasi_wisata',
                    'ref_id'    => $destinasi->destinasi_id, // sekarang ada id
                    'file_name' => 'destinasi/' . $filename,
                    'mime_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return redirect()->route('destinasi.index')->with('success', 'Destinasi berhasil ditambahkan.');
    }


    public function show($id)
    {
        $destinasi = DestinasiWisata::findOrFail($id);

        $medias = Media::where('ref_table', 'destinasi_wisata')
            ->where('ref_id', $id)
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('pages.destinasi.show', compact('destinasi', 'medias'));
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
            'media.*'   => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // 🟩 Update data utama (selain media)
        $destinasi->update($request->except('media'));

        // 🟨 Jika ada file baru yang diupload
        if ($request->hasFile('media')) {

            // 🔻 Hapus media lama biar gak dobel
            Media::where('ref_table', 'destinasi_wisata')
                ->where('ref_id', $destinasi->destinasi_id)
                ->delete();

            // 🔺 Simpan file baru
            foreach ($request->file('media') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('destinasi', $filename, 'public');

                Media::create([
                    'ref_table' => 'destinasi_wisata',
                    'ref_id'    => $destinasi->destinasi_id,
                    'file_name' => $path,
                    'mime_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return redirect()->route('destinasi.index')->with('success', 'Destinasi berhasil diperbarui.');
    }



    public function destroy($id)
    {
        DestinasiWisata::destroy($id);
        return redirect()->route('destinasi.index')->with('success', 'Destinasi berhasil dihapus.');
    }
}
