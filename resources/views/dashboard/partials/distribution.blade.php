<div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm col-span-1">
    <div class="flex items-center justify-between mb-6">
        <h3 class="font-bold text-slate-900 text-lg flex items-center gap-2">
            <i data-lucide="pie-chart" class="w-5 h-5 text-indigo-500"></i>
            Distribución
        </h3>
        <span class="text-xs bg-slate-100 px-3 py-1 rounded-full text-slate-500">Este mes</span>
    </div>
    
    <div class="space-y-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2">
                <div class="w-3 h-3 bg-emerald-500 rounded-full"></div>
                <span class="text-sm text-slate-600">Ingresos</span>
            </div>
            <div class="flex items-center gap-3">
                <span class="text-sm font-bold text-slate-900">Bs {{ number_format($stats['monthly_income'], 2) }}</span>
                <span class="text-xs text-emerald-600">{{ $stats['monthly_income'] > 0 ? '100%' : '0%' }}</span>
            </div>
        </div>
        
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2">
                <div class="w-3 h-3 bg-rose-500 rounded-full"></div>
                <span class="text-sm text-slate-600">Gastos</span>
            </div>
            <div class="flex items-center gap-3">
                <span class="text-sm font-bold text-slate-900">Bs {{ number_format($stats['monthly_expenses'], 2) }}</span>
                <span class="text-xs text-rose-600">{{ $stats['monthly_income'] > 0 ? round(($stats['monthly_expenses']/$stats['monthly_income'])*100) : 0 }}%</span>
            </div>
        </div>
        
        <div class="flex items-center justify-between pt-2 border-t border-slate-100">
            <div class="flex items-center gap-2">
                <div class="w-3 h-3 bg-indigo-500 rounded-full"></div>
                <span class="text-sm font-medium text-slate-700">Ahorro</span>
            </div>
            <div class="flex items-center gap-3">
                <span class="text-sm font-bold text-indigo-600">Bs {{ number_format(max($stats['monthly_income'] - $stats['monthly_expenses'], 0), 2) }}</span>
                <span class="text-xs text-indigo-600">{{ $stats['monthly_income'] > 0 ? round((max($stats['monthly_income'] - $stats['monthly_expenses'], 0)/$stats['monthly_income'])*100) : 0 }}%</span>
            </div>
        </div>
    </div>

    @php
        $savings = $stats['monthly_income'] - $stats['monthly_expenses'];
        $savingsRate = $stats['monthly_income'] > 0 ? ($savings / $stats['monthly_income']) * 100 : 0;
    @endphp

    @if($savings > 0)
        <div class="mt-6 p-4 bg-emerald-50 rounded-2xl">
            <p class="text-xs text-emerald-700 font-medium mb-1">¡Buen trabajo!</p>
            <p class="text-sm text-emerald-600">Estás ahorrando el {{ round($savingsRate) }}% de tus ingresos</p>
        </div>
    @elseif($savings < 0)
        <div class="mt-6 p-4 bg-amber-50 rounded-2xl">
            <p class="text-xs text-amber-700 font-medium mb-1">Atención</p>
            <p class="text-sm text-amber-600">Tus gastos superan a tus ingresos este mes</p>
        </div>
    @endif
</div>