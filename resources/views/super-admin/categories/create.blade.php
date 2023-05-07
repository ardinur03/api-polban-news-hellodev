<x-splade-modal>
    <h1 class="font-bold text-lg">Create New Category</h1>
    <x-splade-form :action="route('super-admin.categories.store')" class="max-w-2xl mx-auto p-4">
        <x-splade-input name="category_name" class="mt-4" label="Category Name" />
        <x-splade-submit class="mt-4 px-4 py-2 bg-green-400 hover:bg-green-600 text-white rounded-md text-sm font-normal"
            label="Create" />
    </x-splade-form>
</x-splade-modal>
