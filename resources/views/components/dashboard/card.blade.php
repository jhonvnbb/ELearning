<div {{ $attributes->merge(['class' => 'bg-white p-6 rounded-lg shadow hover:shadow-lg transition']) }}>
    <h4 class="text-lg font-semibold text-gray-700 mb-2">{{ $icon }} {{ $title }}</h4>
    <p class="text-gray-500 text-sm">{{ $desc }}</p>
    {{ $slot }}
</div>
