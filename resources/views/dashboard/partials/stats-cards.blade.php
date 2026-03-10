<div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
    <div class="group relative bg-white rounded-3xl p-8 hover:shadow-2xl transition-all duration-500 border border-slate-100 hover:border-indigo-200 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-50/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        <div class="relative">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-slate-100 to-slate-200 rounded-2xl flex items-center justify-center group-hover:scale-110 group-hover:from-indigo-500 group-hover:to-indigo-600 transition-all duration-500">
                    <i data-lucide="wallet" class="w-7 h-7 text-slate-600 group-hover:text-white transition-colors duration-500"></i>
                </div>
                <span class="text-xs font-medium text-slate-400 bg-slate-100 px-3 py-1 rounded-full">Disponible</span>
            </div>
            <p class="text-sm font-medium text-slate-400 mb-1">Mi Saldo</p>
            <p class="text-3xl font-black text-slate-900 tracking-tight">{{ $stats['total_balance'] >= 0 ? 'Bs ' . number_format($stats['total_balance'], 2) : '-Bs ' . number_format(abs($stats['total_balance']), 2) }}</p>
            <div class="mt-4 flex items-center gap-1 text-xs {{ $stats['total_balance'] >= 0 ? 'text-emerald-600' : 'text-rose-600' }}">
                <i data-lucide="{{ $stats['total_balance'] >= 0 ? 'trending-up' : 'trending-down' }}" class="w-3 h-3"></i>
                <span>{{ $stats['total_balance'] >= 0 ? 'Saldo positivo' : 'Saldo negativo' }}</span>
            </div>
        </div>
    </div>

    <div class="group relative bg-white rounded-3xl p-8 hover:shadow-2xl transition-all duration-500 border border-slate-100 hover:border-emerald-200 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-emerald-50/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        <div class="relative">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-emerald-100 to-emerald-200 rounded-2xl flex items-center justify-center group-hover:scale-110 group-hover:from-emerald-500 group-hover:to-emerald-600 transition-all duration-500">
                    <i data-lucide="trending-up" class="w-7 h-7 text-emerald-600 group-hover:text-white transition-colors duration-500"></i>
                </div>
                <span class="text-xs font-medium text-emerald-600 bg-emerald-50 px-3 py-1 rounded-full">+{{ $stats['monthly_income'] > 0 ? round(($stats['monthly_income'] / max($stats['monthly_expenses'], 1)) * 100) : 0 }}% vs gastos</span>
            </div>
            <p class="text-sm font-medium text-slate-400 mb-1">Ingresos del mes</p>
            <p class="text-3xl font-black text-slate-900 tracking-tight">Bs {{ number_format($stats['monthly_income'], 2) }}</p>
            <div class="mt-4 flex items-center gap-2">
                <div class="w-full h-2 bg-emerald-100 rounded-full overflow-hidden">
                    <div class="h-full bg-emerald-500 rounded-full" style="width: {{ min(100, ($stats['monthly_income'] / max($stats['monthly_income'], 1)) * 100) }}%"></div>
                </div>
                <span class="text-xs text-emerald-600 font-medium">{{ round(($stats['monthly_income'] / max($stats['monthly_income'] + $stats['monthly_expenses'], 1)) * 100) }}%</span>
            </div>
        </div>
    </div>

    <div class="group relative bg-white rounded-3xl p-8 hover:shadow-2xl transition-all duration-500 border border-slate-100 hover:border-rose-200 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-rose-50/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        <div class="relative">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-rose-100 to-rose-200 rounded-2xl flex items-center justify-center group-hover:scale-110 group-hover:from-rose-500 group-hover:to-rose-600 transition-all duration-500">
                    <i data-lucide="trending-down" class="w-7 h-7 text-rose-600 group-hover:text-white transition-colors duration-500"></i>
                </div>
                <span class="text-xs font-medium text-rose-600 bg-rose-50 px-3 py-1 rounded-full">{{ $stats['monthly_expenses'] > 0 ? round(($stats['monthly_expenses'] / max($stats['monthly_income'], 1)) * 100) : 0 }}% de ingresos</span>
            </div>
            <p class="text-sm font-medium text-slate-400 mb-1">Gastos del mes</p>
            <p class="text-3xl font-black text-slate-900 tracking-tight">Bs {{ number_format($stats['monthly_expenses'], 2) }}</p>
            <div class="mt-4 flex items-center gap-2">
                <div class="w-full h-2 bg-rose-100 rounded-full overflow-hidden">
                    <div class="h-full bg-rose-500 rounded-full" style="width: {{ min(100, ($stats['monthly_expenses'] / max($stats['monthly_income'], 1)) * 100) }}%"></div>
                </div>
                <span class="text-xs text-rose-600 font-medium">{{ round(($stats['monthly_expenses'] / max($stats['monthly_income'], 1)) * 100) }}%</span>
            </div>
        </div>
    </div>
</div>