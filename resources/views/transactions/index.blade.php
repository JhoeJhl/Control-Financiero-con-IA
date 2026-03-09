@extends('layouts.app')

@section('title', 'Mis Movimientos - FinanceControl')

@section('content')
    <div class="max-w-6xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-black text-secondary tracking-tight">Historial de Movimientos</h1>
                <p class="text-slate-500 font-medium italic">Revisa y gestiona tus entradas y salidas de dinero</p>
            </div>
            <a href="{{ route('transactions.create') }}">
                <x-button variant="primary" icon="plus-circle" class="shadow-xl shadow-indigo-100">
                    Nuevo Movimiento
                </x-button>
            </a>
        </div>

        @if (session('success'))
            <div
                class="mb-6 p-4 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-2xl flex items-center gap-3 animate-fade-in">
                <i data-lucide="check-circle" class="w-5 h-5"></i>
                <span class="font-bold text-sm">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white rounded-[2.5rem] border border-slate-200 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-100">
                            <th class="p-6 text-xs font-black uppercase text-slate-400 tracking-widest">Fecha</th>
                            <th class="p-6 text-xs font-black uppercase text-slate-400 tracking-widest">Descripción</th>
                            <th class="p-6 text-xs font-black uppercase text-slate-400 tracking-widest">Categoría</th>
                            <th class="p-6 text-xs font-black uppercase text-slate-400 tracking-widest text-right">Monto
                            </th>
                            <th class="p-6 text-xs font-black uppercase text-slate-400 tracking-widest text-center">Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($transactions as $item)
                            <tr class="hover:bg-slate-50/50 transition-colors group">
                                <td class="p-6 text-sm font-bold text-slate-500">
                                    {{ \Carbon\Carbon::parse($item->transaction_date)->format('d M, Y') }}
                                </td>
                                <td class="p-6">
                                    <p class="font-bold text-secondary text-sm">{{ $item->description }}</p>
                                </td>
                                <td class="p-6">
                                    <span class="px-3 py-1 rounded-lg text-[10px] font-black uppercase border"
                                        style="background-color: {{ $item->category->color ?? '#f1f5f9' }}20; 
                                             color: {{ $item->category->color ?? '#64748b' }}; 
                                             border-color: {{ $item->category->color ?? '#cbd5e1' }}40;">
                                        {{ $item->category->name ?? 'Sin Categoría' }}
                                    </span>
                                </td>
                                <td class="p-6 text-right font-black text-lg">
                                    <span class="{{ $item->type === 'income' ? 'text-emerald-500' : 'text-rose-500' }}">
                                        {{ $item->type === 'income' ? '+' : '-' }} ${{ number_format($item->amount, 2) }}
                                    </span>
                                </td>
                                <td class="p-6 text-center">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('transactions.edit', $item->id) }}"
                                            class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-xl transition">
                                            <i data-lucide="edit-3" class="w-5 h-5"></i>
                                        </a>

                                        <form action="{{ route('transactions.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('¿Estás seguro de eliminar este movimiento?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-xl transition">
                                                <i data-lucide="trash-2" class="w-5 h-5"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-20 text-center">
                                    <div class="flex flex-col items-center">
                                        <div
                                            class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mb-4">
                                            <i data-lucide="clipboard-list" class="w-10 h-10 text-slate-300"></i>
                                        </div>
                                        <h3 class="text-lg font-bold text-slate-900">No hay movimientos</h3>
                                        <p class="text-slate-500 mb-6">Aún no has registrado ningún ingreso o gasto.</p>
                                        <a href="{{ route('transactions.create') }}">
                                            <x-button variant="secondary" icon="plus">Crear mi primer registro</x-button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
