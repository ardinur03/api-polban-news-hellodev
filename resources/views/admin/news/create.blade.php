<x-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('News Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-splade-form :action="route('admin.news.store')" class="max-w-md mx-auto p-4 bg-white rounded-md shadow-md">
                <x-splade-input name="title" label="Title" placeholder="Enter your Title here..." />
                <x-splade-input name="brief_overview" label="Brief Overview" class="mt-2"
                    placeholder="Enter your Brief Overview here..." />
                <x-splade-textarea name="content" label="Content" class="mt-2" autosize
                    placeholder="Enter your Content here..." />
                <x-splade-select name="status" label="Status" class="mt-2">
                    <option value="">Select Status</option>
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                </x-splade-select>
                <x-splade-select name="category_id" label="Category" class="mt-2">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </x-splade-select>

                <x-splade-submit class="mt-4 px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-md"
                    label="Create" />
            </x-splade-form>
        </div>
    </div>

</x-layout>
