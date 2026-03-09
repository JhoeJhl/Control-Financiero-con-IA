<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FinanceControl · finanzas modernas</title>

    <!-- Tailwind v3 -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Lucide para iconos -->
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <!-- Fuentes modernas: Inter y Plus Jakarta Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        @import url('https://fonts.cdnfonts.com/css/satoshi');
    </style>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2563eb',      // Azul vibrante moderno
                        secondary: '#7c3aed',    // Púrpura para gradientes
                        accent: '#f59e0b',        // Ámbar para detalles
                        dark: '#0f172a',
                        light: '#f8fafc',
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'Inter', 'sans-serif'],
                        display: ['Satoshi', 'Plus Jakarta Sans', 'sans-serif'],
                    },
                    animation: {
                        'gradient': 'gradient 8s linear infinite',
                        'float': 'float 3s ease-in-out infinite',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'spin-slow': 'spin 8s linear infinite',
                        'bounce-slow': 'bounce 2s infinite',
                    },
                    keyframes: {
                        gradient: {
                            '0%, 100%': { backgroundPosition: '0% 50%' },
                            '50%': { backgroundPosition: '100% 50%' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' },
                        }
                    },
                    backgroundSize: {
                        '300%': '300%',
                    }
                }
            }
        }
    </script>

    <style>
        * {
            scroll-behavior: smooth;
        }
        
        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .glass-dark {
            background: rgba(15, 23, 42, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .gradient-border {
            position: relative;
            border: double 1px transparent;
            border-radius: 24px;
            background-image: linear-gradient(white, white), radial-gradient(circle at top left, #2563eb, #7c3aed);
            background-origin: border-box;
            background-clip: padding-box, border-box;
        }
        
        .text-gradient {
            background: linear-gradient(135deg, #2563eb 0%, #7c3aed 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>

<body class="bg-light text-dark font-sans antialiased overflow-x-hidden">

    <!-- Navbar moderna con glassmorphism -->
    <nav class="fixed top-0 left-0 right-0 z-50 glass border-b border-white/20">
        <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
            <!-- Logo moderno -->
            <div class="flex items-center gap-2 group">
                <div class="w-10 h-10 bg-gradient-to-br from-primary to-secondary rounded-xl flex items-center justify-center shadow-lg shadow-primary/30 group-hover:scale-110 transition-transform duration-300">
                    <i data-lucide="wallet" class="w-5 h-5 text-white"></i>
                </div>
                <span class="text-xl font-bold font-display tracking-tight">
                    <span class="text-dark">Finance</span>
                    <span class="text-gradient">Control</span>
                </span>
            </div>

            <!-- Menú desktop -->
            <div class="hidden md:flex items-center gap-8">
                <a href="#features" class="text-sm font-medium text-dark/60 hover:text-dark transition-colors relative group">
                    Funciones
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-primary to-secondary group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="#pricing" class="text-sm font-medium text-dark/60 hover:text-dark transition-colors">Precios</a>
                <a href="#about" class="text-sm font-medium text-dark/60 hover:text-dark transition-colors">Nosotros</a>
            </div>

            <!-- Botones de acción -->
            <div class="flex items-center gap-4">
                <a href="{{ route ('views.auth.login')}}" class="text-sm font-medium text-dark/70 hover:text-dark hidden sm:block">Iniciar sesión</a>
                <button class="relative group overflow-hidden rounded-2xl bg-gradient-to-r from-primary to-secondary text-white px-6 py-3 text-sm font-semibold shadow-lg shadow-primary/30 hover:shadow-xl hover:shadow-primary/40 transition-all duration-300 hover:scale-105">
                    <span class="relative z-10">Comenzar gratis</span>
                    <div class="absolute inset-0 bg-gradient-to-r from-secondary to-primary opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero section con gradientes y elementos flotantes -->
    <header class="relative pt-32 pb-40 px-6 overflow-hidden">
        <!-- Fondo con gradientes animados -->
        <div class="absolute inset-0 bg-gradient-to-br from-primary/5 via-transparent to-secondary/5"></div>
        
        <!-- Elementos decorativos flotantes -->
        <div class="absolute top-20 left-10 w-64 h-64 bg-primary/10 rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-20 right-10 w-80 h-80 bg-secondary/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay: 2s;"></div>
        
        <!-- Círculos flotantes -->
        <div class="absolute top-40 left-[20%] w-4 h-4 bg-primary/30 rounded-full animate-float"></div>
        <div class="absolute bottom-40 right-[20%] w-6 h-6 bg-secondary/30 rounded-full animate-float" style="animation-delay: 1s;"></div>
        <div class="absolute top-60 right-[30%] w-3 h-3 bg-accent/30 rounded-full animate-float" style="animation-delay: 2s;"></div>

        <div class="max-w-6xl mx-auto text-center relative z-10">
            <!-- Badge moderno -->
            <div class="inline-flex items-center gap-2 glass rounded-full px-4 py-2 mb-8 animate-float">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-primary"></span>
                </span>
                <span class="text-xs font-medium text-dark/60">Nueva versión 2.0 disponible</span>
            </div>

            <!-- Título con gradiente y tipografía bold -->
            <h1 class="text-6xl md:text-7xl lg:text-8xl font-display font-black tracking-tight mb-8">
                <span class="block">Tus finanzas,</span>
                <span class="text-gradient block">en modo automático</span>
            </h1>

            <p class="text-lg md:text-xl text-dark/50 max-w-2xl mx-auto mb-12 leading-relaxed">
                Conecta tus cuentas, automatiza tus ahorros y toma el control total de tu dinero con la plataforma financiera más moderna del mercado.
            </p>

            <!-- CTA con efectos modernos -->
            <div class="flex flex-col sm:flex-row justify-center gap-4 mb-16">
                <button class="group bg-gradient-to-r from-primary to-secondary text-white px-8 py-4 rounded-2xl font-semibold text-base hover:shadow-2xl hover:shadow-primary/40 transition-all duration-300 hover:scale-105 inline-flex items-center justify-center gap-2">
                    Empezar ahora
                    <i data-lucide="arrow-right" class="w-5 h-5 group-hover:translate-x-1 transition-transform"></i>
                </button>
                
                <button class="glass text-dark px-8 py-4 rounded-2xl font-semibold text-base hover:bg-white/80 transition-all duration-300 inline-flex items-center justify-center gap-2">
                    <i data-lucide="play" class="w-5 h-5 text-primary"></i>
                    Ver demo interactiva
                </button>
            </div>

            <!-- Stats modernas -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 max-w-3xl mx-auto glass rounded-3xl p-8">
                <div class="text-center">
                    <div class="text-3xl font-black text-primary">+$2B</div>
                    <div class="text-sm text-dark/40">Transacciones</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-black text-primary">500K+</div>
                    <div class="text-sm text-dark/40">Usuarios activos</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-black text-primary">4.9</div>
                    <div class="text-sm text-dark/40">App Store</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-black text-primary">#1</div>
                    <div class="text-sm text-dark/40">Fintech 2026</div>
                </div>
            </div>
        </div>

        <!-- Dashboard preview moderno -->
        <div class="mt-24 max-w-6xl mx-auto px-6 relative">
            <div class="absolute inset-0 bg-gradient-to-t from-light via-transparent to-transparent z-10"></div>
            <div class="relative perspective">
                <div class="transform-gpu hover:rotate-x-2 hover:scale-105 transition-all duration-700">
                    <div class="glass-dark rounded-3xl p-2 shadow-2xl">
                        <div class="bg-gradient-to-br from-dark to-dark/90 rounded-2xl overflow-hidden">
                            <!-- Mockup de dashboard moderno -->
                            <div class="aspect-video relative">
                                <!-- Grid de fondo -->
                                <div class="absolute inset-0 opacity-10" 
                                     style="background-image: linear-gradient(rgba(255,255,255,0.1) 1px, transparent 1px), 
                                                      linear-gradient(90deg, rgba(255,255,255,0.1) 1px, transparent 1px);
                                            background-size: 30px 30px;">
                                </div>
                                
                                <!-- Elementos del dashboard -->
                                <div class="absolute inset-0 p-6">
                                    <div class="flex items-center gap-3 mb-6">
                                        <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                                        <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                    </div>
                                    
                                    <div class="grid grid-cols-3 gap-4">
                                        <div class="glass rounded-xl p-4">
                                            <div class="w-full h-2 bg-white/10 rounded-full mb-3"></div>
                                            <div class="w-2/3 h-2 bg-primary/50 rounded-full"></div>
                                        </div>
                                        <div class="glass rounded-xl p-4">
                                            <div class="w-full h-2 bg-white/10 rounded-full mb-3"></div>
                                            <div class="w-3/4 h-2 bg-secondary/50 rounded-full"></div>
                                        </div>
                                        <div class="glass rounded-xl p-4">
                                            <div class="w-full h-2 bg-white/10 rounded-full mb-3"></div>
                                            <div class="w-1/2 h-2 bg-accent/50 rounded-full"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4 flex items-center justify-center">
                                        <span class="text-white/20 text-sm font-mono">live dashboard · 2026</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Features con diseño moderno de tarjetas -->
    <section id="features" class="py-32 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Encabezado de sección moderno -->
            <div class="text-center mb-20">
                <span class="text-sm font-semibold text-primary uppercase tracking-wider">Funciones</span>
                <h2 class="text-4xl md:text-5xl font-display font-bold mt-4 mb-6">
                    Todo lo que necesitas en<br><span class="text-gradient">un solo lugar</span>
                </h2>
                <p class="text-lg text-dark/50 max-w-2xl mx-auto">
                    Diseñado para ofrecerte una experiencia financiera completa, intuitiva y sin complicaciones.
                </p>
            </div>

            <!-- Grid de features moderno -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 - Tarjeta con glass effect -->
                <div class="group relative bg-white rounded-3xl p-8 hover:shadow-2xl transition-all duration-500 border border-dark/5 hover:border-primary/20">
                    <div class="absolute inset-0 bg-gradient-to-br from-primary/5 to-secondary/5 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    <div class="relative">
                        <div class="w-16 h-16 bg-gradient-to-br from-primary/10 to-secondary/10 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:from-primary/20 group-hover:to-secondary/20 transition-all duration-300">
                            <i data-lucide="trending-up" class="w-8 h-8 text-primary"></i>
                        </div>
                        
                        <h3 class="text-2xl font-bold text-dark mb-3">Análisis en tiempo real</h3>
                        <p class="text-dark/50 leading-relaxed mb-6">
                            Visualiza tus ingresos y gastos al instante con gráficos interactivos y actualizaciones en vivo.
                        </p>
                        
                        <div class="flex items-center gap-2 text-primary font-medium group-hover:gap-3 transition-all">
                            <span>Saber más</span>
                            <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </div>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="group relative bg-white rounded-3xl p-8 hover:shadow-2xl transition-all duration-500 border border-dark/5 hover:border-primary/20">
                    <div class="absolute inset-0 bg-gradient-to-br from-primary/5 to-secondary/5 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    <div class="relative">
                        <div class="w-16 h-16 bg-gradient-to-br from-primary/10 to-secondary/10 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:from-primary/20 group-hover:to-secondary/20 transition-all duration-300">
                            <i data-lucide="target" class="w-8 h-8 text-primary"></i>
                        </div>
                        
                        <h3 class="text-2xl font-bold text-dark mb-3">Metas inteligentes</h3>
                        <p class="text-dark/50 leading-relaxed mb-6">
                            Establece objetivos de ahorro y recibe recomendaciones personalizadas para alcanzarlos más rápido.
                        </p>
                        
                        <div class="flex items-center gap-2 text-primary font-medium group-hover:gap-3 transition-all">
                            <span>Saber más</span>
                            <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </div>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="group relative bg-white rounded-3xl p-8 hover:shadow-2xl transition-all duration-500 border border-dark/5 hover:border-primary/20">
                    <div class="absolute inset-0 bg-gradient-to-br from-primary/5 to-secondary/5 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    <div class="relative">
                        <div class="w-16 h-16 bg-gradient-to-br from-primary/10 to-secondary/10 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:from-primary/20 group-hover:to-secondary/20 transition-all duration-300">
                            <i data-lucide="shield" class="w-8 h-8 text-primary"></i>
                        </div>
                        
                        <h3 class="text-2xl font-bold text-dark mb-3">Seguridad bancaria</h3>
                        <p class="text-dark/50 leading-relaxed mb-6">
                            Tus datos están protegidos con encriptación de nivel bancario y autenticación biométrica.
                        </p>
                        
                        <div class="flex items-center gap-2 text-primary font-medium group-hover:gap-3 transition-all">
                            <span>Saber más</span>
                            <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de integraciones moderna -->
    <section class="py-32 bg-gradient-to-b from-white to-primary/5">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <!-- Contenido izquierdo -->
                <div>
                    <span class="text-sm font-semibold text-primary uppercase tracking-wider">Integraciones</span>
                    <h2 class="text-4xl font-display font-bold mt-4 mb-6">
                        Conecta con tus<br><span class="text-gradient">aplicaciones favoritas</span>
                    </h2>
                    <p class="text-lg text-dark/50 mb-8">
                        Sincroniza automáticamente con más de 50 bancos y plataformas de pago. Todo en un solo dashboard.
                    </p>
                    
                    <!-- Lista de integraciones -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex items-center gap-3 glass rounded-xl p-3">
                            <div class="w-8 h-8 bg-primary/10 rounded-lg flex items-center justify-center">
                                <i data-lucide="landmark" class="w-4 h-4 text-primary"></i>
                            </div>
                            <span class="text-sm font-medium">Bancos locales</span>
                        </div>
                        <div class="flex items-center gap-3 glass rounded-xl p-3">
                            <div class="w-8 h-8 bg-primary/10 rounded-lg flex items-center justify-center">
                                <i data-lucide="credit-card" class="w-4 h-4 text-primary"></i>
                            </div>
                            <span class="text-sm font-medium">Tarjetas</span>
                        </div>
                        <div class="flex items-center gap-3 glass rounded-xl p-3">
                            <div class="w-8 h-8 bg-primary/10 rounded-lg flex items-center justify-center">
                                <i data-lucide="bitcoin" class="w-4 h-4 text-primary"></i>
                            </div>
                            <span class="text-sm font-medium">Cripto</span>
                        </div>
                        <div class="flex items-center gap-3 glass rounded-xl p-3">
                            <div class="w-8 h-8 bg-primary/10 rounded-lg flex items-center justify-center">
                                <i data-lucide="wallet" class="w-4 h-4 text-primary"></i>
                            </div>
                            <span class="text-sm font-medium">PayPal</span>
                        </div>
                    </div>
                </div>

                <!-- Mockup circular de integraciones -->
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-primary/20 to-secondary/20 rounded-full blur-3xl"></div>
                    <div class="relative glass-dark rounded-3xl p-8 border border-white/10">
                        <div class="grid grid-cols-3 gap-4">
                            <div class="aspect-square glass rounded-2xl flex items-center justify-center">
                                <i data-lucide="landmark" class="w-8 h-8 text-white/60"></i>
                            </div>
                            <div class="aspect-square glass rounded-2xl flex items-center justify-center">
                                <i data-lucide="credit-card" class="w-8 h-8 text-white/60"></i>
                            </div>
                            <div class="aspect-square glass rounded-2xl flex items-center justify-center">
                                <i data-lucide="bitcoin" class="w-8 h-8 text-white/60"></i>
                            </div>
                            <div class="aspect-square glass rounded-2xl flex items-center justify-center">
                                <i data-lucide="wallet" class="w-8 h-8 text-white/60"></i>
                            </div>
                            <div class="aspect-square glass rounded-2xl flex items-center justify-center">
                                <i data-lucide="building" class="w-8 h-8 text-white/60"></i>
                            </div>
                            <div class="aspect-square glass rounded-2xl flex items-center justify-center">
                                <i data-lucide="smartphone" class="w-8 h-8 text-white/60"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA final moderno -->
    <section class="py-32 px-6">
        <div class="max-w-4xl mx-auto text-center">
            <div class="glass-dark rounded-[3rem] p-16 relative overflow-hidden">
                <!-- Elementos decorativos -->
                <div class="absolute top-0 left-0 w-64 h-64 bg-primary/20 rounded-full blur-3xl -translate-x-32 -translate-y-32"></div>
                <div class="absolute bottom-0 right-0 w-64 h-64 bg-secondary/20 rounded-full blur-3xl translate-x-32 translate-y-32"></div>
                
                <div class="relative z-10">
                    <h2 class="text-4xl md:text-5xl font-display font-bold text-white mb-6">
                        Empieza a controlar<br>tu dinero hoy
                    </h2>
                    <p class="text-lg text-white/60 max-w-2xl mx-auto mb-10">
                        Únete a más de 500,000 personas que ya están transformando sus finanzas con FinanceControl.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row justify-center gap-4">
                        <button class="bg-white text-dark px-8 py-4 rounded-2xl font-semibold hover:shadow-2xl hover:scale-105 transition-all duration-300 inline-flex items-center justify-center gap-2">
                            <i data-lucide="apple" class="w-5 h-5"></i>
                            App Store
                        </button>
                        <button class="bg-white/10 backdrop-blur-sm text-white border border-white/20 px-8 py-4 rounded-2xl font-semibold hover:bg-white/20 transition-all duration-300 inline-flex items-center justify-center gap-2">
                            <i data-lucide="chrome" class="w-5 h-5"></i>
                            Web App
                        </button>
                    </div>
                    
                    <p class="text-white/40 text-sm mt-8">
                        ⚡ Sin compromiso · Cancela cuando quieras
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer moderno -->
    <footer class="border-t border-dark/5 py-16 bg-white/50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-8">
                <!-- Columna logo -->
                <div class="col-span-1">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-8 h-8 bg-gradient-to-br from-primary to-secondary rounded-lg flex items-center justify-center">
                            <i data-lucide="wallet" class="w-4 h-4 text-white"></i>
                        </div>
                        <span class="font-bold font-display">FinanceControl</span>
                    </div>
                    <p class="text-sm text-dark/40 leading-relaxed">
                        La forma más inteligente de gestionar tu dinero en el siglo XXI.
                    </p>
                </div>
                
                <!-- Links -->
                <div>
                    <h4 class="font-semibold mb-4">Producto</h4>
                    <ul class="space-y-2 text-sm text-dark/40">
                        <li><a href="#" class="hover:text-primary transition-colors">Funciones</a></li>
                        <li><a href="#" class="hover:text-primary transition-colors">Precios</a></li>
                        <li><a href="#" class="hover:text-primary transition-colors">FAQ</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-semibold mb-4">Compañía</h4>
                    <ul class="space-y-2 text-sm text-dark/40">
                        <li><a href="#" class="hover:text-primary transition-colors">Sobre nosotros</a></li>
                        <li><a href="#" class="hover:text-primary transition-colors">Blog</a></li>
                        <li><a href="#" class="hover:text-primary transition-colors">Contacto</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-semibold mb-4">Legal</h4>
                    <ul class="space-y-2 text-sm text-dark/40">
                        <li><a href="#" class="hover:text-primary transition-colors">Privacidad</a></li>
                        <li><a href="#" class="hover:text-primary transition-colors">Términos</a></li>
                        <li><a href="#" class="hover:text-primary transition-colors">Cookies</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-dark/5 mt-12 pt-8 flex justify-between items-center">
                <p class="text-sm text-dark/30">
                    © 2026 FinanceControl · Hecho con ❤️ por Joel Pinto
                </p>
                <div class="flex gap-4">
                    <a href="#" class="text-dark/30 hover:text-primary transition-colors">
                        <i data-lucide="twitter" class="w-5 h-5"></i>
                    </a>
                    <a href="#" class="text-dark/30 hover:text-primary transition-colors">
                        <i data-lucide="linkedin" class="w-5 h-5"></i>
                    </a>
                    <a href="#" class="text-dark/30 hover:text-primary transition-colors">
                        <i data-lucide="github" class="w-5 h-5"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Inicializar iconos de Lucide
        lucide.createIcons();
        
        // Efecto de scroll suave
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
    </script>
</body>

</html>