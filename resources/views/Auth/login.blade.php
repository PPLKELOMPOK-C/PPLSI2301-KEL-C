@extends('layouts.guest')
@section('title', 'Masuk')

@section('auth-content')

{{-- Tab Switch --}}
<div class="tab-bar">
    <button class="tab-btn active" data-tab="login" onclick="switchTab('login')">Masuk</button>
    <button class="tab-btn" data-tab="register" onclick="switchTab('register')">Daftar</button>
</div>

{{-- ── Panel Login ── --}}
<div class="panel active" id="panel-login">

    <h2 class="form-heading">Selamat datang</h2>
    <p class="form-sub">Masuk ke akun ASRI Anda</p>

    @if($errors->any())
        <div class="alert alert-error">{{ $errors->first() }}</div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="field">
            <label for="email">Alamat email <span class="req">*</span></label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="nama@email.com"
                class="{{ $errors->has('email') ? 'invalid' : '' }}"
                required
                autofocus
            >
            @error('email')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="field">
            <label for="password">Password <span class="req">*</span></label>
            <input
                type="password"
                id="password"
                name="password"
                placeholder="••••••••"
                class="{{ $errors->has('password') ? 'invalid' : '' }}"
                required
            >
            @error('password')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="remember-row">
            <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                Ingat saya
            </label>
            {{-- Uncomment jika sudah ada fitur reset password --}}
            {{-- <a href="{{ route('password.request') }}" class="link-muted">Lupa password?</a> --}}
        </div>

        <button type="submit" class="btn-submit">Masuk</button>
    </form>

    <div class="divider">atau</div>

    

    <div class="auth-foot">
        Belum punya akun?
        <a href="#" onclick="switchTab('register'); return false">Daftar sekarang</a>
    </div>

</div>

{{-- ── Panel Register (embed di halaman yang sama) ── --}}
<div class="panel" id="panel-register">

    <h2 class="form-heading">Buat akun baru</h2>
    <p class="form-sub">Daftar sebagai Calon Penghuni Rusunawa</p>

    @if($errors->registerBag ?? false)
        <div class="alert alert-error">{{ $errors->registerBag->first() }}</div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="field-row">
            <div class="field">
                <label for="reg-name">Nama lengkap <span class="req">*</span></label>
                <input
                    type="text"
                    id="reg-name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Sesuai KTP"
                    required
                >
            </div>
            <div class="field">
                <label for="reg-phone">No. WhatsApp <span class="req">*</span></label>
                <input
                    type="text"
                    id="reg-phone"
                    name="phone"
                    value="{{ old('phone') }}"
                    placeholder="08xxxxxxxxxx"
                    required
                >
                <div class="field-hint">Untuk notifikasi dari pengelola</div>
            </div>
        </div>

        <div class="field">
            <label for="reg-email">Alamat email <span class="req">*</span></label>
            <input
                type="email"
                id="reg-email"
                name="email"
                value="{{ old('email') }}"
                placeholder="nama@email.com"
                required
            >
        </div>

        <div class="field-row">
            <div class="field">
                <label for="reg-password">Password <span class="req">*</span></label>
                <input
                    type="password"
                    id="reg-password"
                    name="password"
                    placeholder="Min. 8 karakter"
                    required
                >
            </div>
            <div class="field">
                <label for="reg-password-confirm">Konfirmasi <span class="req">*</span></label>
                <input
                    type="password"
                    id="reg-password-confirm"
                    name="password_confirmation"
                    placeholder="Ulangi password"
                    required
                >
            </div>
        </div>

        <button type="submit" class="btn-submit">Buat Akun</button>
    </form>

    <div class="divider">atau daftar dengan</div>

    

    <div class="auth-foot">
        Sudah punya akun?
        <a href="#" onclick="switchTab('login'); return false">Masuk di sini</a>
    </div>

</div>

@endsection

@push('scripts')
<script>
    {{-- Jika ada error dari register, langsung buka tab register --}}
    @if(session('show_register') || old('_register'))
        document.addEventListener('DOMContentLoaded', () => switchTab('register'));
    @endif
</script>
@endpush
