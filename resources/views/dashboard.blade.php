<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Resumen Financiero') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
                <div>
                    <h1 class="text-3xl font-black text-secondary tracking-tight">Mi Resumen</h1>
                    <p class="text-slate-500 font-medium italic">Control de ingresos y egresos en Bolivia</p>
                </div>
                
                <x-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'modal-registrar-gasto')" variant="primary" icon="plus-circle" class="shadow-xl shadow-indigo-200">
                    Nuevo Movimiento
                </x-button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                <x-card-stat label="Mi Saldo" :amount="'Bs ' . number_format($stats['total_balance'], 2)" icon="wallet" type="neutral" />
                <x-card-stat label="Ingresos" :amount="'Bs ' . number_format($stats['monthly_income'], 2)" icon="trending-up" type="success" />
                <x-card-stat label="Gastos" :amount="'Bs ' . number_format($stats['monthly_expenses'], 2)" icon="trending-down" type="danger" />
            </div>

            <x-modal name="modal-registrar-gasto" focusable>
                <div class="p-8">
                    <h2 class="text-2xl font-black text-secondary mb-6 italic">Registrar Movimiento</h2>
                    
                    <form action="{{ route('transactions.store') }}" method="POST" class="space-y-5">
                        @csrf
                        <div class="flex gap-4">
                            <label class="flex-1">
                                <input type="radio" name="type" value="income" class="hidden peer" checked>
                                <div class="p-3 text-center rounded-xl border-2 border-slate-100 peer-checked:border-emerald-500 peer-checked:bg-emerald-50 peer-checked:text-emerald-600 font-bold cursor-pointer transition-all">Ingreso</div>
                            </label>
                            <label class="flex-1">
                                <input type="radio" name="type" value="expense" class="hidden peer">
                                <div class="p-3 text-center rounded-xl border-2 border-slate-100 peer-checked:border-rose-500 peer-checked:bg-rose-50 peer-checked:text-rose-600 font-bold cursor-pointer transition-all">Egreso</div>
                            </label>
                        </div>

                        <x-input name="description" label="Descripción" placeholder="Ej. Almuerzo, Sueldo..." required />
                        
                        <div class="grid grid-cols-2 gap-4">
                            <x-input name="amount" label="Monto (Bs)" type="number" step="0.01" placeholder="0.00" required />
                            <x-input name="transaction_date" label="Fecha" type="date" value="{{ date('Y-m-d') }}" required />
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2 ml-1">Categoría</label>
                                <select name="category_id" class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl outline-none focus:ring-4 focus:ring-indigo-100 transition-all font-medium text-slate-700" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2 ml-1">Cuenta</label>
                                <select name="account_id" class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl outline-none focus:ring-4 focus:ring-indigo-100 transition-all font-medium text-slate-700" required>
                                    @foreach($accounts as $account)
                                        <option value="{{ $account->id }}">{{ $account->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="pt-4 flex gap-3">
                            <x-button type="button" x-on:click="$dispatch('close')" variant="secondary" class="flex-1 py-4">
                                Cancelar
                            </x-button>
                            <x-button type="submit" variant="primary" class="flex-1 py-4 text-lg shadow-lg shadow-indigo-100">
                                Guardar
                            </x-button>
                        </div>
                    </form>
                </div>
            </x-modal>
        </div>
    </div>
</x-app-layout>