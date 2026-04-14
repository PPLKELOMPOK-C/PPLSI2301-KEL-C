<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User; // Pastikan Model User di-import

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil.
     */
    public function show()
    {
        /** @var User $user */
        $user = Auth::user();
        
        return view('profile.show', compact('user'));
    }

    /**
     * Memperbarui data profil.
     */
    public function update(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        // Validasi Input
        $request->validate([
            'name'   => ['required', 'string', 'max:255'],
            'phone'  => ['nullable', 'string', 'max:20'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ], [
            'name.required'  => 'Nama wajib diisi.',
            'avatar.image'   => 'File harus berupa gambar.',
            'avatar.mimes'   => 'Format gambar: jpg, jpeg, png, webp.',
            'avatar.max'     => 'Ukuran gambar maksimal 2MB.',
        ]);

        // Data dasar yang akan diupdate
        $data = [
            'name'  => $request->name,
            'phone' => $request->phone,
        ];

        // Logika Upload Avatar
        if ($request->hasFile('avatar')) {
            // 1. Hapus foto lama jika ada di storage (bukan URL Google/Luar)
            if ($user->avatar && !str_starts_with($user->avatar, 'http')) {
                Storage::disk('public')->delete($user->avatar);
            }

            // 2. Simpan foto baru ke folder 'avatars' di disk 'public'
            $path = $request->file('avatar')->store('avatars', 'public');
            $data['avatar'] = $path;
        }

        // Eksekusi Update
        // Sekarang garis merah pada update() harusnya hilang karena ada @var User di atas
        $user->update($data);

        return back()->with('success', 'Profil berhasil diperbarui!');
    }
}