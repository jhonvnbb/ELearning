<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl">Gabung Kelas</h2>
    </x-slot>

    <div class="max-w-xl mx-auto mt-6">
        <form method="POST" action="{{ route('join.class') }}">
            @csrf

            <div class="mb-4">
                <label for="class_id" class="block font-medium">Pilih Kelas</label>
                <select name="class_id" id="class_id" class="w-full rounded border-gray-300">
                    @foreach($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="token" class="block font-medium">Masukkan Token</label>
                <input type="text" name="token" class="w-full rounded border-gray-300" required>
                @error('token') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <x-primary-button>Gabung</x-primary-button>
        </form>
    </div>
</x-app-layout>
