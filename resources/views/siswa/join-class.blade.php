<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight flex items-center gap-2">
            ➕ {{ __('Gabung Kelas') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-blue-50 to-white min-h-screen">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-lg border border-gray-200">
            <h3 class="text-xl font-semibold text-gray-800 mb-6 text-center">📘 Pilih Kelas & Masukkan Token</h3>

            <form method="POST" action="{{ route('join.class') }}">
                @csrf

                <div class="mb-6">
                    <label for="class_id" class="block text-sm font-medium text-gray-700 mb-1">Pilih Kelas</label>
                    <select name="class_id" id="class_id"
                            class="w-full bg-white border border-gray-300 rounded-lg shadow-sm px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                        @php
                            $joinedClassIds = auth()->user()->classes->pluck('id')->toArray();
                            $availableClasses = $classes->filter(fn($class) => !in_array($class->id, $joinedClassIds));
                        @endphp

                        @forelse ($availableClasses as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @empty
                            <option disabled selected>Tidak ada kelas tersedia</option>
                        @endforelse
                    </select>

                    @if ($availableClasses->isEmpty())
                        <p class="text-sm text-red-500 mt-2 italic">
                            Kamu sudah tergabung di semua kelas yang tersedia.
                        </p>
                    @endif
                </div>

                <div class="mb-6">
                    <label for="token" class="block text-sm font-medium text-gray-700 mb-1">🔐 Token Kelas</label>
                    <input type="text" name="token" id="token"
                           class="w-full border border-gray-300 rounded-lg shadow-sm px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition"
                           placeholder="Masukkan token ..." required>
                    @error('token')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-8">
                    <x-primary-button class="w-full justify-center text-lg py-2">
                        🚀 Gabung Sekarang
                    </x-primary-button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <a href="{{ route('dashboard') }}"
                   class="text-sm text-blue-600 hover:underline transition inline-flex items-center gap-1">
                    ← Kembali ke Dashboard
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
