@extends('layouts.app')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
    <div>
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-black text-secondary">Mis Cuentas</h2>
            <x-button variant="secondary" icon="plus" class="py-2 px-4 text-xs">Añadir</x-button>
        </div>
        <div class="space-y-4">
            <div class="p-5 bg-white border border-slate-200 rounded-3xl flex justify-between items-center shadow-sm">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-indigo-600 rounded-2xl flex items-center justify-center text-white">
                        <i data-lucide="landmark"></i>
                    </div>
                    <div>
                        <p class="font-bold text-secondary">Banco Nacional</p>
                        <p class="text-xs text-slate-400">Principal • USD</p>
                    </div>
                </div>
                <p class="font-black text-lg">$1,200.00</p>
            </div>
        </div>
    </div>

    <div>
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-black text-secondary">Categorías</h2>
            <x-button variant="secondary" icon="plus" class="py-2 px-4 text-xs">Nueva</x-button>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="p-4 bg-white border border-slate-200 rounded-2xl flex items-center gap-3">
                <div class="w-3 h-3 bg-rose-500 rounded-full"></div>
                <span class="font-bold text-sm text-slate-700 italic">Comida</span>
            </div>
            <div class="p-4 bg-white border border-slate-200 rounded-2xl flex items-center gap-3">
                <div class="w-3 h-3 bg-emerald-500 rounded-full"></div>
                <span class="font-bold text-sm text-slate-700 italic">Salud</span>
            </div>
        </div>
    </div>
</div>
@endsection