@extends('layouts.landing')

@section('content')
    <header class="relative pt-32 pb-40 px-6 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-primary/5 via-transparent to-secondary/5"></div>
        <div class="absolute top-20 left-10 w-64 h-64 bg-primary/10 rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-20 right-10 w-80 h-80 bg-secondary/10 rounded-full blur-3xl animate-pulse-slow"
            style="animation-delay: 2s;"></div>

        <div class="max-w-6xl mx-auto text-center relative z-10">
            <div class="inline-flex items-center gap-2 glass rounded-full px-4 py-2 mb-8 animate-float">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-primary"></span>
                </span>
                <span class="text-xs font-medium text-dark/60">Beta 1.0</span>
            </div>

            <h1 class="text-6xl md:text-7xl lg:text-8xl font-display font-black tracking-tight mb-8">
                <span class="block">Tus finanzas,</span>
                <span class="text-gradient block">en modo automático</span>
            </h1>

            <p class="text-lg md:text-xl text-dark/50 max-w-2xl mx-auto mb-12 leading-relaxed">
                Conecta tus cuentas, automatiza tus ahorros y toma el control total de tu dinero con la plataforma
                financiera más moderna del mercado.
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-4 mb-16">
                <button x-data @click.prevent="$dispatch('abrir-modal-login')"
                    class="group bg-gradient-to-r from-primary to-secondary text-white px-8 py-4 rounded-2xl font-semibold text-base hover:shadow-2xl hover:shadow-primary/40 transition-all duration-300 hover:scale-105 inline-flex items-center justify-center gap-2">
                    Empezar ahora
                    <i data-lucide="arrow-right" class="w-5 h-5 group-hover:translate-x-1 transition-transform"></i>
                </button>
            </div>
        </div>
    </header>

    <section id="features" class="py-32 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-20">
                <span class="text-sm font-semibold text-primary uppercase tracking-wider">Funciones</span>
                <h2 class="text-4xl md:text-5xl font-display font-bold mt-4 mb-6">
                    Todo lo que necesitas en<br><span class="text-gradient">un solo lugar</span>
                </h2>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div
                    class="group relative bg-white rounded-3xl p-8 hover:shadow-2xl transition-all duration-500 border border-dark/5 hover:border-primary/20">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-primary/10 to-secondary/10 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-all duration-300">
                        <i data-lucide="trending-up" class="w-8 h-8 text-primary"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-dark mb-3">Análisis en tiempo real</h3>
                    <p class="text-dark/50 leading-relaxed mb-6">Visualiza tus ingresos y gastos al instante con gráficos
                        interactivos y actualizaciones en vivo.</p>
                </div>

                <div
                    class="group relative bg-white rounded-3xl p-8 hover:shadow-2xl transition-all duration-500 border border-dark/5 hover:border-primary/20">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-primary/10 to-secondary/10 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-all duration-300">
                        <i data-lucide="target" class="w-8 h-8 text-primary"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-dark mb-3">Metas inteligentes</h3>
                    <p class="text-dark/50 leading-relaxed mb-6">Establece objetivos de ahorro y recibe recomendaciones
                        personalizadas para alcanzarlos más rápido.</p>
                </div>

                <div
                    class="group relative bg-white rounded-3xl p-8 hover:shadow-2xl transition-all duration-500 border border-dark/5 hover:border-primary/20">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-primary/10 to-secondary/10 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-all duration-300">
                        <i data-lucide="shield" class="w-8 h-8 text-primary"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-dark mb-3">Seguridad bancaria</h3>
                    <p class="text-dark/50 leading-relaxed mb-6">Tus datos están protegidos con encriptación de nivel
                        bancario y autenticación biométrica.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-32 px-6">
        <div class="max-w-4xl mx-auto text-center">
            <div class="bg-dark rounded-[3rem] p-16 relative overflow-hidden shadow-2xl border border-white/10">
                <div
                    class="absolute top-0 left-0 w-64 h-64 bg-primary/40 rounded-full blur-3xl -translate-x-32 -translate-y-32">
                </div>
                <div
                    class="absolute bottom-0 right-0 w-64 h-64 bg-secondary/40 rounded-full blur-3xl translate-x-32 translate-y-32">
                </div>

                <div class="relative z-10">
                    <h2 class="text-4xl md:text-5xl font-display font-bold text-white mb-6">
                        Empieza a controlar<br>tu dinero hoy
                    </h2>
                    <p class="text-lg text-white/70 max-w-2xl mx-auto mb-10">
                        Únete a miles de personas en Bolivia que ya están transformando sus finanzas.
                    </p>

                    <button @click.prevent="$dispatch('abrir-modal-login')"
                        class="bg-white text-dark px-8 py-4 rounded-2xl font-bold hover:shadow-xl hover:scale-105 transition-all duration-300 inline-flex items-center justify-center gap-2">
                        Comenzar Gratis
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection
