{{-- <div x-show="open" 
     x-transition.opacity.duration.300ms
     :class="darkMode ? 'bg-slate-900/95 border-slate-800' : 'bg-white/95 border-slate-200'"
     class="absolute left-4 right-4 md:hidden top-24 backdrop-blur-xl border shadow-2xl rounded-2xl overflow-hidden z-40">
    
    <div class="p-3 space-y-1">
        <a href="{{ route('dashboard') }}" @click="open = false"
            :class="darkMode ? 'text-white' : 'text-slate-600'"
            class="flex items-center gap-3 px-4 py-4 rounded-xl font-bold transition-colors {{ request()->routeIs('dashboard') ? 'bg-indigo-600 text-white' : 'hover:bg-slate-100 dark:hover:bg-slate-800' }}">
            <i data-lucide="layout-dashboard" class="w-5 h-5"></i> Resumen General
        </a>
        
        <a href="{{ route('transactions.index') }}" @click="open = false"
            :class="darkMode ? 'text-white' : 'text-slate-600'"
            class="flex items-center gap-3 px-4 py-4 rounded-xl font-bold transition-colors {{ request()->routeIs('transactions.*') ? 'bg-indigo-600 text-white' : 'hover:bg-slate-100 dark:hover:bg-slate-800' }}">
            <i data-lucide="arrow-left-right" class="w-5 h-5"></i> Mis Movimientos
        </a>

        <a href="{{ route('categories.index') }}" @click="open = false"
            :class="darkMode ? 'text-white' : 'text-slate-600'"
            class="flex items-center gap-3 px-4 py-4 rounded-xl font-bold transition-colors {{ request()->routeIs('categories.*') ? 'bg-indigo-600 text-white' : 'hover:bg-slate-100 dark:hover:bg-slate-800' }}">
            <i data-lucide="tags" class="w-5 h-5"></i> Categorías
        </a>
    </div>

    <div class="p-4 border-t" :class="darkMode ? 'border-slate-800 bg-slate-800/50' : 'border-slate-100 bg-slate-50/80'">
        <div class="flex items-center gap-4 mb-4">
            <div class="w-14 h-14 bg-gradient-to-br from-indigo-600 to-indigo-400 rounded-xl flex items-center justify-center text-white font-black text-xl shadow-lg">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
            <div class="flex-1">
                <div :class="darkMode ? 'text-white' : 'text-slate-900'" class="font-black">{{ Auth::user()->name }}</div>
                <div class="text-sm text-slate-500 dark:text-slate-400">{{ Auth::user()->email }}</div>
                <div class="mt-1 flex gap-2">
                    <span x-show="plan === 'premium'" class="inline-flex items-center gap-1 text-xs bg-amber-500 text-white px-2 py-1 rounded-lg font-bold">
                        <i data-lucide="crown" class="w-3 h-3"></i> Premium
                    </span>
                    <span x-show="plan === 'free'" class="inline-flex items-center gap-1 text-xs bg-slate-200 dark:bg-slate-700 text-slate-700 dark:text-slate-300 px-2 py-1 rounded-lg font-bold">
                        <i data-lucide="star" class="w-3 h-3"></i> Free
                    </span>
                </div>
            </div>
        </div>
    </div>
</div> --}}