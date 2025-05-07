<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-gray-800 leading-tight flex items-center gap-2">
            📚 Kelas: {{ $class->name }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gradient-to-b from-gray-50 to-white min-h-screen">
        <div class="max-w-5xl mx-auto px-4">
            <h1 class="text-3xl font-bold text-gray-800 mb-8 border-b pb-2">Materi Pembelajaran</h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6">
                @for ($i = 1; $i <= 16; $i++)
                    @php
                        $material = $class->materials->firstWhere('pertemuan', $i);
                    @endphp

                    <div class="p-5 rounded-xl shadow bg-white hover:shadow-md transition">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">
                            📖 Pertemuan {{ $i }}
                        </h3>

                        @if ($material)
                            <p class="text-gray-700 mb-2">{{ $material->title }}</p>
                            <p class="text-sm text-gray-500 mb-3">{{ Str::limit($material->content, 100) }}</p>
                            @if ($material->file_path)
                                <a href="{{ asset('storage/' . $material->file_path) }}" target="_blank" class="text-blue-600 font-medium hover:underline text-sm">
                                    📄 Lihat Lampiran
                                </a>
                            @endif
                        @else
                            <p class="text-gray-400 italic">Belum ada materi untuk pertemuan ini.</p>
                        @endif
                    </div>
                @endfor
            </div>
        </div>
    </div>
</x-app-layout>
