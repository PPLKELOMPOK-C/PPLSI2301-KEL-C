{{-- resources/views/profile/show.blade.php --}}
@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    {{-- Header --}}
    <div class="bg-green-700 text-white rounded-2xl p-6 shadow-lg">
        <h1 class="text-xl font-bold">Profil Saya</h1>
        <p class="text-green-200 text-sm mt-1">Kelola informasi akun Anda</p>
    </div>

    {{-- Success / Error --}}
    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-xl">
            ✅ {{ session('success') }}
        </div>
    @endif

    {{-- Avatar Section --}}
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 text-center">
        <img src="{{ $user->getAvatarUrl() }}"
             alt="Avatar"
             id="avatarPreview"
             class="w-24 h-24 rounded-full object-cover border-4 border-green-100 mx-auto mb-3">
        <p class="font-semibold text-gray-800 text-lg">{{ $user->name }}</p>
        <p class="text-gray-500 text-sm">{{ $user->email }}</p>

        <div class="flex justify-center gap-2 mt-3">
            <span class="bg-green-100 text-green-800 text-xs font-medium px-3 py-1 rounded-full capitalize">
                {{ $user->role }}
            </span>
            <span class="text-xs font-medium px-3 py-1 rounded-full capitalize
                {{ $user->status === 'approved' ? 'bg-green-100 text-green-800' : '' }}
                {{ $user->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                {{ $user->status === 'rejected' ? 'bg-red-100 text-red-800' : '' }}">
                {{ $user->status }}
            </span>
        </div>
    </div>

    {{-- Form Update --}}
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <h2 class="text-lg font-semibold text-gray-800 mb-5">Edit Informasi</h2>

        @if($errors->any())
            <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm">
                @foreach($errors->all() as $error)
                    <p>• {{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="/profile" enctype="multipart/form-data" class="space-y-5">
            @csrf

            {{-- Upload Avatar --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Foto Profil</label>
                <div class="flex items-center gap-4">
                    <label for="avatarInput" class="cursor-pointer bg-gray-50 hover:bg-gray-100 border border-dashed border-gray-300 text-gray-600 text-sm px-4 py-2 rounded-lg transition">
                        📷 Pilih Foto
                    </label>
                    <span class="text-gray-400 text-sm" id="fileName">Belum ada file dipilih</span>
                </div>
                <input type="file"
                       name="avatar"
                       id="avatarInput"
                       accept="image/jpg,image/jpeg,image/png,image/webp"
                       class="hidden"
                       onchange="previewAvatar(this)">
                <p class="text-gray-400 text-xs mt-1">Format: JPG, PNG, WEBP. Maks. 2MB</p>
            </div>

            {{-- Nama --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                <input type="text"
                       name="name"
                       value="{{ old('name', $user->name) }}"
                       class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 transition"
                       required>
            </div>

            {{-- Email (readonly) --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email"
                       value="{{ $user->email }}"
                       class="w-full px-4 py-2.5 border border-gray-100 bg-gray-50 rounded-lg text-gray-500 cursor-not-allowed"
                       readonly>
                <p class="text-gray-400 text-xs mt-1">Email tidak dapat diubah</p>
            </div>

            {{-- Phone --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">No. Telepon</label>
                <input type="tel"
                       name="phone"
                       value="{{ old('phone', $user->phone) }}"
                       placeholder="08xx-xxxx-xxxx"
                       class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 transition">
            </div>

            {{-- Role & Status (readonly) --}}
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                    <input type="text"
                           value="{{ ucfirst($user->role) }}"
                           class="w-full px-4 py-2.5 border border-gray-100 bg-gray-50 rounded-lg text-gray-500 cursor-not-allowed capitalize"
                           readonly>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <input type="text"
                           value="{{ ucfirst($user->status) }}"
                           class="w-full px-4 py-2.5 border border-gray-100 bg-gray-50 rounded-lg text-gray-500 cursor-not-allowed capitalize"
                           readonly>
                </div>
            </div>

            <button type="submit"
                    class="w-full bg-green-700 hover:bg-green-800 text-white font-medium py-2.5 rounded-lg transition shadow-md">
                Simpan Perubahan
            </button>
        </form>
    </div>

    {{-- Back Button --}}
    <a href="{{ auth()->user()->getDashboardRoute() }}"
       class="block text-center text-green-700 hover:underline text-sm">
        ← Kembali ke Dashboard
    </a>
</div>

@push('scripts')
<script>
function previewAvatar(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('avatarPreview').src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
        document.getElementById('fileName').textContent = input.files[0].name;
    }
}
</script>
@endpush
@endsection