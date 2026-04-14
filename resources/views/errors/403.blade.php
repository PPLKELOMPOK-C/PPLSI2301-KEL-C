{{-- resources/views/errors/403.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>403 — Akses Ditolak | ASRI</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-green-50 flex items-center justify-center">
    <div class="text-center px-4">
        <div class="text-8xl mb-4">🚫</div>
        <h1 class="text-4xl font-bold text-green-800 mb-2">403</h1>
        <h2 class="text-xl font-semibold text-gray-700 mb-3">Akses Ditolak</h2>
        <p class="text-gray-500 mb-6 max-w-sm mx-auto">
            {{ $exception->getMessage() ?: 'Anda tidak memiliki izin untuk mengakses halaman ini.' }}
        </p>
        @auth
        <a href="{{ auth()->user()->getDashboardRoute() }}"
           class="bg-green-700 hover:bg-green-800 text-white px-6 py-2.5 rounded-lg transition inline-block">
            Kembali ke Dashboard
        </a>
        @else
        <a href="/login"
           class="bg-green-700 hover:bg-green-800 text-white px-6 py-2.5 rounded-lg transition inline-block">
            Login
        </a>
        @endauth
    </div>
</body>
</html>