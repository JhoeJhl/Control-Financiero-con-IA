<div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm lg:col-span-2">
    <div class="flex items-center justify-between mb-6">
        <h3 class="font-bold text-slate-900 text-lg flex items-center gap-2">
            <i data-lucide="clock" class="w-5 h-5 text-indigo-500"></i>
            Últimos movimientos
        </h3>
        <a href="{{ route('transactions.index') }}" class="text-sm text-indigo-600 hover:text-indigo-700 font-bold flex items-center gap-1 transition-colors">
            Ver todos
            <i data-lucide="arrow-right" class="w-4 h-4"></i>
        </a>
    </div>
    
    <div class="space-y-3">
        @forelse($recentTransactions as $transaction)
            <div class="flex items-center justify-between p-4 rounded-2xl hover:bg-slate-50 transition-colors">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center {{ $transaction->type == 'income' ? 'bg-emerald-50 text-emerald-600' : 'bg-rose-50 text-rose-600' }}">
                        <i data-lucide="{{ $transaction->type == 'income' ? 'arrow-down-left' : 'arrow-up-right' }}" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <p class="font-bold text-slate-900">{{ $transaction->description }}</p>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="text-[10px] px-2 py-0.5 rounded-md font-black uppercase border"
                                style="background-color: {{ $transaction->category->color ?? '#f1f5f9' }}20; 
                                       color: {{ $transaction->category->color ?? '#64748b' }}; 
                                       border-color: {{ $transaction->category->color ?? '#cbd5e1' }}40;">
                                {{ $transaction->category->name ?? 'Sin Categoría' }}
                            </span>
                            <span class="text-xs font-medium text-slate-400">
                                {{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d M') }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <p class="font-black text-base {{ $transaction->type == 'income' ? 'text-emerald-600' : 'text-slate-900' }}">
                        {{ $transaction->type == 'income' ? '+' : '-' }} Bs {{ number_format($transaction->amount, 2) }}
                    </p>
                </div>
            </div>
        @empty
            <div class="text-center py-8">
                <div class="w-16 h-16 bg-slate-50 rounded-2xl flex items-center justify-center mx-auto mb-4 border border-slate-100">
                    <i data-lucide="inbox" class="w-8 h-8 text-slate-300"></i>
                </div>
                <p class="font-bold text-slate-900">No hay movimientos recientes</p>
                <p class="text-sm text-slate-500 mt-1">Aparecerán aquí cuando registres algo.</p>
            </div>
        @endforelse
    </div>
</div>