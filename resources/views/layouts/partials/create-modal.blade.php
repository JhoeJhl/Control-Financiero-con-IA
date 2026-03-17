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
            @csrf <div class="grid grid-cols-2 gap-4 p-1 bg-slate-100 rounded-2xl">
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
            @error('type') <span class="text-xs text-rose-500 font-bold">{{ $message }}</span> @enderror

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Descripción</label>
                <div class="relative">
                    <i data-lucide="file-text" class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400"></i>
                    <input name="description" value="{{ old('description') }}" placeholder="Ej. Almuerzo, Sueldo..." required 
                        class="w-full pl-12 pr-4 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:bg-white focus:border-indigo-300 focus:ring-4 focus:ring-indigo-100 transition-all font-medium text-slate-700">
                </div>
                @error('description') <span class="text-xs text-rose-500 font-bold mt-1">{{ $message }}</span> @enderror
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Monto (Bs)</label>
                    <div class="relative">
                        <i data-lucide="dollar-sign" class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400"></i>
                        <input name="amount" type="number" step="0.01" min="0.01" value="{{ old('amount') }}" placeholder="0.00" required 
                            class="w-full pl-12 pr-4 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:bg-white focus:border-indigo-300 focus:ring-4 focus:ring-indigo-100 transition-all font-medium text-slate-700">
                    </div>
                    @error('amount') <span class="text-xs text-rose-500 font-bold mt-1">{{ $message }}</span> @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Fecha</label>
                    <div class="relative">
                        <i data-lucide="calendar" class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400"></i>
                        <input name="transaction_date" type="date" value="{{ old('transaction_date', date('Y-m-d')) }}" required 
                            class="w-full pl-12 pr-4 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:bg-white focus:border-indigo-300 focus:ring-4 focus:ring-indigo-100 transition-all font-medium text-slate-700">
                    </div>
                    @error('transaction_date') <span class="text-xs text-rose-500 font-bold mt-1">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Categoría</label>
                    <div class="relative">
                        <i data-lucide="tag" class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400 z-10"></i>
                        <select name="category_id" required class="w-full pl-12 pr-4 py-4 bg-slate-50 border border-slate-200 rounded-2xl appearance-none focus:bg-white focus:border-indigo-300 focus:ring-4 focus:ring-indigo-100 transition-all font-medium text-slate-700 cursor-pointer">
                            <option value="" disabled selected>Selecciona...</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('category_id') <span class="text-xs text-rose-500 font-bold mt-1">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Cuenta</label>
                    <div class="relative">
                        <i data-lucide="credit-card" class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400 z-10"></i>
                        <select name="account_id" required class="w-full pl-12 pr-4 py-4 bg-slate-50 border border-slate-200 rounded-2xl appearance-none focus:bg-white focus:border-indigo-300 focus:ring-4 focus:ring-indigo-100 transition-all font-medium text-slate-700 cursor-pointer">
                            <option value="" disabled selected>Selecciona...</option>
                            @foreach($accounts as $account)
                                <option value="{{ $account->id }}" {{ old('account_id') == $account->id ? 'selected' : '' }}>
                                    {{ $account->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('account_id') <span class="text-xs text-rose-500 font-bold mt-1">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="pt-6 flex gap-4">
                <x-button type="button" x-on:click="$dispatch('close')" variant="secondary" class="flex-1 py-4 rounded-2xl border border-slate-200 hover:bg-slate-100 font-bold text-slate-600 transition-all flex justify-center items-center gap-2">
                    <i data-lucide="x" class="w-5 h-5"></i> Cancelar
                </x-button>
                
                <x-button type="submit" variant="primary" class="flex-1 py-4 rounded-2xl bg-indigo-600 hover:bg-indigo-700 font-bold text-white shadow-lg shadow-indigo-200 hover:shadow-xl transition-all flex justify-center items-center gap-2">
                    <i data-lucide="check" class="w-5 h-5"></i> Guardar
                </x-button>
            </div>
        </form>
    </div>
</x-modal>