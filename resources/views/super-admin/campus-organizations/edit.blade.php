<x-splade-modal>
    <h1 class="font-bold text-lg">Update Campus Organization</h1>
    <x-splade-form :action="route('super-admin.campus-organizations.update', $campusOrganization->code_campus_organization)" class="max-w-2xl mx-auto p-4" method="PUT" default="{{ $campusOrganization }}"
        unguarded>
        <x-splade-input name="code_campus_organization" class="mt-4" label="Campus Organization Code"
            placeholder="Enter faculty organization code..." />
        <x-splade-input name="name_campus_organization" class="mt-4" label="Campus Organization Name"
            placeholder="Enter faculty organization name..." />
        <x-splade-submit
            class="mt-4 px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white text-sm font-normal block w-full"
            label="Update" />
    </x-splade-form>
</x-splade-modal>
