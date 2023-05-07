<x-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Campus Organizations') }}
            </h2>

            <Link slideover href="{{ route('super-admin.campus-organizations.create') }}"
                class="px-4 py-2 bg-green-400 hover:bg-green-600 text-white rounded-md text-sm font-normal">
            {{ __('Create Campus Organization') }}
            </Link>
        </div>
    </x-slot>


    <x-panel>
        <x-splade-table :for="$campus_organizations" striped>
            @cell('action', $campus_organizations)
                <div class="flex">
                    <Link slideover
                        href="{{ route('super-admin.campus-organizations.edit', $campus_organizations->code_campus_organization) }}"
                        class="text-blue-600 hover:text-blue-400 font-semibold mr-5"> Edit </Link>
                    <Link class="text-red-600 hover:text-red-400 font-semibold" confirm="Delete Campus Organization ..."
                        confirm-text="Are you sure?" confirm-button="Yes" cancel-button="Cancel"
                        href="{{ route('super-admin.campus-organizations.destroy', $campus_organizations->code_campus_organization) }}"
                        method="DELETE"> Delete
                    </Link>
                </div>
            @endcell
        </x-splade-table>
    </x-panel>

</x-layout>
