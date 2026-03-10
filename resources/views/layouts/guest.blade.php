<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Acceder - FinanceControl</title>
        
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://unpkg.com/lucide@latest"></script>
    </head>
    <body class="font-sans text-slate-900 antialiased bg-slate-50">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            
            <div>
                <a href="/" class="flex items-center gap-2 group">
                    <div class="w-12 h-12 bg-indigo-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-105 transition-transform">
                        <i data-lucide="wallet" class="text-white w-6 h-6"></i>
                    </div>
                    <span class="text-2xl font-black tracking-tight text-slate-900">Finance<span class="text-indigo-600">Control</span></span>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-8 px-8 py-10 bg-white shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden sm:rounded-3xl">
                {{ $slot }}
            </div>
            
        </div>
        <script>lucide.createIcons();</script>
    </body>
</html>