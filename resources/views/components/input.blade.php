@props(['label', 'type' => 'text', 'placeholder' => ''])

<div class="w-full">
    <label class="block text-sm font-bold text-slate-700 mb-2 ml-1">
        {{ $label }}
    </label>
    <input 
        type="{{ $type }}" 
        placeholder="{{ $placeholder }}"
        {{ $attributes->merge(['class' => 'w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-100 focus:border-indigo-400 outline-none transition-all placeholder:text-slate-400 text-slate-700 font-medium']) }}
    >
</div>