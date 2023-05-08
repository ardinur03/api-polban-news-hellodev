<x-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Activity Logs') }}
            </h2>
        </div>
    </x-slot>

    <x-panel>
        <x-splade-table :for="$logs" striped>
            @cell('properties', $logs)
                <Link slideover href="{{ route('super-admin.logs.show', $logs->id) }}"
                    class="text-blue-600 hover:text-blue-400 font-semibold mr-5"> Detail </Link>
            @endcell
        </x-splade-table>
    </x-panel>

</x-layout>
