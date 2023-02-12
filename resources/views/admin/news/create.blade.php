<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('News Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-splade-form :action="route('admin.news.store')" class="max-w-md mx-auto p-4 bg-white rounded-md shadow-md">
                <x-splade-input name="title" label="Title" />
                <x-splade-input name="brief_overview" label="brief_overview" />
                <x-splade-textarea name="content" label="Content" />
                <x-splade-select name="status" label="status">
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                </x-splade-select>
                <x-splade-submit class="mt-4 px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-md"
                    label="Create" />
            </x-splade-form>
        </div>
    </div>

</x-app-layout>
