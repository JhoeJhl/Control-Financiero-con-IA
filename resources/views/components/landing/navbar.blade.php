<nav class="fixed top-0 left-0 right-0 z-50 glass border-b border-white/20">
    <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
        <div class="flex items-center gap-2 group">
            <div
                class="w-10 h-10 bg-gradient-to-br from-primary to-secondary rounded-xl flex items-center justify-center shadow-lg shadow-primary/30 group-hover:scale-110 transition-transform">
                <i data-lucide="wallet" class="w-5 h-5 text-white"></i>
            </div>
            <span class="text-xl font-bold font-display tracking-tight">Finance<span
                    class="text-gradient">Control</span></span>
        </div>

        <div class="hidden md:flex items-center gap-8">
            <a href="#features"
                class="text-sm font-medium text-dark/60 hover:text-dark transition-colors relative group">Funciones<span
                    class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-primary to-secondary group-hover:w-full transition-all duration-300"></span></a>
            <a href="#pricing" class="text-sm font-medium text-dark/60 hover:text-dark transition-colors">Precios</a>
            <a href="#about" class="text-sm font-medium text-dark/60 hover:text-dark transition-colors">Nosotros</a>
        </div>

        <div class="flex items-center gap-4">
            @auth
                <a href="{{ url('/dashboard') }}"
                    class="text-sm font-medium text-dark/70 hover:text-dark hidden sm:block">Ir al Panel</a>

                <form method="POST" action="{{ route('logout') }}" class="m-0">
                    @csrf
                    <button type="submit"
                        class="flex items-center gap-2 px-4 py-2 rounded-xl hover:bg-rose-50 text-rose-600 font-bold transition-colors">
                        <i data-lucide="log-out" class="w-4 h-4 text-rose-500"></i>
                        {{ __('Cerrar Sesión') }}
                    </button>
                </form>
            @else
                <button x-data @click.prevent="$dispatch('abrir-modal-login')"
                    class="text-sm font-bold text-slate-600 hover:text-indigo-600 transition-colors hidden sm:block">
                    Iniciar sesión
                </button>
                <a href="{{ route('register') }}"
                    class="relative group overflow-hidden rounded-2xl bg-gradient-to-r from-primary to-secondary text-white px-6 py-3 text-sm font-semibold shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                    <span class="relative z-10">Comenzar gratis</span>
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-secondary to-primary opacity-0 group-hover:opacity-100 transition-opacity">
                    </div>
                </a>
            @endauth
        </div>
    </div>
</nav>
