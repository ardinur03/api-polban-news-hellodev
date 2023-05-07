<x-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Categories') }}
            </h2>

            <Link slideover href="{{ route('super-admin.categories.create') }}"
                class="px-4 py-2 bg-green-400 hover:bg-green-600 text-white rounded-md text-sm font-normal">
            {{ __('Create Category') }}
            </Link>

        </div>
    </x-slot>

    <x-panel>
        <x-splade-table :for="$categories" striped>
            @cell('action', $categories)
                <div class="flex">
                    <Link slideover href="{{ route('super-admin.categories.edit', $categories->id) }}"
                        class="text-blue-600 hover:text-blue-400 font-semibold mr-5"> Edit </Link>
                    <Link class="text-red-600 hover:text-red-400 font-semibold" confirm="Delete categories ..."
                        confirm-text="Are you sure?" confirm-button="Yes" cancel-button="Cancel"
                        href="{{ route('super-admin.categories.destroy', $categories->id) }}" method="DELETE"> Delete
                    </Link>
                </div>
            @endcell
        </x-splade-table>
    </x-panel>

</x-layout>
