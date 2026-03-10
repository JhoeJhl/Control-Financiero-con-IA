@props(['label' => false, 'type' => 'text', 'placeholder' => ''])

<div class="w-full">
    @if ($label)
        <label class="block text-sm font-bold text-slate-700 mb-2 ml-1">
            {{ $label }}
        </label>
    @endif

    <input type="{{ $type }}" placeholder="{{ $placeholder }}"
        {{ $attributes->merge(['class' => 'w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl outline-none focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 transition-all font-medium text-slate-700']) }}>
</div>
