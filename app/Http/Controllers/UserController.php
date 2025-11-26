<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Menampilkan daftar user.
     */
    public function index(Request $request)
    {
        // Kolom yang bisa difilter
        $filterableColumns = ['role', 'jenis_kelamin'];

        // Kolom yang bisa dicari
        $searchableColumns = ['name', 'email'];

        // Query + Filter + Search + Pagination
        $users = User::filter($request, $filterableColumns)
            ->search($request, $searchableColumns)
            ->paginate(9)
            ->withQueryString();

        return view('pages.user.index', compact('users'));
    }

    /**
     * Menampilkan form tambah user.
     */
    public function create()
    {
        return view('pages.user.create');
    }

    /**
     * Menyimpan user baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:8|regex:/[A-Z]/',
        ], [
            'name.required'     => 'Nama wajib diisi!',
            'email.required'    => 'Email wajib diisi!',
            'email.unique'      => 'Email sudah digunakan!',
            'password.required' => 'Password wajib diisi!',
            'password.min'      => 'Password minimal 8 karakter!',
            'password.regex'    => 'Password harus ada huruf kapital!',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password), /** HASH PASSWORD */
        ]);

        return redirect()->route('login')->with('success', 'User berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail user.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Menampilkan form edit user.
     */
    public function edit(User $user)
    {
        return view('pages.user.edit', compact('user'));
    }

    /**
     * Memperbarui data user.
     */

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'  => 'required',
            'email' => "required|email|unique:users,email,{$user->id}",
            'password'        => 'nullable|min:8|regex:/[A-Z]/',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'email']);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->has('remove_photo') && $user->profile_picture) {
            Storage::disk('public')->delete($user->profile_picture);
            $data['profile_picture'] = null;
        }

        // PROSES GAMBAR
        if ($request->hasFile('profile_picture')) {

            // Hapus foto lama
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            // Upload foto baru & simpan PATH
            $data['profile_picture'] = $request->file('profile_picture')
                ->store('profile_pictures', 'public');
        }

        // UPDATE DATABASE
        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui!');
    }

    /**
     * Menghapus user.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus!');
    }
}
