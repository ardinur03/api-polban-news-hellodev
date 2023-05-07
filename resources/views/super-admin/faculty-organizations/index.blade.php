<x-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Faculty Organizations') }}
            </h2>

            <Link slideover href="{{ route('super-admin.faculty-organizations.create') }}"
                class="px-4 py-2 bg-green-400 hover:bg-green-600 text-white rounded-md text-sm font-normal">
            {{ __('Create Faculty Organization') }}
            </Link>
        </div>
    </x-slot>

    <x-panel>
        <x-splade-table :for="$faculty_organizations" striped>
            @cell('student_organization', $faculty_organizations)
                {{ $faculty_organizations->faculty->faculty_name }}
            @endcell
            @cell('action', $faculty_organizations)
                <div class="flex">
                    <Link slideover
                        href="{{ route('super-admin.faculty-organizations.edit', $faculty_organizations->code_faculty_organization) }}"
                        class="text-blue-600 hover:text-blue-400 font-semibold mr-5"> Edit </Link>
                    <Link class="text-red-600 hover:text-red-400 font-semibold" confirm="Delete Faculty Organization ..."
                        confirm-text="Are you sure?" confirm-button="Yes" cancel-button="Cancel"
                        href="{{ route('super-admin.faculty-organizations.destroy', $faculty_organizations->code_faculty_organization) }}"
                        method="DELETE"> Delete
                    </Link>
                </div>
            @endcell
        </x-splade-table>
    </x-panel>

</x-layout>
