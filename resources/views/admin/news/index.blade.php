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
        <x-splade-table :for="$news" striped>
            @cell('action', $news)
                <div class="flex">
                    <Link href="{{ route('admin.news.edit', $news->id) }}"
                        class="text-blue-600 hover:text-blue-400 font-semibold mr-5"> Edit </Link>

                    <Link class="text-red-600 hover:text-red-400 font-semibold" confirm="Delete News ..."
                        confirm-text="Are you sure?" confirm-button="Yes" cancel-button="Cancel"
                        href="{{ route('admin.news.destroy', $news->id) }}" method="DELETE"> Delete
                    </Link>
                </div>
            @endcell
        </x-splade-table>
    </x-panel>

</x-app-layout>
