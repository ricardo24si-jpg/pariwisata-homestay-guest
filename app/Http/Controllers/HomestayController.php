<?php
namespace App\Http\Controllers;

use App\Models\Homestay;
use Illuminate\Http\Request;

class HomestayController extends Controller
{
    /**
     * Menampilkan daftar homestay dengan filter & search
     */
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

    /**
     * Form tambah homestay
     */
    public function create()
    {
        return view('pages.homestay.create');
    }

    /**
     * Simpan homestay baru
     */
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
            ? json_encode(array_map('trim', explode(',', $request->fasilitas_json)))
            : null;

        Homestay::create($validated);
        return redirect()->route('homestay.index')->with('success', 'Data homestay berhasil ditambahkan!');
    }

    /**
     * Form edit homestay
     */
    public function edit(Homestay $homestay)
    {
        // Jika ingin tampilan form dengan fasilitas diubah menjadi string CSV
        if (is_array($homestay->fasilitas_json)) {
            $homestay->fasilitas_json = implode(', ', $homestay->fasilitas_json);
        }
        return view('pages.homestay.edit', compact('homestay'));
    }

    /**
     * Update data homestay
     */
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
            ? json_encode(array_map('trim', explode(',', $request->fasilitas_json)))
            : null;

        $homestay->update($validated);
        return redirect()->route('homestay.index')->with('success', 'Data homestay berhasil diperbarui!');
    }

    /**
     * Hapus homestay
     */
    public function destroy(Homestay $homestay)
    {
        $homestay->delete();
        return redirect()->route('homestay.index')->with('success', 'Data homestay berhasil dihapus!');
    }

    /**
     * Validasi sebelum booking (opsional jika ingin cek lewat controller booking)
     */
    public function checkAvailability(Homestay $homestay)
    {
        if ($homestay->status === 'penuh') {
            return redirect()->back()->with('error', 'Homestay sedang penuh, silakan pilih homestay lain.');
        }

        // Jika tersedia, redirect ke halaman booking
        return redirect()->route('booking.create', ['homestay_id' => $homestay->homestay_id]);
    }
}
