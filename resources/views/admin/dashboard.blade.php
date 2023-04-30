<x-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard ') }}
            {{ Auth::user()->hasRole('admin-pusat') ? 'Admin Pusat' : 'Admin Himpunan' }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-6">
        <h1 class="text-2xl font-bold mb-6">Dashboard</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Card Berita Baru Hari Ini -->
            <x-card-dashboard title="Jumlah berita post hari ini" link="{{ route('admin.dashboard') }}">
                {{ $count_by_news_today }}
                <x-slot name="logo">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                        <path d="M9 21H4a2 2 0 01-2-2V5a2 2 0 012-2h16a2 2 0 012 2v14a2 2 0 01-2 2h-9l-3 3zm0-17v7">
                        </path>
                        <path d="M23 7h-6"></path>
                        <path d="M20 11h-3"></path>
                        <path d="M17 15h-1"></path>
                    </svg>
                </x-slot>
            </x-card-dashboard>
            <!-- Jumlah Berita Draft -->
            <x-card-dashboard title="Jumlah berita draft" link="{{ route('admin.dashboard') }}">
                {{ $count_by_news_draft }}
                <x-slot name="logo">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 13l-3 3m0 0l-3-3m3 3V8m0 11a9 9 0 110-18 9 9 0 019 9z"></path>
                    </svg>
                </x-slot>
            </x-card-dashboard>

            <!-- Jumlah Berita Post -->
            <x-card-dashboard title="Jumlah berita Post" link="{{ route('admin.dashboard') }}">
                {{ $count_by_news_published }}
                <x-slot name="logo">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 18l6-6-6-6"></path>
                    </svg>
                </x-slot>
            </x-card-dashboard>
        </div>
    </div>
</x-layout>
