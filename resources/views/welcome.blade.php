<div
    class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <Link href="{{ url('/admin/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
                Dashboard
                </Link>
            @else
                <Link href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</Link>

                @if (Route::has('register'))
                    <Link href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">
                    Register</Link>
                @endif
            @endauth
        </div>
    @endif

    <div class="">
        <div class="flex items-center justify-center">
            <div class="flex flex-col items-center justify-center">
                <div class="text-6xl font-bold text-gray-700 dark:text-gray-200">
                    API Polban News 🚀
                </div>
                <div class="text-2xl mt-3 text-gray-700 dark:text-gray-200">
                    {{ config('app.env') == 'local' ? 'Development ⚡' : 'Production' }}
                </div>
            </div>
        </div>
    </div>
</div>
