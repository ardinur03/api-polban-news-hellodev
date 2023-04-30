<x-guest-layout>
    <div class="min-h-screen bg-gray-100 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                {{ __('Choose your admin role') }}
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                {{ __('Select one of the options below to continue as a central admin or a student association admin') }}
            </p>
        </div>

        <x-option-register />

    </div>

</x-guest-layout>
