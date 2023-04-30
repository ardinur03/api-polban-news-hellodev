<div>
    <x-splade-toggle data="adminPusat, adminHimpunan">
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md" v-show="!adminPusat && !adminHimpunan">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg">
                <div class="flex justify-center space-x-4">
                    <button
                        class="hover:bg-slate-200 text-gray-700 font-normal py-2 px-7 rounded transition duration-300 ease-in-out flex flex-col items-center"
                        :class="{ 'bg-blue-600 text-white text-center font-semibold transition duration-300 ease-in-out': adminPusat }"
                        @click.prevent="setToggle('adminHimpunan', false); toggle('adminPusat')">
                        <x-heroicon-s-building-office class="h-6 w-9" />
                        <span class="mt-2">Admin Pusat</span>
                    </button>

                    <button
                        class="hover:bg-slate-200 font-normal text-gray-700 py-2 px-6 rounded transition duration-300 ease-in-out flex flex-col items-center"
                        :class="{ 'bg-blue-600 text-white font-semibold transition duration-300 ease-in-out': adminHimpunan }"
                        @click.prevent="setToggle('adminPusat', false); toggle('adminHimpunan')">
                        <x-eos-organization-o class="h-7 w-9" />
                        <span class="mt-2">Admin Himpunan</span>
                    </button>
                </div>
            </div>
        </div>


        <div class="mt-8 sm:mx-auto sm:w-full container-md">
            <x-splade-transition show="adminPusat">
                <x-splade-form :action="route('option-user-admin-campus.store')" enctype="multipart/form-data"
                    class="max-w-2xl mx-auto p-4 bg-white rounded-md shadow-md" confirm="Save data"
                    confirm-text="Are you sure you want to save the data?" confirm-button="Yes!"
                    cancel-button="No, go back!" confirm-success>
                    @csrf
                    <h1 class="text-center text-4xl font-sans font-semibold mb-6">Admin Pusat</h1>
                    <x-splade-select name="code_campus_organization" label="Campus Organization" class="mt-3" choices>
                        <option value="" disabled>Select Campus Organozation...</option>
                        @foreach ($data_campus_organizations as $dco)
                            <option value="{{ $dco->code_campus_organization }}">{{ $dco->name_campus_organization }} -
                                ({{ $dco->code_campus_organization }})
                            </option>
                        @endforeach
                    </x-splade-select>
                    <x-splade-file name="logo" label="Logo Campus Organization" filepond preview accept="image/*"
                        class="mt-3" max-size="2MB" />
                    <x-splade-input name="position" class="mt-3" label="Position"
                        placeholder="Enter your position here..." />
                    <div class="flex justify-between mt-10">
                        <button
                            class="flex items-center justify-center hover:bg-slate-200 text-gray-700 font-normal mt-4 py-2 px-4 rounded transition duration-300 ease-in-out "
                            @click.prevent="setToggle('adminPusat', false); setToggle('adminHimpunan', false)">
                            <x-heroicon-s-arrow-left class="h-6 w-9" />
                            <span class="ml-1">Back</span>
                        </button>
                        <x-splade-submit class="mt-4 px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-md"
                            label="Save" />
                    </div>
                </x-splade-form>
            </x-splade-transition>

            <x-splade-transition show="adminHimpunan">
                <x-splade-form :action="route('option-user-admin-association.store')" enctype="multipart/form-data"
                    class="max-w-2xl mx-auto p-4 bg-white rounded-md shadow-md" confirm="Save data"
                    confirm-text="Are you sure you want to save the data?" confirm-button="Yes!"
                    cancel-button="No, go back!" confirm-success>
                    @csrf
                    <h1 class="text-center text-4xl font-sans font-semibold mb-6">Admin Himpunan</h1>
                    <x-splade-select name="code_faculty_organization" label="Faculty Organization" class="mt-3"
                        choices>
                        <option value="" disabled>Select Faculty Organization...</option>
                        @foreach ($data_association_organizations as $dao)
                            <option value="{{ $dao->code_faculty_organization }}">{{ $dao->name_faculty_organization }}
                                -
                                ({{ $dao->code_faculty_organization }})
                            </option>
                        @endforeach
                    </x-splade-select>
                    <x-splade-file name="logo" label="Logo Faculty Organization" filepond preview accept="image/*"
                        class="mt-3" max-size="2MB" />
                    <x-splade-input name="position" class="mt-3" label="Position"
                        placeholder="Enter your position here..." />
                    <div class="flex justify-between mt-10">
                        <button
                            class="flex items-center justify-center hover:bg-slate-200 text-gray-700 font-normal mt-4 py-2 px-4 rounded transition duration-300 ease-in-out "
                            @click.prevent="setToggle('adminPusat', false); setToggle('adminHimpunan', false)">
                            <x-heroicon-s-arrow-left class="h-6 w-9" />
                            <span class="ml-1">Back</span>
                        </button>
                        <x-splade-submit class="mt-4 px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-md"
                            label="Save" />
                    </div>
                </x-splade-form>
            </x-splade-transition>
        </div>
    </x-splade-toggle>
</div>
