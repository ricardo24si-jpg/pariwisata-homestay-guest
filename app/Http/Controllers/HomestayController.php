<?php
namespace App\Http\Controllers;

use App\Models\Homestay;
use Illuminate\Http\Request;

class HomestayController extends Controller
{
    public function index(Request $request)
    {
        $filterColumns = ['status', 'rt', 'rw'];
        $searchColumns = ['nama', 'alamat', 'fasilitas_json'];

        $homestays = Homestay::filter($request, $filterColumns)
            ->search($request, $searchColumns)
            ->paginate(9)
            ->withQueryString();

        return view('pages.homestay.index', compact('homestays'));
    }

    public function create()
    {
        return view('pages.homestay.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'            => 'required|string|max:100',
            'alamat'          => 'nullable|string|max:255',
            'rt'              => 'nullable|string|max:5',
            'rw'              => 'nullable|string|max:5',
            'fasilitas_json'  => 'nullable|string',
            'harga_per_malam' => 'nullable|numeric|min:0',
            'status'          => 'required|in:tersedia,penuh',
        ]);

        // Simpan JSON fasilitas
        $validated['fasilitas_json'] = $request->fasilitas_json
            ? json_encode(explode(',', $request->fasilitas_json))
            : null;

        Homestay::create($validated);
        return redirect()->route('homestay.index')->with('success', 'Data homestay berhasil ditambahkan!');
    }

    public function edit(Homestay $homestay)
    {
        return view('pages.homestay.edit', compact('homestay'));
    }

    public function update(Request $request, Homestay $homestay)
    {
        $validated = $request->validate([
            'nama'            => 'required|string|max:100',
            'alamat'          => 'nullable|string|max:255',
            'rt'              => 'nullable|string|max:5',
            'rw'              => 'nullable|string|max:5',
            'fasilitas_json'  => 'nullable|string',
            'harga_per_malam' => 'nullable|numeric|min:0',
            'status'          => 'required|in:tersedia,penuh',
        ]);

        $validated['fasilitas_json'] = $request->fasilitas_json
            ? json_encode(explode(',', $request->fasilitas_json))
            : null;

        $homestay->update($validated);
        return redirect()->route('homestay.index')->with('success', 'Data homestay berhasil diperbarui!');
    }

    public function destroy(Homestay $homestay)
    {
        $homestay->delete();
        return redirect()->route('homestay.index')->with('success', 'Data homestay berhasil dihapus!');
    }
}
