<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl md:text-2xl font-bold text-gray-800 flex items-center gap-2">
            👤 {{ __('Profile Saya') }}
        </h2>
    </x-slot>

    <div class="py-6 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-6">

                {{-- Main Form Section --}}
                <div class="md:col-span-2 space-y-6">
                    {{-- Update Profile Section --}}
                    <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300 p-5 sm:p-6">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="text-2xl">✏️</div>
                            <h3 class="text-lg sm:text-xl font-semibold text-gray-800 border-b pb-2 w-full">
                                Edit Informasi Profil
                            </h3>
                        </div>
                        @include('profile.partials.update-profile-information-form')
                    </div>

                    {{-- Change Password Section --}}
                    <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300 p-5 sm:p-6">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="text-2xl">🔒</div>
                            <h3 class="text-lg sm:text-xl font-semibold text-gray-800 border-b pb-2 w-full">
                                Ubah Kata Sandi
                            </h3>
                        </div>
                        @include('profile.partials.update-password-form')
                    </div>

                    {{-- Delete Account Section --}}
                    <div class="bg-white rounded-lg shadow-md border border-red-300 hover:shadow-lg transition-all duration-300 p-5 sm:p-6">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="text-2xl text-red-600">⚠️</div>
                            <h3 class="text-lg sm:text-xl font-semibold text-red-600 border-b pb-2 w-full">
                                Hapus Akun
                            </h3>
                        </div>
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>

                {{-- Sidebar Accessories --}}
                <div class="space-y-6">

                    {{-- Info Akun --}}
                    <div class="bg-white rounded-lg shadow p-4">
                        <h4 class="text-xl font-semibold text-gray-800 mb-3">👨‍🎓 Status Akun</h4>
                        <p class="text-sm text-gray-600 mb-1">
                            <span class="font-medium text-gray-800">Nama:</span>
                            {{ Auth::user()->name ?? '-' }}
                        </p>
                        <div class="text-sm text-gray-600">
                            <span class="font-medium text-gray-800">Kelas:</span>
                            <ul class="mt-1 ml-3 list-disc list-inside space-y-1">
                                @foreach (auth()->user()->classes as $class)
                                    <li>
                                        <a href="{{ route('siswa.class-content', $class->id) }}"
                                        class="text-blue-600 hover:underline">
                                            {{ $class->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    {{-- Info Sekolah --}}
                    <div class="bg-white rounded-lg shadow p-4">
                        <h4 class="text-xl font-semibold text-gray-800 mb-3">🏫 Info Sekolah</h4>
                        <ul class="text-sm text-gray-700 list-disc ml-5 space-y-1">
                            <li><span class="font-medium">Nama Sekolah:</span> SMA Negeri 1 Lahat</li>
                            <li><span class="font-medium">NPSN:</span> 10700195</li>
                            <li><span class="font-medium">Akreditasi:</span> A (Unggul)</li>
                        </ul>
                    </div>

                    {{-- Panduan Singkat --}}
                    <div class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded">
                        <h4 class="text-base font-semibold text-blue-700 mb-1">📘 Panduan</h4>
                        <ul class="text-sm text-blue-800 list-disc ml-5 space-y-1">
                            <li>Gunakan menu di atas untuk mengedit profil.</li>
                            <li>Pastikan data sesuai dengan dokumen resmi.</li>
                            <li>Laporkan jika ada kesalahan data ke BK.</li>
                        </ul>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
