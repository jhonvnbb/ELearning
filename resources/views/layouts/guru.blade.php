<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Guru</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body class="bg-gradient-to-br from-blue-50 via-white to-blue-100 min-h-screen text-gray-800 font-sans">

    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-6 flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center gap-2 text-blue-600 text-2xl font-extrabold tracking-tight">
                🎓 <span>Teacher</span>
            </div>

            <!-- Hamburger Icon -->
            <button id="nav-toggle" class="md:hidden focus:outline-none text-blue-600 text-3xl transition-transform">
                <i class="fas fa-bars" id="nav-icon"></i>
            </button>

            <!-- Navigation Links -->
            <div id="nav-links"
                class="hidden md:flex flex-col md:flex-row items-start md:items-center absolute md:static top-full left-0 w-full md:w-auto bg-white md:bg-transparent shadow-md md:shadow-none px-6 md:px-0 py-4 md:py-0 z-40 space-y-3 md:space-y-0 md:space-x-6 transition-all duration-300 ease-in-out">

                <a href="{{ route('guru.dashboard') }}"
                class="text-gray-700 hover:text-blue-600 font-medium text-base transition duration-200">
                    🏠 Dashboard
                </a>

                <a href="{{ route('profile.edit') }}"
                class="text-gray-700 hover:text-blue-600 font-medium text-base transition duration-200">
                    👤 Profil
                </a>

                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="button"
                            onclick="confirmLogout()"
                            class="text-red-500 hover:text-red-700 font-medium text-base transition duration-200">
                        🚪 Keluar
                    </button>
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

    <!-- FOOTER  -->
    <footer class="text-center text-sm text-gray-500 py-6 mt-10">
        &copy; {{ date('Y') }} PELiS. All rights reserved.
    </footer>

    <script>
    const toggleBtn = document.getElementById('nav-toggle');
    const navLinks = document.getElementById('nav-links');
    const navIcon = document.getElementById('nav-icon');

    toggleBtn.addEventListener('click', () => {
        navLinks.classList.toggle('hidden');
        navLinks.classList.toggle('flex');

        // Animate icon (bars ↔ times)
        if (navIcon.classList.contains('fa-bars')) {
            navIcon.classList.remove('fa-bars');
            navIcon.classList.add('fa-xmark');
        } else {
            navIcon.classList.remove('fa-xmark');
            navIcon.classList.add('fa-bars');
        }
    });
</script>



    <script>
        function confirmLogout() {
            Swal.fire({
                title: 'Yakin ingin keluar?',
                text: "Anda akan keluar dari akun ini.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, keluar!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            });
        }
    </script>

</body>
</html>
