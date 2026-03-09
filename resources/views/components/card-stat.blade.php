@props(['type' => 'neutral', 'label', 'amount', 'icon'])

@php
    $colors = [
        'success' => 'bg-emerald-50 text-emerald-600 border-emerald-100',
        'danger'  => 'bg-rose-50 text-rose-600 border-rose-100',
        'neutral' => 'bg-indigo-50 text-indigo-600 border-indigo-100',
    ][$type] ?? 'bg-slate-50 text-slate-600 border-slate-100';
@endphp

<div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm hover:shadow-md transition-shadow">
    <div class="flex justify-between items-start mb-4">
        <div class="w-12 h-12 rounded-2xl flex items-center justify-center border {{ $colors }}">
            <i data-lucide="{{ $icon }}" class="w-6 h-6"></i>
        </div>
    </div>
    <p class="text-slate-500 text-xs font-black uppercase tracking-widest">{{ $label }}</p>
    <h3 class="text-3xl font-black text-slate-900 mt-1 tracking-tighter">
        {{ $amount }}
    </h3>
</div>