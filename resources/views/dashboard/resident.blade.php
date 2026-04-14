{{-- resources/views/dashboard/resident.blade.php --}}
@extends('layouts.app')

@section('title', 'Dashboard Penghuni')

@section('content')
<div class="space-y-6">
    {{-- Header --}}
    <div class="bg-green-700 text-white rounded-2xl p-6 shadow-lg">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold">Dashboard Penghuni</h1>
                <p class="text-green-200 mt-1">Selamat datang, {{ $user->name }}</p>
            </div>
            <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center">
                <span class="text-3xl">🏠</span>
            </div>
        </div>
    </div>

    {{-- Status Card --}}
    <div class="bg-white rounded-xl p-6 shadow-sm border border-green-200">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                <span class="text-green-600">✓</span>
            </div>
            <div>
                <p class="font-medium text-gray-800">Status Penghuni</p>
                <p class="text-green-600 text-sm font-medium">Aktif & Terverifikasi</p>
            </div>
        </div>
    </div>

    {{-- Menu --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <a href="/profile" class="bg-white rounded-xl p-5 shadow-sm border border-gray-100 hover:border-green-300 transition text-center">
            <span class="text-3xl block mb-2">👤</span>
            <p class="text-sm font-medium text-gray-700">Profil Saya</p>
        </a>
        <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100 text-center opacity-60">
            <span class="text-3xl block mb-2">📄</span>
            <p class="text-sm font-medium text-gray-700">Dokumen</p>
        </div>
        <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100 text-center opacity-60">
            <span class="text-3xl block mb-2">💳</span>
            <p class="text-sm font-medium text-gray-700">Pembayaran</p>
        </div>
        <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100 text-center opacity-60">
            <span class="text-3xl block mb-2">📢</span>
            <p class="text-sm font-medium text-gray-700">Pengumuman</p>
        </div>
    </div>
</div>
@endsection