<nav class="bg-white border-b border-slate-200 sticky top-0 z-40">
    <div class="max-w-7xl mx-auto px-4 h-16 flex justify-between items-center">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-2 font-bold text-xl text-secondary">
            <div class="flex items-center gap-2 group">
                <div
                    class="w-10 h-10 bg-gradient-to-br from-primary to-secondary rounded-xl flex items-center justify-center shadow-lg shadow-primary/30 group-hover:scale-110 transition-transform">
                    <i data-lucide="wallet" class="w-5 h-5 text-white"></i>
                </div>
                <span class="text-xl font-bold font-display tracking-tight">Finance<span
                        class="text-gradient">Control</span></span>
            </div>
        </a>

        <div class="flex items-center gap-6">
            <a href="{{ route('dashboard') }}"
                class="text-sm font-semibold {{ request()->routeIs('dashboard') ? 'text-primary' : 'text-slate-600' }} hover:text-primary transition">
                Resumen
            </a>
            <a href="{{ route('transactions.index') }}"
                class="text-sm font-semibold {{ request()->routeIs('transactions.*') ? 'text-primary' : 'text-slate-600' }} hover:text-primary transition">
                Movimientos
            </a>
            <a href="{{ route('settings.index') }}"
                class="text-sm font-semibold {{ request()->routeIs('settings.*') ? 'text-primary' : 'text-slate-600' }} hover:text-primary transition">
                Configuración
            </a>

            <div class="h-8 w-px bg-slate-200"></div>

            <button class="flex items-center gap-2 text-slate-600 hover:text-primary transition">
                <div class="w-8 h-8 bg-slate-100 rounded-full flex items-center justify-center">
                    <i data-lucide="user" class="w-4 h-4 text-slate-500"></i>
                </div>
            </button>
        </div>
    </div>
</nav>
