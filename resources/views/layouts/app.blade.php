{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ASRI — @yield('title', 'Revitalisasi SIRUKIM')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'asri-green': {
                            50:  '#f0fdf4',
                            100: '#dcfce7',
                            500: '#22c55e',
                            600: '#2d6a4f',
                            700: '#1b5e20',
                            800: '#1a4731',
                            900: '#0f2d1a',
                        },
                        'asri-cream': {
                            50:  '#fffdf7',
                            100: '#fdf8ef',
                            200: '#f5f0e8',
                            300: '#ede4d0',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Segoe UI', system-ui, sans-serif; }
        .sidebar-item { transition: all 0.2s ease; }
        .sidebar-item:hover { transform: translateX(4px); }
    </style>
    @stack('styles')
</head>
<body class="bg-asri-cream-200 min-h-screen">

{{-- NAVBAR --}}
<nav class="bg-asri-green-600 text-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center">
                    <span class="text-asri-green-600 font-bold text-sm">🏛</span>
                </div>
                <span class="font-bold text-lg tracking-wide">ASRI</span>
                <span class="text-green-200 text-sm hidden sm:block">| Revitalisasi SIRUKIM</span>
            </div>

            <div class="flex items-center gap-4">
                {{-- Badge Role --}}
                @auth
                <span class="bg-white/20 text-white text-xs px-3 py-1 rounded-full capitalize">
                    {{ auth()->user()->role }}
                </span>
                {{-- Avatar & Name --}}
                <div class="flex items-center gap-2">
                    <img src="{{ auth()->user()->getAvatarUrl() }}"
                         alt="Avatar"
                         class="w-8 h-8 rounded-full object-cover border-2 border-white/50">
                    <span class="text-sm hidden sm:block">{{ auth()->user()->name }}</span>
                </div>
                {{-- Logout --}}
                <form method="POST" action="/logout" class="inline">
                    @csrf
                    <button type="submit"
                            class="bg-white/10 hover:bg-white/20 text-white text-sm px-3 py-1.5 rounded-lg transition">
                        Logout
                    </button>
                </form>
                @endauth
            </div>
        </div>
    </div>
</nav>

{{-- MAIN CONTENT --}}
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="mb-4 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg flex items-center gap-2">
            <span>✅</span> {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-4 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg flex items-center gap-2">
            <span>❌</span> {{ session('error') }}
        </div>
    @endif

    @if(session('info'))
        <div class="mb-4 bg-blue-50 border border-blue-200 text-blue-800 px-4 py-3 rounded-lg flex items-center gap-2">
            <span>ℹ️</span> {{ session('info') }}
        </div>
    @endif

    @yield('content')
</main>

@stack('scripts')
</body>
</html>