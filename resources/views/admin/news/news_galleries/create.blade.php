<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('News Gallery Upload Photos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-splade-form :action="route('admin.news.gallery.store', $news->id)" :default="['files' => []]"
                class="w-full max-w-md mx-auto p-4 bg-white rounded-md shadow-md" enctype="multipart/form-data"
                method="post">
                <x-splade-file name="files[]" filepond multiple preview accept="image/*" />
                <x-splade-submit class="mt-4 px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md"
                    label="Upload" />
            </x-splade-form>
        </div>
    </div>

</x-app-layout>
