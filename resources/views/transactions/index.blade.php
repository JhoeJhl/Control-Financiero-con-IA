<x-app-layout>
    <div class="py-8 sm:py-12 bg-slate-50/50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                <div>
                    <h1 class="text-3xl font-black text-slate-900 tracking-tight">Historial de Movimientos</h1>
                    <p class="text-slate-500 font-medium mt-1">Revisa y gestiona tus entradas y salidas de dinero</p>
                </div>
                
                <a href="{{ route('transactions.create') }}" class="inline-block">
                    <x-button variant="primary" class="bg-indigo-600 hover:bg-indigo-700 shadow-lg shadow-indigo-200 hover:shadow-xl transition-all px-6 py-3 rounded-2xl text-sm font-bold gap-2">
                        <i data-lucide="plus-circle" class="w-5 h-5"></i>
                        Nuevo Movimiento
                    </x-button>
                </a>
            </div>

            @if (session('success'))
                <div class="mb-8 p-4 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-2xl flex items-center gap-3 animate-fade-in shadow-sm">
                    <i data-lucide="check-circle" class="w-5 h-5 text-emerald-500"></i>
                    <span class="font-bold text-sm">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white p-4 rounded-3xl shadow-sm border border-slate-200 mb-8">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    
                    <div class="relative w-full md:w-96">
                        <i data-lucide="search" class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400"></i>
                        <input type="text" placeholder="Buscar movimientos..." 
                            class="w-full pl-11 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:border-indigo-300 focus:ring-4 focus:ring-indigo-100 transition-all font-medium text-slate-700 text-sm">
                    </div>

                    <div class="flex items-center gap-2 overflow-x-auto w-full md:w-auto pb-2 md:pb-0">
                        <button class="px-4 py-2 rounded-xl bg-indigo-50 text-indigo-700 font-bold text-sm whitespace-nowrap border border-indigo-100">
                            Todos
                        </button>
                        <button class="px-4 py-2 rounded-xl bg-white text-slate-600 hover:bg-slate-50 font-bold text-sm whitespace-nowrap border border-slate-200 transition-colors">
                            Ingresos
                        </button>
                        <button class="px-4 py-2 rounded-xl bg-white text-slate-600 hover:bg-slate-50 font-bold text-sm whitespace-nowrap border border-slate-200 transition-colors">
                            Gastos
                        </button>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/80 border-b border-slate-200 text-xs uppercase tracking-wider text-slate-500 font-black">
                                <th class="px-6 py-5 rounded-tl-3xl">Fecha</th>
                                <th class="px-6 py-5">Descripción</th>
                                <th class="px-6 py-5">Categoría</th>
                                <th class="px-6 py-5 text-right">Monto</th>
                                <th class="px-6 py-5 text-center rounded-tr-3xl">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-sm">
                            
                            @forelse($transactions as $item)
                                <tr class="hover:bg-slate-50/50 transition-colors group">
                                    
                                    <td class="px-6 py-4 font-bold text-slate-500 whitespace-nowrap">
                                        {{ \Carbon\Carbon::parse($item->transaction_date)->format('d M, Y') }}
                                    </td>
                                    
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-9 h-9 rounded-xl flex items-center justify-center {{ $item->type === 'income' ? 'bg-emerald-50 text-emerald-600' : 'bg-rose-50 text-rose-600' }}">
                                                <i data-lucide="{{ $item->type === 'income' ? 'arrow-down-left' : 'arrow-up-right' }}" class="w-4 h-4"></i>
                                            </div>
                                            <span class="font-bold text-slate-900">{{ $item->description }}</span>
                                        </div>
                                    </td>
                                    
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1.5 rounded-lg text-[11px] font-black uppercase border"
                                            style="background-color: {{ $item->category->color ?? '#f1f5f9' }}20; 
                                                   color: {{ $item->category->color ?? '#64748b' }}; 
                                                   border-color: {{ $item->category->color ?? '#cbd5e1' }}40;">
                                            {{ $item->category->name ?? 'Sin Categoría' }}
                                        </span>
                                    </td>
                                    
                                    <td class="px-6 py-4 text-right font-black text-base">
                                        <span class="{{ $item->type === 'income' ? 'text-emerald-600' : 'text-slate-900' }}">
                                            {{ $item->type === 'income' ? '+' : '-' }}Bs {{ number_format($item->amount, 2) }}
                                        </span>
                                    </td>
                                    
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                            <a href="{{ route('transactions.edit', $item->id) }}"
                                                class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-xl transition-colors" title="Editar">
                                                <i data-lucide="edit-3" class="w-4 h-4"></i>
                                            </a>

                                            <form action="{{ route('transactions.destroy', $item->id) }}" method="POST"
                                                onsubmit="return confirm('¿Estás seguro de eliminar este movimiento?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="p-2 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-xl transition-colors" title="Eliminar">
                                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-16 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <div class="w-20 h-20 bg-slate-50 border border-slate-100 rounded-3xl flex items-center justify-center mb-5 shadow-sm">
                                                <i data-lucide="clipboard-list" class="w-10 h-10 text-indigo-300"></i>
                                            </div>
                                            <h3 class="text-xl font-black text-slate-900 mb-1">No hay movimientos</h3>
                                            <p class="text-slate-500 font-medium mb-6">Aún no has registrado ningún ingreso o gasto.</p>
                                            <a href="{{ route('transactions.create') }}">
                                                <x-button variant="secondary" class="bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 hover:text-indigo-600 shadow-sm px-6 py-3 rounded-xl font-bold transition-all">
                                                    <i data-lucide="plus" class="w-4 h-4 mr-2"></i>
                                                    Crear mi primer registro
                                                </x-button>
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
    </div>
</x-app-layout>