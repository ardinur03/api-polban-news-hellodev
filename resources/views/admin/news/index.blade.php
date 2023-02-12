<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('News') }}
            </h2>

            <Link href="{{ route('admin.news.create') }}"
                class="px-4 py-2 bg-green-400 hover:bg-green-600 text-white rounded-md">
            {{ __('Create News') }}
            </Link>
        </div>
    </x-slot>

    <x-panel>
        <x-splade-table :for="$news" striped />
    </x-panel>

</x-app-layout>
