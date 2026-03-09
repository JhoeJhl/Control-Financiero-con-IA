@extends('layouts.app')

@section('title', 'Nuevo Movimiento - FinanceControl')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('transactions.index') }}" class="p-3 bg-white border border-slate-200 rounded-2xl text-slate-400 hover:text-primary transition shadow-sm">
            <i data-lucide="arrow-left" class="w-6 h-6"></i>
        </a>
        <div>
            <h1 class="text-3xl font-black text-secondary tracking-tight">Nuevo Movimiento</h1>
            <p class="text-slate-500 font-medium text-sm italic">Registra un ingreso o gasto detallado</p>
        </div>
    </div>

    <form action="{{ route('transactions.store') }}" method="POST" class="bg-white p-8 md:p-10 rounded-[3rem] border border-slate-200 shadow-xl shadow-slate-100 space-y-8">
        @csrf

        <div class="grid grid-cols-2 gap-4 p-2 bg-slate-50 rounded-[2rem] border border-slate-100">
            <label class="cursor-pointer group">
                <input type="radio" name="type" value="income" class="hidden peer" checked>
                <div class="py-4 rounded-[1.5rem] flex items-center justify-center gap-2 font-bold text-slate-400 peer-checked:bg-white peer-checked:text-emerald-600 peer-checked:shadow-sm transition-all group-hover:text-slate-600">
                    <i data-lucide="trending-up" class="w-5 h-5"></i> Ingreso
                </div>
            </label>
            <label class="cursor-pointer group">
                <input type="radio" name="type" value="expense" class="hidden peer">
                <div class="py-4 rounded-[1.5rem] flex items-center justify-center gap-2 font-bold text-slate-400 peer-checked:bg-white peer-checked:text-rose-600 peer-checked:shadow-sm transition-all group-hover:text-slate-600">
                    <i data-lucide="trending-down" class="w-5 h-5"></i> Gasto
                </div>
            </label>
        </div>

        <div class="space-y-6">
            <x-input label="Descripción del movimiento" name="description" placeholder="Ej. Pago de Alquiler, Venta de Laptop..." required />

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <x-input label="Monto" name="amount" type="number" step="0.01" placeholder="0.00" required />
                
                <div class="w-full">
                    <label class="block text-sm font-bold text-slate-700 mb-2 ml-1">Categoría</label>
                    <select name="category_id" class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-100 focus:border-indigo-400 outline-none transition-all font-medium text-slate-700 italic">
                        <option value="">Seleccionar...</option>
                        <option value="1">Alimentación</option>
                        <option value="2">Servicios</option>
                        <option value="3">Sueldo</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <x-input label="Fecha" name="transaction_date" type="date" value="{{ date('Y-m-d') }}" />
                
                <div class="w-full">
                    <label class="block text-sm font-bold text-slate-700 mb-2 ml-1">Cuenta/Billetera</label>
                    <select name="account_id" class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-100 focus:border-indigo-400 outline-none transition-all font-medium text-slate-700">
                        <option value="1">Efectivo</option>
                        <option value="2">Banco Nacional</option>
                    </select>
                </div>
            </div>

            <div class="w-full">
                <label class="block text-sm font-bold text-slate-700 mb-2 ml-1">Notas (Opcional)</label>
                <textarea name="notes" rows="3" class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-100 outline-none transition-all placeholder:text-slate-400" placeholder="Escribe detalles adicionales aquí..."></textarea>
            </div>
        </div>

        <div class="pt-4 flex flex-col md:flex-row gap-4">
            <x-button type="submit" variant="primary" class="flex-1 py-5 text-lg shadow-xl shadow-indigo-100">
                Guardar Movimiento
            </x-button>
            <a href="{{ route('transactions.index') }}" class="flex-1">
                <x-button type="button" variant="secondary" class="w-full py-5 text-lg">
                    Cancelar
                </x-button>
            </a>
        </div>
    </form>
</div>
@endsection