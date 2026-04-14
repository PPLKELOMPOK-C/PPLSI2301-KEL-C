@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')

<h2 class="text-2xl font-bold mb-6">Dashboard Admin</h2>

<!-- STAT CARDS -->
<div class="grid grid-cols-4 gap-4 mb-6">

    <div class="bg-white p-4 rounded shadow">
        <h3 class="text-gray-500">Total Pengajuan</h3>
        <p class="text-2xl font-bold">120</p>
    </div>

    <div class="bg-white p-4 rounded shadow">
        <h3 class="text-gray-500">Menunggu Verifikasi</h3>
        <p class="text-2xl font-bold text-yellow-500">35</p>
    </div>

    <div class="bg-white p-4 rounded shadow">
        <h3 class="text-gray-500">Penghuni Aktif</h3>
        <p class="text-2xl font-bold text-green-600">80</p>
    </div>

    <div class="bg-white p-4 rounded shadow">
        <h3 class="text-gray-500">Unit Kosong</h3>
        <p class="text-2xl font-bold text-red-500">20</p>
    </div>

</div>

<!-- VERIFIKASI -->
<div class="bg-white p-4 rounded shadow mb-6">
    <h3 class="font-bold mb-3">Verifikasi Pengajuan</h3>

    <table class="w-full text-left">
        <thead>
            <tr class="border-b">
                <th>Nama</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b">
                <td>Jauza</td>
                <td class="text-yellow-500">Pending</td>
                <td>
                    <button class="bg-green-500 text-white px-2 py-1 rounded">Setujui</button>
                    <button class="bg-red-500 text-white px-2 py-1 rounded">Tolak</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- TAGIHAN -->
<div class="bg-white p-4 rounded shadow">
    <h3 class="font-bold mb-3">Tagihan</h3>
    <button class="bg-blue-500 text-white px-4 py-2 rounded">
        Generate Tagihan Bulanan
    </button>
</div>

@endsection
