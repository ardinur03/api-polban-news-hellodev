<x-splade-modal max-width="lg">
    <h1 class="font-bold text-lg">Create Faculty Organization</h1>
    <x-splade-form :action="route('super-admin.faculty-organizations.store')" class="max-w-2xl mx-auto p-4">
        <x-splade-input name="code_faculty_organization" class="mt-4" label="Faculty Organization Code"
            placeholder="Enter faculty organization code..." />
        <x-splade-input name="name_faculty_organization" class="mt-4" label="Faculty Organization Name"
            placeholder="Enter faculty organization name..." />
        <x-splade-select name="faculty_id" label="Faculty Organization" class="mt-3" choices>
            <option value="" disabled>Select Faculty Organozation...</option>
            @foreach ($data_faculty_organizations as $dco)
                <option value="{{ $dco->id }}">{{ $dco->faculty_name }}</option>
            @endforeach
        </x-splade-select>
        <x-splade-submit
            class="mt-4 px-4 py-2 bg-green-400 hover:bg-green-600 text-white rounded-md text-sm font-normal block w-full"
            label="Create" />
    </x-splade-form>
</x-splade-modal>
