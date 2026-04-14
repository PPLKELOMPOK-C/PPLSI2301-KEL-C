<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    /**
     * Tampilkan form login
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Proses login
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()
                ->withErrors([
                    'email' => 'Email atau password salah.',
                ])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        return $this->redirectByRole(Auth::user());
    }

    /**
     * Tampilkan form registrasi
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Proses pendaftaran akun baru
     */
    public function register(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'unique:users,email'],
                'phone' => ['required', 'string', 'max:20'],
                'password' => ['required', 'confirmed', Password::min(8)],
            ],
            [
                'email.unique' => 'Email ini sudah digunakan.',
            ]
        );

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => $validated['password'], // auto hash dari model
            'role' => 'calon_penghuni',
            'status' => 'aktif',
        ]);

        Auth::login($user);

        return redirect()
            ->route('calon.dashboard')
            ->with('success', 'Akun berhasil dibuat!');
    }

    /**
     * Redirect ke dashboard sesuai role
     */
    private function redirectByRole(User $user)
    {
        return match ($user->role) {
            'admin' => redirect()->route('admin.dashboard'),
            'penghuni' => redirect()->route('penghuni.dashboard'),
            'calon_penghuni' => redirect()->route('calon.dashboard'),
            default => redirect('/'),
        };
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
