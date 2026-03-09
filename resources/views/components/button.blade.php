@props(['variant' => 'primary', 'icon' => null])

@php
    $baseClasses = "px-6 py-3 rounded-2xl font-bold flex items-center justify-center gap-2 transition-all active:scale-95 shadow-sm";
    $variants = [
        'primary'   => 'bg-indigo-600 text-white hover:bg-indigo-700 shadow-indigo-100',
        'secondary' => 'bg-white text-slate-700 border border-slate-200 hover:bg-slate-50',
        'danger'    => 'bg-rose-500 text-white hover:bg-rose-600 shadow-rose-100',
    ];
    $classes = $baseClasses . " " . ($variants[$variant] ?? $variants['primary']);
@endphp

<button {{ $attributes->merge(['class' => $classes]) }}>
    @if($icon)
        <i data-lucide="{{ $icon }}" class="w-5 h-5"></i>
    @endif
    {{ $slot }}
</button>