<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

        <!-- AOS CSS -->
        <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

        <!-- TOASTIFY -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main> 
        </div>

        <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                AOS.init({ duration: 800, once: true });
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                @if (session('success'))
                    Toastify({
                        text: "✅ {{ session('success') }}",
                        duration: 4000,
                        gravity: "top",
                        position: "left",
                        style: {
                            background: "linear-gradient(to right, #16a34a, #22c55e)",
                            borderRadius: "10px",
                            boxShadow: "0 4px 14px rgba(0, 0, 0, 0.1)",
                            padding: "14px 18px",
                            fontSize: "14px",
                            color: "#fff"
                        },
                        close: false,
                        stopOnFocus: true,
                    }).showToast();
                @endif

                @if (session('error'))
                    Toastify({
                        text: "❌{{ session('error') }}",
                        duration: 4000,
                        gravity: "top",
                        position: "left",
                        style: {
                            background: "linear-gradient(to right, #dc2626, #ef4444)",
                            borderRadius: "10px",
                            boxShadow: "0 4px 14px rgba(0, 0, 0, 0.1)",
                            padding: "14px 18px",
                            fontSize: "14px",
                            color: "#fff"
                        },
                        close: false,
                        stopOnFocus: true,
                    }).showToast();
                @endif
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>
</html>
