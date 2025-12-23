<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $filterableColumns = ['role', 'jenis_kelamin'];
        $searchableColumns = ['name', 'email'];

        $users = User::with('profileMedia')
            ->filter($request, $filterableColumns)
            ->search($request, $searchableColumns)
            ->paginate(9)
            ->withQueryString();

        return view('pages.user.index', compact('users'));
    }

    public function create()
    {
        return view('pages.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role'     => 'required|in:admin,warga,mitra',
            'profile_picture' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        // SIMPAN FOTO KE MEDIA
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $path = $file->store('profile_pictures', 'public');

            Media::create([
                'ref_table' => 'users',
                'ref_id'    => $user->id,
                'file_name' => $path,
                'mime_type' => $file->getMimeType(),
            ]);
        }

        return redirect()->route('login')->with('success', 'User berhasil ditambahkan!');
    }

    public function edit(User $user)
    {
        $user->load('profileMedia');
        return view('pages.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => "required|email|unique:users,email,{$user->id}",
            'password' => 'nullable|min:8',
            'role'     => 'required|in:admin,warga,mitra',
            'profile_picture' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['name', 'email', 'role']);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        // UPDATE FOTO PROFIL
        if ($request->hasFile('profile_picture')) {

            if ($user->profileMedia) {
                Storage::disk('public')->delete($user->profileMedia->file_name);
                $user->profileMedia->delete();
            }

            $file = $request->file('profile_picture');
            $path = $file->store('profile_pictures', 'public');

            Media::create([
                'ref_table' => 'users',
                'ref_id'    => $user->id,
                'file_name' => $path,
                'mime_type' => $file->getMimeType(),
            ]);
        }

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui!');
    }

    public function destroy(User $user)
    {
        if ($user->profileMedia) {
            Storage::disk('public')->delete($user->profileMedia->file_name);
            $user->profileMedia->delete();
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus!');
    }
}
