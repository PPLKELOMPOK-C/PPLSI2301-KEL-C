@extends('layouts.guest')
@section('title', 'Daftar Akun')

@section('auth-content')

{{-- Tab Switch --}}
<div class="tab-bar">
    <button class="tab-btn" data-tab="login" onclick="switchTab('login')">Masuk</button>
    <button class="tab-btn active" data-tab="register" onclick="switchTab('register')">Daftar</button>
</div>

{{-- ── Panel Login ── --}}
<div class="panel" id="panel-login">

    <h2 class="form-heading">Selamat datang</h2>
    <p class="form-sub">Masuk ke akun ASRI Anda</p>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="field">
            <label for="email">Alamat email <span class="req">*</span></label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required>
        </div>

        <div class="field">
            <label for="password">Password <span class="req">*</span></label>
            <input type="password" id="password" name="password" placeholder="••••••••" required>
        </div>

        <div class="remember-row">
            <label>
                <input type="checkbox" name="remember"> Ingat saya
            </label>
        </div>

        <button type="submit" class="btn-submit">Masuk</button>
    </form>

    <div class="divider">atau</div>

    

    <div class="auth-foot">
        Belum punya akun?
        <a href="#" onclick="switchTab('register'); return false">Daftar sekarang</a>
    </div>
</div>

{{-- ── Panel Register ── --}}
<div class="panel active" id="panel-register">

    <h2 class="form-heading">Buat akun baru</h2>
    <p class="form-sub">Daftar sebagai Calon Penghuni Rusunawa</p>

    @if($errors->any())
        <div class="alert alert-error">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="field-row">
            <div class="field">
                <label for="name">Nama lengkap <span class="req">*</span></label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Sesuai KTP"
                    class="{{ $errors->has('name') ? 'invalid' : '' }}"
                    required
                    autofocus
                >
                @error('name')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="phone">No. WhatsApp <span class="req">*</span></label>
                <input
                    type="text"
                    id="phone"
                    name="phone"
                    value="{{ old('phone') }}"
                    placeholder="08xxxxxxxxxx"
                    class="{{ $errors->has('phone') ? 'invalid' : '' }}"
                    required
                >
                <div class="field-hint">Untuk notifikasi dari pengelola</div>
                @error('phone')
                    <div class="field-error">{{ $message }}</div>
                @enderror
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
                class="{{ $errors->has('email') ? 'invalid' : '' }}"
                required
            >
            @error('email')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="field-row">
            <div class="field">
                <label for="reg-pass">Password <span class="req">*</span></label>
                <input
                    type="password"
                    id="reg-pass"
                    name="password"
                    placeholder="Min. 8 karakter"
                    class="{{ $errors->has('password') ? 'invalid' : '' }}"
                    required
                >
                @error('password')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="reg-pass-confirm">Konfirmasi <span class="req">*</span></label>
                <input
                    type="password"
                    id="reg-pass-confirm"
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
