<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            {{ __('Gestión de Categorías') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
                <div>
                    <h1 class="text-3xl font-black text-secondary tracking-tight">Mis Categorías</h1>
                    <p class="text-slate-500 font-medium italic">Personaliza cómo clasificas tu dinero</p>
                </div>
                
                <x-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'modal-crear-categoria')" variant="primary" icon="plus" class="shadow-xl shadow-indigo-200">
                    Nueva Categoría
                </x-button>
            </div>

            @if(session('success'))
                <div class="mb-6 p-4 bg-emerald-50 text-emerald-700 rounded-2xl flex items-center gap-3 font-bold border border-emerald-100">
                    <i data-lucide="check-circle" class="w-5 h-5"></i> {{ session('success') }}
                </div>
            @endif

            <h3 class="text-xl font-bold text-slate-700 mb-4 mt-8">Categorías Personalizadas</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10">
                @forelse($userCategories as $category)
                    <div class="bg-white p-5 rounded-3xl border border-slate-100 shadow-sm flex flex-col items-center text-center relative group transition-all hover:shadow-md">
                        
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Borrar esta categoría?')" class="p-2 text-slate-300 hover:text-rose-500 rounded-full hover:bg-rose-50">
                                <i data-lucide="x" class="w-4 h-4"></i>
                            </button>
                        </form>

                        <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-3 text-white shadow-inner" style="background-color: {{ $category->color }}">
                            <i data-lucide="{{ $category->icon ?? 'tag' }}" class="w-7 h-7"></i>
                        </div>
                        <h4 class="font-bold text-slate-800">{{ $category->name }}</h4>
                        <span class="text-xs font-black uppercase mt-1 px-2 py-1 rounded-lg {{ $category->type === 'income' ? 'bg-emerald-50 text-emerald-600' : 'bg-rose-50 text-rose-600' }}">
                            {{ $category->type === 'income' ? 'Ingreso' : 'Gasto' }}
                        </span>
                    </div>
                @empty
                    <div class="col-span-full p-8 text-center text-slate-400 bg-white rounded-3xl border border-dashed border-slate-200">
                        No has creado categorías personalizadas aún.
                    </div>
                @endforelse
            </div>

            <x-modal name="modal-crear-categoria" focusable>
                <div class="p-8">
                    <h2 class="text-2xl font-black text-secondary mb-6 italic">Nueva Categoría</h2>
                    
                    <form action="{{ route('categories.store') }}" method="POST" class="space-y-5">
                        @csrf
                        
                        <div class="flex gap-4">
                            <label class="flex-1">
                                <input type="radio" name="type" value="expense" class="hidden peer" checked>
                                <div class="p-3 text-center rounded-xl border-2 border-slate-100 peer-checked:border-rose-500 peer-checked:bg-rose-50 peer-checked:text-rose-600 font-bold cursor-pointer transition-all">Gasto</div>
                            </label>
                            <label class="flex-1">
                                <input type="radio" name="type" value="income" class="hidden peer">
                                <div class="p-3 text-center rounded-xl border-2 border-slate-100 peer-checked:border-emerald-500 peer-checked:bg-emerald-50 peer-checked:text-emerald-600 font-bold cursor-pointer transition-all">Ingreso</div>
                            </label>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <x-input name="name" label="Nombre" placeholder="Ej. Suscripciones" required />
                            <x-input name="icon" label="Icono (Lucide)" placeholder="Ej. tv, gamepad, wifi" />
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2 ml-1">Color representativo</label>
                            <input type="color" name="color" value="#6366f1" class="h-14 w-full cursor-pointer rounded-xl border-0 p-1 bg-slate-50">
                        </div>

                        <div class="pt-4 flex gap-3">
                            <x-button type="button" x-on:click="$dispatch('close')" variant="secondary" class="flex-1 py-4">Cancelar</x-button>
                            <x-button type="submit" variant="primary" class="flex-1 py-4 shadow-lg shadow-indigo-100">Guardar</x-button>
                        </div>
                    </form>
                </div>
            </x-modal>

        </div>
    </div>
</x-app-layout>