<div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm lg:col-span-2">
    <div class="flex items-center justify-between mb-6">
        <h3 class="font-bold text-slate-900 text-lg flex items-center gap-2">
            <i data-lucide="clock" class="w-5 h-5 text-indigo-500"></i>
            Últimos movimientos
        </h3>
        <a href="{{ route('transactions.index') }}" class="text-sm text-indigo-600 hover:text-indigo-700 font-medium flex items-center gap-1 transition-colors">
            Ver todos
            <i data-lucide="arrow-right" class="w-4 h-4"></i>
        </a>
    </div>
    
    @php
        // Simulación de últimas transacciones
        $recentTransactions = [
            ['description' => 'Sueldo mensual', 'amount' => 4500, 'type' => 'income', 'date' => now()->format('d/m/Y'), 'category' => 'Salario'],
            ['description' => 'Supermercado', 'amount' => 850.50, 'type' => 'expense', 'date' => now()->subDay()->format('d/m/Y'), 'category' => 'Alimentación'],
            ['description' => 'Transferencia', 'amount' => 1200, 'type' => 'income', 'date' => now()->subDays(2)->format('d/m/Y'), 'category' => 'Otros'],
            ['description' => 'Restaurante', 'amount' => 230.75, 'type' => 'expense', 'date' => now()->subDays(2)->format('d/m/Y'), 'category' => 'Ocio'],
            ['description' => 'Servicios básicos', 'amount' => 450, 'type' => 'expense', 'date' => now()->subDays(3)->format('d/m/Y'), 'category' => 'Servicios'],
        ];
    @endphp
    
    <div class="space-y-3">
        @foreach($recentTransactions as $transaction)
            <div class="flex items-center justify-between p-4 rounded-2xl hover:bg-slate-50 transition-colors">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center">
                        <i data-lucide="{{ $transaction['type'] == 'income' ? 'arrow-down-left' : 'arrow-up-right' }}" 
                           class="w-5 h-5 {{ $transaction['type'] == 'income' ? 'text-emerald-600' : 'text-rose-600' }}"></i>
                    </div>
                    <div>
                        <p class="font-semibold text-slate-900">{{ $transaction['description'] }}</p>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="text-xs px-2 py-0.5 bg-slate-100 rounded-full text-slate-500">{{ $transaction['category'] }}</span>
                            <span class="text-xs text-slate-400">{{ $transaction['date'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <p class="font-black {{ $transaction['type'] == 'income' ? 'text-emerald-600' : 'text-rose-600' }}">
                        {{ $transaction['type'] == 'income' ? '+' : '-' }} Bs {{ number_format($transaction['amount'], 2) }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>

    @if(count($recentTransactions) == 0)
        <div class="text-center py-12">
            <i data-lucide="inbox" class="w-12 h-12 text-slate-300 mx-auto mb-4"></i>
            <p class="text-slate-400">No hay movimientos recientes</p>
        </div>
    @endif
</div>