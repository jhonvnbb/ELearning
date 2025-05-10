<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Guru</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-blue-50 via-white to-blue-100 min-h-screen text-gray-800 font-sans">

    <!-- NAVBAR -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-blue-600 tracking-wide flex items-center gap-2">
                🎓 <span>Teacher</span>
            </h1>
            <div class="flex gap-6 items-center">
                <a href="{{ route('guru.dashboard') }}" class="text-gray-700 hover:text-blue-600 font-semibold transition duration-200">🏠 Dashboard</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-red-500 hover:text-red-700 font-semibold transition duration-200">🚪 Keluar</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main class="py-10">
        <div class="max-w-7xl mx-auto px-6">
            @yield('content')
        </div>
    </main>

    <!-- FOOTER (Optional) -->
    <footer class="text-center text-sm text-gray-500 py-6 mt-10">
        &copy; {{ date('Y') }} Sistem Pembelajaran Guru. All rights reserved.
    </footer>

</body>
</html>
