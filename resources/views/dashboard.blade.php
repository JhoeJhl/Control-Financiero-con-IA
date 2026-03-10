<x-app-layout>
    <div class="py-8 sm:py-12 bg-slate-50/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            @include('dashboard.partials.header')

            @include('dashboard.partials.stats-cards')

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                @include('dashboard.partials.distribution')
                @include('dashboard.partials.recent-transactions')
            </div>

            @include('dashboard.partials.create-modal')

        </div>
    </div>
</x-app-layout>