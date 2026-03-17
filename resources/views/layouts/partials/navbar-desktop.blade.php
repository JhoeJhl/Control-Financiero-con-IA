<nav :class="darkMode ? 'bg-slate-900/95 border-slate-800' : 'bg-white/95 border-slate-200'" 
     class="backdrop-blur-xl border shadow-lg shadow-slate-200/40 dark:shadow-none rounded-2xl px-4 py-3 transition-all duration-300">
    <div class="flex items-center justify-between">
        
        <div class="flex items-center gap-6">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 bg-gradient-to-br from-indigo-600 to-indigo-500 rounded-xl flex items-center justify-center shadow-md shadow-indigo-200 dark:shadow-none group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
                    <i data-lucide="wallet" class="text-white w-5 h-5"></i>
                </div>
                <span class="text-2xl font-black tracking-tight hidden lg:block">
                    <span :class="darkMode ? 'text-white' : 'text-slate-900'" class="transition-colors">Finance</span><span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-indigo-400">Control</span>
                </span>
            </a>

            <div class="hidden md:flex items-center gap-1.5 p-1.5 bg-slate-100/80 dark:bg-slate-800/80 backdrop-blur-md rounded-2xl border border-slate-200/50 dark:border-slate-700/50">
                <a href="{{ route('dashboard') }}" 
                    class="flex items-center gap-2 px-4 py-2 rounded-xl font-bold text-sm transition-all duration-300 {{ request()->routeIs('dashboard') ? 'bg-white dark:bg-slate-700 text-indigo-600 dark:text-indigo-400 shadow-sm' : 'text-slate-500 dark:text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400 hover:bg-white/60 dark:hover:bg-slate-700/50 hover:scale-105' }}">
                    <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                    <span>Resumen</span>
                </a>

                <a href="{{ route('transactions.index') }}" 
                    class="flex items-center gap-2 px-4 py-2 rounded-xl font-bold text-sm transition-all duration-300 {{ request()->routeIs('transactions.*') ? 'bg-white dark:bg-slate-700 text-indigo-600 dark:text-indigo-400 shadow-sm' : 'text-slate-500 dark:text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400 hover:bg-white/60 dark:hover:bg-slate-700/50 hover:scale-105' }}">
                    <i data-lucide="arrow-left-right" class="w-4 h-4"></i>
                    <span>Movimientos</span>
                </a>
                
                <a href="{{ route('categories.index') }}" 
                    class="flex items-center gap-2 px-4 py-2 rounded-xl font-bold text-sm transition-all duration-300 {{ request()->routeIs('categories.*') ? 'bg-white dark:bg-slate-700 text-indigo-600 dark:text-indigo-400 shadow-sm' : 'text-slate-500 dark:text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400 hover:bg-white/60 dark:hover:bg-slate-700/50 hover:scale-105' }}">
                    <i data-lucide="tags" class="w-4 h-4"></i>
                    <span>Categorías</span>
                </a>
            </div>
        </div>

        <div class="hidden md:flex items-center gap-4">
            
            <button @click="darkMode = !darkMode" 
                :class="darkMode ? 'bg-slate-800 text-amber-400 hover:bg-slate-700 border-slate-700' : 'bg-slate-50 text-indigo-600 hover:bg-slate-100 border-slate-200'"
                class="p-2.5 rounded-xl border transition-all duration-300 hover:scale-110 hover:shadow-sm">
                <i x-show="!darkMode" data-lucide="moon" class="w-5 h-5"></i>
                <i x-show="darkMode" data-lucide="sun" class="w-5 h-5"></i>
            </button>

            <x-dropdown align="right" width="72">
                <x-slot name="trigger">
                    <button class="flex items-center gap-3 pl-1.5 pr-4 py-1.5 border rounded-2xl hover:shadow-md transition-all duration-300 group"
                            :class="darkMode ? 'bg-slate-800 border-slate-700 hover:border-indigo-500/50' : 'bg-white border-slate-200 hover:border-indigo-300'">
                        <div class="w-9 h-9 bg-gradient-to-br from-indigo-500 to-indigo-600 text-white rounded-xl flex items-center justify-center font-black text-sm shadow-inner">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <div class="hidden xl:block text-left">
                            <div :class="darkMode ? 'text-white' : 'text-slate-800'" class="font-bold text-sm leading-tight transition-colors">{{ explode(' ', Auth::user()->name)[0] }}</div>
                        </div>
                        <i data-lucide="chevron-down" class="w-4 h-4 text-slate-400 transition-transform duration-300 group-hover:-rotate-180"></i>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <div :class="darkMode ? 'bg-slate-800 border-slate-700' : 'bg-white border-slate-200'" class="border rounded-2xl overflow-hidden shadow-xl transition-colors">
                        <div class="p-2 space-y-1">
                            <x-dropdown-link :href="route('profile.edit')" 
                                :class="darkMode ? 'text-slate-200 hover:bg-slate-700 hover:text-indigo-400' : 'text-slate-700 hover:bg-slate-50 hover:text-indigo-600'"
                                class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition-colors">
                                <i data-lucide="user" class="w-4 h-4"></i> Mi Perfil
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" 
                                    :class="darkMode ? 'text-rose-400 hover:bg-rose-950/30' : 'text-rose-600 hover:bg-rose-50'"
                                    class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition-colors">
                                    <i data-lucide="log-out" class="w-4 h-4"></i> Cerrar Sesión
                                </x-dropdown-link>
                            </form>
                        </div>
                    </div>
                </x-slot>
            </x-dropdown>
        </div>
    </div>
</nav>
