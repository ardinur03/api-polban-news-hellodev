<x-splade-modal>
    <h1 class="font-bold text-lg">Create Faculty Organization</h1>
    <x-splade-form :action="route('super-admin.faculty-organizations.update', $facultyOrganization->code_faculty_organization)" class="max-w-2xl mx-auto p-4" method="PUT" default="{{ $facultyOrganization }}">
        <x-splade-input name="code_faculty_organization" class="mt-4" label="Faculty Organization Code"
            placeholder="Enter faculty organization code..." />
        <x-splade-input name="name_faculty_organization" class="mt-4" label="Faculty Organization Name"
            placeholder="Enter faculty organization name..." />
        <x-splade-select name="faculty_id" label="Faculty Organization" class="mt-3" choices>
            <option value="" disabled>Select Faculty Organozation...</option>
            @foreach ($data_faculty_organizations as $dco)
                @if ($dco->id == $facultyOrganization->faculty_id)
                    <option value="{{ $dco->id }}" selected>{{ $dco->faculty_name }} </option>
                @endif
                @if ($dco->id != $facultyOrganization->faculty_id)
                    <option value="{{ $dco->id }}">{{ $dco->faculty_name }} </option>
                @endif
            @endforeach
        </x-splade-select>
        <x-splade-submit
            class="mt-4 px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white text-sm font-normal block w-full"
            label="Update" />
    </x-splade-form>
</x-splade-modal>
