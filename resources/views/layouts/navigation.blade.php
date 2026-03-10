<div x-data="{ 
        open: false,
        darkMode: localStorage.getItem('darkMode') === 'true',
        plan: localStorage.getItem('selectedPlan') || 'free'
    }" 
    x-init="
        $watch('darkMode', value => {
            localStorage.setItem('darkMode', value);
            document.documentElement.classList.toggle('dark', value);
            document.documentElement.style.colorScheme = value ? 'dark' : 'light';
        });
        if(darkMode) {
            document.documentElement.classList.add('dark');
            document.documentElement.style.colorScheme = 'dark';
        }
        $watch('plan', value => localStorage.setItem('selectedPlan', value));
    "
    @open-modal.window="if($event.detail === 'modal-registrar-gasto') open = false;"
    class="sticky top-6 z-50 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto w-full">
    
    @include('layouts.partials.navbar-desktop')

    @include('layouts.partials.navbar-mobile')

</div>