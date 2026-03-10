<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12 gap-6">
    <div class="relative">
        <div class="absolute -inset-1 bg-gradient-to-r from-indigo-600 to-indigo-400 rounded-2xl blur opacity-20"></div>
        <div class="relative bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-10 h-10 bg-gradient-to-br from-indigo-600 to-indigo-500 rounded-xl flex items-center justify-center shadow-lg shadow-indigo-200/50">
                    <i data-lucide="trending-up" class="w-5 h-5 text-white"></i>
                </div>
                <div>
                    <span class="text-xs font-semibold text-indigo-600 uppercase tracking-wider">Resumen financiero</span>
                    <h1 class="text-3xl font-black text-slate-900 tracking-tight">Estado Económico</h1>
                </div>
            </div>
            <p class="text-slate-500 font-medium flex items-center gap-2 ml-13">
                <i data-lucide="map-pin" class="w-4 h-4 text-indigo-400"></i>
                Control de mis ingresos y gastos en Bolivia · {{ now()->format('d M, Y') }}
            </p>
        </div>
    </div>
    
    <x-button x-data x-on:click.prevent="$dispatch('open-modal', 'modal-registrar-gasto')" 
        variant="primary" 
        class="bg-gradient-to-r from-indigo-600 to-indigo-500 hover:from-indigo-700 hover:to-indigo-600 shadow-xl shadow-indigo-200/70 hover:shadow-2xl hover:shadow-indigo-300/50 transition-all duration-300 transform hover:scale-105 px-8 py-4 rounded-2xl text-base font-bold gap-3">
        <i data-lucide="plus-circle" class="w-5 h-5"></i>
        Nuevo Movimiento
    </x-button>
</div>