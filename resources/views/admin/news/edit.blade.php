<x-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('News Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-12 lg:px-12">
            <x-splade-form :action="route('admin.news.update', $news->new->id)" method="PUT" default="{{ $news }}" unguarded
                class="max-w-2xl mx-auto p-4 bg-white rounded-md shadow-md">
                <x-splade-input name="title" label="Title" />
                <x-splade-input name="brief_overview" label="Brief Overview" class="mt-2" />
                <x-splade-textarea name="content" label="Content" class="mt-2" autosize />
                <x-splade-select name="status" label="status" class="mt-2">
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                </x-splade-select>

                <x-splade-select name="category_id" id="category_id" label="Category" class="mt-2"
                    v-value="form.category.id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->category_name }}</option>
                    @endforeach
                </x-splade-select>

                <x-splade-submit class="mt-4 px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white text-sm rounded-md"
                    label="Edit" />
            </x-splade-form>
        </div>
    </div>
</x-layout>
