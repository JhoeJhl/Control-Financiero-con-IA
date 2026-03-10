<nav :class="darkMode ? 'bg-slate-900 border-slate-800' : 'bg-red-950 border-slate-200'" 
     class="backdrop-blur-xl border shadow-sm rounded-2xl px-4 py-3 transition-colors duration-300">
    <div class="flex items-center justify-between">
        
        <div class="flex items-center gap-6">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center shadow-md group-hover:scale-105 transition-transform duration-300">
                    <i data-lucide="wallet" class="text-white w-5 h-5"></i>
                </div>
                <span class="text-2xl font-black tracking-tight hidden lg:block">
                    <span :class="darkMode ? 'text-white' : 'text-slate-900'">Finance</span><span class="text-indigo-600">Control</span>
                </span>
            </a>

            <div class="hidden md:flex items-center gap-2 p-1 bg-slate-100 dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700">
                <a href="{{ route('dashboard') }}" 
                    class="flex items-center gap-2 px-4 py-2 rounded-lg font-bold text-sm transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-white dark:bg-slate-700 text-indigo-600 dark:text-indigo-400 shadow-sm' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-white/50 dark:hover:bg-slate-700/50' }}">
                    <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                    <span>Resumen</span>
                </a>

                <a href="{{ route('transactions.index') }}" 
                    class="flex items-center gap-2 px-4 py-2 rounded-lg font-bold text-sm transition-all duration-200 {{ request()->routeIs('transactions.*') ? 'bg-white dark:bg-slate-700 text-indigo-600 dark:text-indigo-400 shadow-sm' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-white/50 dark:hover:bg-slate-700/50' }}">
                    <i data-lucide="arrow-left-right" class="w-4 h-4"></i>
                    <span>Movimientos</span>
                </a>
                
                <a href="{{ route('categories.index') }}" 
                    class="flex items-center gap-2 px-4 py-2 rounded-lg font-bold text-sm transition-all duration-200 {{ request()->routeIs('categories.*') ? 'bg-white dark:bg-slate-700 text-indigo-600 dark:text-indigo-400 shadow-sm' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-white/50 dark:hover:bg-slate-700/50' }}">
                    <i data-lucide="tags" class="w-4 h-4"></i>
                    <span>Categorías</span>
                </a>
            </div>
        </div>

        <div class="hidden md:flex items-center gap-3">
            
            <div class="flex items-center gap-1 p-1 bg-slate-100 dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700">
                <button @click="plan = 'free'" 
                    :class="plan === 'free' ? 'bg-amber-500  dark:bg-slate-700 text-slate-800 dark:text-white shadow-sm' : 'text-slate-500 dark:text-slate-400 hover:text-slate-800 dark:hover:text-white"
                    class="px-4 py-1.5 rounded-lg text-xs font-bold transition-all duration-200 flex items-center gap-1.5 text-black">
                    <i data-lucide="star" class="w-3.5 h-3.5"></i> Free
                </button>
                
                <button @click="plan = 'premium'" 
                    :class="plan === 'premium' ? 'bg-amber-500 text-black shadow-md' : 'text-slate-500 dark:text-slate-400 hover:text-teal-600 dark:hover:text-amber-400'"
                    class="px-4 py-1.5 rounded-lg text-xs font-bold transition-all duration-200 flex items-center gap-1.5">
                    <i data-lucide="crown" class="w-3.5 h-3.5"></i> Premium
                </button>
            </div>
            
            <button @click="darkMode = !darkMode" 
                :class="darkMode ? 'bg-indigo-600 text-white hover:bg-indigo-700' : 'bg-slate-100 text-slate-600 hover:bg-slate-200 hover:text-indigo-600'"
                class="p-2 rounded-xl transition-all duration-200">
                <i x-show="!darkMode" data-lucide="moon" class="w-5 h-5"></i>
                <i x-show="darkMode" data-lucide="sun" class="w-5 h-5"></i>
            </button>

            <x-dropdown align="right" width="72">
                <x-slot name="trigger">
                    <button class="flex items-center gap-3 pl-1.5 pr-4 py-1.5 border rounded-xl hover:shadow-sm transition-all duration-200"
                            :class="darkMode ? 'bg-slate-800 border-slate-700 hover:border-slate-600' : 'bg-white border-slate-200 hover:border-indigo-200'">
                        <div class="w-8 h-8 bg-indigo-100 text-indigo-700 dark:bg-indigo-900/50 dark:text-indigo-300 rounded-lg flex items-center justify-center font-black text-sm">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <div class="hidden xl:block text-left">
                            <div :class="darkMode ? 'text-white' : 'text-slate-800'" class="font-bold text-sm leading-tight">{{ explode(' ', Auth::user()->name)[0] }}</div>
                        </div>
                        <i data-lucide="chevron-down" class="w-4 h-4 text-slate-400"></i>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <div :class="darkMode ? 'bg-slate-800 border-slate-700' : 'bg-white border-slate-200'" class="border rounded-2xl overflow-hidden shadow-xl">
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