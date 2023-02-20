<x-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('News Galleries') }}
            </h2>
            <Link href="{{ route('admin.news.gallery.create', $news->id) }}"
                class="px-4 py-2 bg-green-400 hover:bg-green-600 text-white text-sm rounded-md">
            {{ __('+ Upload Photo') }}
            </Link>
        </div>
    </x-slot>

    <x-panel>
        <x-splade-table :for="$news_galleries" striped>
            @cell('image', $news_galleries)
                <img src="{{ $news_galleries->picturePath }}" alt="{{ $news_galleries->picturePath }}" class="w-20 h-20">
            @endcell
            @cell('action', $news_galleries)
                <div class="flex">
                    <Link class="text-red-600 hover:text-red-400 font-semibold" confirm="Delete News ..."
                        confirm-text="Are you sure?" confirm-button="Yes" cancel-button="Cancel"
                        href="{{ route('admin.gallery.destroy', $news_galleries->id) }}" method="DELETE"> Delete
                    </Link>
                </div>
            @endcell
        </x-splade-table>
    </x-panel>

</x-layout>
