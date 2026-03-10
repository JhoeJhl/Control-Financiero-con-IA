<x-modal name="modal-registrar-gasto" focusable maxWidth="2xl">
    <div class="p-8 bg-gradient-to-br from-white to-slate-50">
        <div class="flex items-center gap-4 mb-8">
            <div class="w-14 h-14 bg-gradient-to-br from-indigo-600 to-indigo-500 rounded-2xl flex items-center justify-center shadow-lg shadow-indigo-200">
                <i data-lucide="plus-circle" class="w-7 h-7 text-white"></i>
            </div>
            <div>
                <h2 class="text-2xl font-black text-slate-900 tracking-tight">Registrar Movimiento</h2>
                <p class="text-sm text-slate-400">Completa los detalles de la transacción</p>
            </div>
        </div>
        
        <form action="{{ route('transactions.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-2 gap-4 p-1 bg-slate-100 rounded-2xl">
                <label class="cursor-pointer">
                    <input type="radio" name="type" value="income" class="hidden peer" checked>
                    <div class="py-4 text-center rounded-xl peer-checked:bg-white peer-checked:text-emerald-600 peer-checked:shadow-sm font-bold transition-all duration-200 text-slate-400">
                        <i data-lucide="trending-up" class="w-5 h-5 mx-auto mb-1"></i>
                        Ingreso
                    </div>
                </label>
                <label class="cursor-pointer">
                    <input type="radio" name="type" value="expense" class="hidden peer">
                    <div class="py-4 text-center rounded-xl peer-checked:bg-white peer-checked:text-rose-600 peer-checked:shadow-sm font-bold transition-all duration-200 text-slate-400">
                        <i data-lucide="trending-down" class="w-5 h-5 mx-auto mb-1"></i>
                        Gasto
                    </div>
                </label>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Descripción</label>
                <div class="relative">
                    <i data-lucide="file-text" class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400"></i>
                    <x-input name="description" placeholder="Ej. Almuerzo, Sueldo, Transferencia..." required 
                        class="w-full pl-12 pr-4 py-4 bg-slate-50 border-2 border-slate-200 rounded-2xl focus:border-indigo-300 focus:ring-4 focus:ring-indigo-100 transition-all" />
                </div>
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Monto (Bs)</label>
                    <div class="relative">
                        <i data-lucide="dollar-sign" class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400"></i>
                        <x-input name="amount" type="number" step="0.01" placeholder="0.00" required 
                            class="w-full pl-12 pr-4 py-4 bg-slate-50 border-2 border-slate-200 rounded-2xl focus:border-indigo-300 focus:ring-4 focus:ring-indigo-100 transition-all" />
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Fecha</label>
                    <div class="relative">
                        <i data-lucide="calendar" class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400"></i>
                        <x-input name="transaction_date" type="date" value="{{ date('Y-m-d') }}" required 
                            class="w-full pl-12 pr-4 py-4 bg-slate-50 border-2 border-slate-200 rounded-2xl focus:border-indigo-300 focus:ring-4 focus:ring-indigo-100 transition-all" />
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Categoría</label>
                    <div class="relative">
                        <i data-lucide="tag" class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400 z-10"></i>
                        <select name="category_id" class="w-full pl-12 pr-4 py-4 bg-slate-50 border-2 border-slate-200 rounded-2xl appearance-none focus:border-indigo-300 focus:ring-4 focus:ring-indigo-100 transition-all font-medium text-slate-700" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Cuenta</label>
                    <div class="relative">
                        <i data-lucide="credit-card" class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400 z-10"></i>
                        <select name="account_id" class="w-full pl-12 pr-4 py-4 bg-slate-50 border-2 border-slate-200 rounded-2xl appearance-none focus:border-indigo-300 focus:ring-4 focus:ring-indigo-100 transition-all font-medium text-slate-700" required>
                            @foreach($accounts as $account)
                                <option value="{{ $account->id }}">{{ $account->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="pt-6 flex gap-4">
                <x-button type="button" x-on:click="$dispatch('close')" 
                    variant="secondary" 
                    class="flex-1 py-4 rounded-2xl border-2 border-slate-200 hover:bg-slate-100 font-semibold text-slate-600 transition-all">
                    <i data-lucide="x" class="w-5 h-5 mr-2"></i>
                    Cancelar
                </x-button>
                
                <x-button type="submit" 
                    variant="primary" 
                    class="flex-1 py-4 rounded-2xl bg-gradient-to-r from-indigo-600 to-indigo-500 hover:from-indigo-700 hover:to-indigo-600 font-bold text-white shadow-lg shadow-indigo-200 hover:shadow-xl transition-all transform hover:scale-105">
                    <i data-lucide="check" class="w-5 h-5 mr-2"></i>
                    Guardar movimiento
                </x-button>
            </div>
        </form>
    </div>
</x-modal>