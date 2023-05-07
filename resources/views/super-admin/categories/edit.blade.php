<x-splade-modal>
    <h1 class="font-bold text-lg">Update New Category</h1>
    <x-splade-form :action="route('super-admin.categories.update', $category->id)" class="max-w-2xl mx-auto p-4" method="PUT" default="{{ $category }}" unguarded>
        <x-splade-input name="category_name" class="mt-4" label="Category Name" />
        <x-splade-submit class="mt-4 px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white text-sm font-normal"
            label="Update" />
    </x-splade-form>
</x-splade-modal>
