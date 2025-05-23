<x-layouts.guest>
    <section class="pb-8">
        <form action="{{ route('register.student') }}" method="post">
            @csrf

            <div id="accordion-open" data-accordion="open" class="mb-8"
                data-active-classes="bg-blue-100 dark:bg-gray-800 text-blue-600 dark:text-white">
                <h2 id="accordion-open-heading-1">
                    <button type="button"
                        class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                        data-accordion-target="#accordion-open-body-1" aria-expanded="true"
                        aria-controls="accordion-open-body-1">
                        <span class="flex items-center"><svg class="w-5 h-5 me-2 shrink-0" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                    clip-rule="evenodd"></path>
                            </svg>Personal Information</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="accordion-open-body-1" class="hidden" aria-labelledby="accordion-open-heading-1">
                    <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                        <div class="grid gap-6 mb-6 md:grid-cols-4">
                            <div>
                                <label for="student_code"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Student
                                    ID</label>
                                <input type="text" id="student_code" name="student_code"
                                    value="{{ old('student_code') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Enter Student ID" />
                                @error('student_code')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="lastname"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last
                                    name</label>
                                <input type="text" id="lastname" name="lastname" value="{{ old('lastname') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Enter lastname" />
                                @error('lastname')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="firstname"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First
                                    name</label>
                                <input type="text" id="firstname" name="firstname" value="{{ old('firstname') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Enter firstname" />
                                @error('firstname')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="middlename"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Middle
                                    name</label>
                                <input type="text" id="middlename" name="middlename" value="{{ old('middlename') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Enter middlename" />
                            </div>
                            <div>
                                <label for="level"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Grade
                                    Level</label>
                                <select id="level" name="level"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">Choose level</option>
                                    @foreach ($levels as $level)
                                        <option value="{{ $level }}" @selected(old('level') == $level)>
                                            {{ $level }}</option>
                                    @endforeach
                                </select>
                                @error('level')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="section"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Section</label>
                                <input type="text" id="section" name="section" value="{{ old('section') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Enter section" />
                                @error('section')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-full">
                                <label for="address"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                <input type="text" id="address" name="address" value="{{ old('address') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Barangay, Municipality, Province" />
                                @error('address')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="dob"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Birth
                                    Date</label>
                                <input type="date" id="dob" name="dob" value="{{ old('dob') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                @error('dob')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="mobile_number"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mobile
                                    Number</label>
                                <input type="tel" id="mobile_number" name="mobile_number"
                                    value="{{ old('mobile_number') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="123-45-678" />
                                @error('mobile_number')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="sex"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sex</label>
                                <div class="flex pt-4">
                                    <div class="flex items-center me-4">
                                        <input id="male" type="radio" value="Male" name="sex"
                                            {{ old('sex') == 'Male' ? 'checked' : '' }}
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="male"
                                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Male</label>
                                    </div>
                                    <div class="flex items-center me-4">
                                        <input id="female" type="radio" value="Female" name="sex"
                                            {{ old('sex') == 'Female' ? 'checked' : '' }}
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="female"
                                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Female</label>
                                    </div>
                                </div>

                                @error('sex')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="col-start-1">
                                <label for="father_lastname"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Father's Last
                                    Name</label>
                                <input type="text" id="father_lastname" name="father_lastname"
                                    value="{{ old('father_lastname') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Enter lastname" />
                            </div>
                            <div>
                                <label for="father_firstname"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Father's First
                                    Name</label>
                                <input type="text" id="father_firstname" name="father_firstname"
                                    value="{{ old('father_firstname') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Enter firstname" />
                            </div>
                            <div>
                                <label for="father_middlename"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Father's
                                    Middle
                                    Name</label>
                                <input type="text" id="father_middlename" name="father_middlename"
                                    value="{{ old('father_middlename') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Enter middlename" />
                            </div>
                            <div>
                                <label for="father_mobile_number"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Father's
                                    Mobile
                                    Number</label>
                                <input type="tel" id="father_mobile_number" name="father_mobile_number"
                                    value="{{ old('father_mobile_number') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="123-45-678" />
                            </div>
                            <div>
                                <label for="mother_lastname"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mother's Last
                                    Name</label>
                                <input type="text" id="mother_lastname" name="mother_lastname"
                                    value="{{ old('mother_lastname') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Enter lastname" />
                            </div>
                            <div>
                                <label for="mother_firstname"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mother's First
                                    Name</label>
                                <input type="text" id="mother_firstname" name="mother_firstname"
                                    value="{{ old('mother_firstname') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Enter firstname" />
                            </div>
                            <div>
                                <label for="mother_middlename"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mother's
                                    Middle
                                    Name</label>
                                <input type="text" id="mother_middlename" name="mother_middlename"
                                    value="{{ old('mother_middlename') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Enter middlename" />
                            </div>
                            <div>
                                <label for="father_mobile_number"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mother's
                                    Mobile
                                    Number</label>
                                <input type="tel" id="father_mobile_number" name="mother_mobile_number"
                                    value="{{ old('mother_mobile_number') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="123-45-678" />
                            </div>
                        </div>
                    </div>
                </div>
                <h2 id="accordion-open-heading-2">
                    <button type="button"
                        class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                        data-accordion-target="#accordion-open-body-2" aria-expanded="true"
                        aria-controls="accordion-open-body-2">
                        <span class="flex items-center"><svg class="w-5 h-5 me-2 shrink-0" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                    clip-rule="evenodd"></path>
                            </svg>Medical Information</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="accordion-open-body-2" class="hidden" aria-labelledby="accordion-open-heading-2">
                    <div class="p-5 border border-gray-200 dark:border-gray-700">
                        <div class="p-5 border border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                            <div class="grid gap-6 mb-6 md:grid-cols-4">
                                <div class="md:col-span-4">
                                    1. Immunization
                                </div>
                                <div class="md:col-span-2 pl-8">
                                    <label for="first_vaccine_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">1st Dose
                                        Vaccine Name</label>
                                    <input type="text" id="1st_vaccine_name" name="first_vaccine_name"
                                        value="{{ old('first_vaccine_name') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Enter vaccine name" />
                                </div>
                                <div class="md:col-span-2 pl-8">
                                    <label for="first_vaccine_date"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">1st Dose
                                        Date</label>
                                    <input type="date" id="first_vaccine_date" name="first_vaccine_date"
                                        value="{{ old('first_vaccine_date') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                </div>

                                <div class="md:col-span-2 pl-8">
                                    <label for="second_vaccine_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">2nd Dose
                                        Vaccine Name</label>
                                    <input type="text" id="second_vaccine_name" name="second_vaccine_name"
                                        value="{{ old('second_vaccine_name') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Enter vaccine name" />
                                </div>
                                <div class="md:col-span-2 pl-8">
                                    <label for="second_vaccine_date"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">2nd Dose
                                        Date</label>
                                    <input type="date" id="second_vaccine_date" name="second_vaccine_date"
                                        value="{{ old('second_vaccine_date') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                </div>

                                <div class="md:col-span-2 pl-8">
                                    <label for="booster_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Booster
                                        Shot</label>
                                    <input type="text" id="booster_name" name="booster_name"
                                        value="{{ old('booster_name') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Enter vaccine name" />
                                </div>
                                <div class="md:col-span-2 pl-8">
                                    <label for="booster_date"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Booster
                                        Date</label>
                                    <input type="date" id="booster_date" name="booster_date"
                                        value="{{ old('booster_date') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                </div>


                                <div class="md:col-span-4">
                                    2. Has your child had COVID-19? If yes, when?
                                </div>
                                <div class="pl-8">
                                    {{-- <label for="had_covid"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">2. Has your child had COVID-19?</label> --}}
                                    <input type="date" id="had_covid" name="had_covid"
                                        value="{{ old('had_covid') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                </div>
                                <div class="md:col-span-4">
                                    3. Allergies
                                </div>
                                <div class="col-start-1 col-span-full pl-8">
                                    {{-- <label for="Allergies"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Allergies</label> --}}
                                    <textarea
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Cause / Reaction / Treatment" name="allergies" id="allergies" cols="100" rows="5">{{ old('allergies') }}</textarea>
                                </div>
                                <div class="md:col-span-4">
                                    4. Medication
                                </div>
                                <div class="md:col-span-2 pl-8">
                                    <label for="daily_medication"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Does your
                                        child take
                                        medication at home on a daily basis? If yes fillout, otherwise leave
                                        blank.</label>
                                    <input type="text" id="medication_name" name="medication_name"
                                        value="{{ old('medication_name') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Medication" />
                                </div>
                                <div class="flex items-end">
                                    <label for="daily_medication"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></label>
                                    <input type="text" id="used_to_treat" name="used_to_treat"
                                        value="{{ old('used_to_treat') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Used to treat" />
                                </div>
                                <div class="flex items-end">
                                    <label for="daily_medication"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></label>
                                    <input type="text" id="dose_time" name="dose_time"
                                        value="{{ old('dose_time') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Dose/Time" />
                                </div>
                                <div class="md:col-span-4">
                                    5. Is your child
                                    receiving current or ongoing treatment for any medical, surgical, or psychological
                                    condition?
                                </div>
                                <div class="col-start-1 col-span-full pl-8">
                                    <label for="ongoing_treatment"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">If yes,
                                        please explain and send physician's statement.</label>
                                    <textarea
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        name="ongoing_treatment" id="ongoing_treatment" cols="100" rows="5">{{ old('ongoing_treatment') }}</textarea>
                                </div>
                                <div class="md:col-span-4">
                                    6. Any medical
                                    condition that would not allow your child to participate in physical education or in
                                    Intramural sports?
                                </div>
                                <div class="col-start-1 col-span-full pl-8">
                                    <label for="condition_not_allow_pe"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">If yes,
                                        please explain and send physician's statement.</label>
                                    <textarea
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        name="condition_not_allow_pe" id="condition_not_allow_pe" cols="100" rows="5">{{ old('condition_not_allow_pe') }}</textarea>
                                </div>
                                <div class="md:col-span-4">
                                    7. Visual Difficulties?
                                </div>
                                <div class="pl-8">
                                    {{-- <label for="visual_dificulties"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">If yes?</label> --}}
                                    <div class="flex pt-4">
                                        <div class="flex items-center me-4">
                                            <input id="none" type="radio" value=""
                                                {{ old('visual_dificulties') == '' ? 'checked' : '' }}
                                                name="visual_dificulties" checked
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="none"
                                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">None</label>
                                        </div>
                                        <div class="flex items-center me-4">
                                            <input id="contact-lenses" type="radio" value="Contact Lenses"
                                                {{ old('visual_dificulties') == 'Contact Lenses' ? 'checked' : '' }}
                                                name="visual_dificulties"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="contact-lenses"
                                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Contact
                                                Lenses</label>
                                        </div>
                                        <div class="flex items-center me-4">
                                            <input id="glasses" type="radio" value="Glasses"
                                                {{ old('visual_dificulties') == 'Glasses' ? 'checked' : '' }}
                                                name="visual_dificulties"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="glasses"
                                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Glasses</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="md:col-span-4">
                                    8. Any previous
                                    difficulties with Hearing, Speech, Language Development?
                                </div>
                                <div class="col-start-1 col-span-full pl-8">
                                    <label for="hearing_speech_difficulties"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">If yes,
                                        please explain and send physician's statement.</label>
                                    <textarea
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        name="hearing_speech_difficulties" id="hearing_speech_difficulties" cols="100" rows="5">{{ old('hearing_speech_difficulties') }}</textarea>
                                </div>
                                <div class="md:col-span-4">
                                    9. Has your child
                                    had medical conditions? (Seizures, TB, Eczema, Asthma, Emotional Trauma, Heart
                                    Condition, Frequent Nosebleeds, etc.)?
                                </div>
                                <div class="col-start-1 col-span-full pl-8">
                                    <label for="medical_conditions"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">If yes,
                                        please explain and send physician's statement.</label>
                                    <textarea
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        name="medical_conditions" id="medical_conditions" cols="100" rows="5">{{ old('medical_conditions') }}</textarea>
                                </div>
                                <div class="md:col-span-4">
                                    10. Other
                                    medical/health information you may wish to include that may help us understand your
                                    child' s health needs:
                                </div>
                                <div class="col-start-1 col-span-full pl-8">
                                    {{-- <label for="other_medical_conditions"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Other
                                        medical/health information:</label> --}}
                                    <textarea
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        name="other_medical_conditions" id="other_medical_conditions" cols="100" rows="5">{{ old('other_medical_conditions') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-full">
                    Save
                </button>
            </div>

        </form>
    </section>
</x-layouts.guest>
