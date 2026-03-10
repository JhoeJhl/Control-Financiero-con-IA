<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FinanceControl · finanzas modernas</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <link href="{{ asset('css/landing.css') }}" rel="stylesheet"> 
    <script src="{{ asset('js/landing.js') }}"></script>
</head>
<body class="bg-light text-dark font-sans antialiased overflow-x-hidden">

    @include('components.landing.navbar')

    <main>
        @yield('content')
    </main>

    @include('components.landing.footer')

    @include('components.landing.login-modal')

    <script>
        lucide.createIcons();
    </script>
</body>
</html>