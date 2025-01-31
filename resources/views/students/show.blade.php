<x-layouts.app>
    <nav class="flex mb-4" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{ route('students.index') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Students
                </a>
            </li>
            <li>

                <div class="flex items-center">
                    <svg class="w-3 h-3 text-gray-400 mx-1 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <p class="ms-1 text-sm font-medium text-gray-700 md:ms-2 dark:text-gray-400">
                        {{ $student->student_code }}</p>
                </div>
            </li>
        </ol>
    </nav>

    <div class="sm:flex">
        <div class="items-center hidden mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0 dark:divide-gray-700">
            <h3 class="text-2xl font-bold leading-none tracking-tight text-gray-600 md:text-2xl dark:text-white">
                Student Information</h3>
        </div>
    </div>
    {{-- <div class="flex flex-row-reverse gap-x-2 mb-2">
        <button type="submit" id="clinicButton" data-modal-target="clinic" data-modal-toggle="clinic"
            class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">Clinic</button>

        <button type="submit" id="emergencyModalButton" data-modal-target="emergencyModal"
            data-modal-toggle="emergencyModal"
            class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Emergency</button>
    </div> --}}
    <div class="w-full">
        <div class="w-full">
            <ul class="list-group space-y-4">
                <li class="list-group-item p-6 border-b-0 border rounded-t-lg shadow-sm bg-white">
                    <!-- Student Information -->
                    <div class="w-full">
                        <table class="w-full text-sm text-gray-800">
                            <!-- Student Name and Section -->
                            <tr class="font-bold text-lg text-gray-900">
                                <td>{{ $student->lastname }}, {{ $student->firstname }} {{ $student->middlename }}.</td>
                                <td class="text-right">{{ $student->level }} {{ $student->section }}</td>
                            </tr>
                            <!-- Address -->
                            <tr>
                                <td class="py-2 text-gray-600">{{ $student->address }}</td>
                            </tr>
                            <!-- Date of Birth -->
                            <tr>
                                <td class="py-2 text-gray-600">Date of Birth:
                                    {{ \Carbon\Carbon::parse($student->dob)->format('F d, Y') }}</td>
                            </tr>
                            <!-- Contact Number -->
                            <tr>
                                <td class="py-2 text-gray-600">{{ $student->mobile_number }}</td>
                            </tr>

                            <!-- Parent's Information -->
                            <tr class="font-bold text-lg text-gray-900 mt-4">
                                <td>Parent's Information</td>
                            </tr>
                            <tr>
                                <td class="py-2 text-gray-600">{{ $student->father_lastname }},
                                    {{ $student->father_firstname }} {{ $student->father_middlename }}.</td>
                                <td class="text-right text-gray-600">{{ $student->father_mobile_number }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 text-gray-600">{{ $student->mother_lastname }},
                                    {{ $student->mother_firstname }} {{ $student->mother_middlename }}.</td>
                                <td class="text-right text-gray-600">{{ $student->mother_mobile_number }}</td>
                            </tr>

                            <!-- Immunization History -->
                            <tr class="font-bold text-lg text-gray-900 mt-4">
                                <td>Immunization History</td>
                            </tr>
                            <tr>
                                <td class="py-2 text-gray-600">Covid-19 Vaccine</td>
                            </tr>
                            <tr>
                                <td class="py-2 text-gray-600">First Dose Date:
                                    {{ \Carbon\Carbon::parse($student->first_vaccine_date)->format('F d, Y') }}</td>
                                <td class="text-right text-gray-600">Vaccine Name: {{ $student->first_vaccine_name }}
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 text-gray-600">Second Dose Date:
                                    {{ \Carbon\Carbon::parse($student->second_vaccine_date)->format('F d, Y') }}</td>
                                <td class="text-right text-gray-600">Vaccine Name: {{ $student->second_vaccine_name }}
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 text-gray-600">Booster Date:
                                    {{ \Carbon\Carbon::parse($student->booster_date)->format('F d, Y') }}</td>
                                <td class="text-right text-gray-600">Vaccine Name: {{ $student->booster_name }}</td>
                            </tr>

                            <!-- Health History -->
                            <tr class="font-bold text-lg text-gray-900 mt-4">
                                <td>Health History</td>
                            </tr>
                            <tr>
                                <td class="py-2 text-gray-600">Has your child had Covid-19?</td>
                                <td class="text-right text-gray-600">
                                    {{ is_null($student->had_covid) ? 'No' : \Carbon\Carbon::parse($student->had_covid)->format('F d, Y') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 text-gray-600">Allergies:</td>
                                <td class="text-right text-gray-600">{{ $student->allergies }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 text-gray-600">Medication:</td>
                                <td class="text-right text-gray-600">{{ $student->used_to_treat }}
                                    {{ $student->medication_name }} {{ $student->dose_time }}</td>
                            </tr>

                            <!-- Medical Conditions -->
                            <tr class="font-bold text-lg text-gray-900 mt-4">
                                <td>Medical Conditions</td>
                            </tr>
                            <tr>
                                <td class="py-2 text-gray-600">Ongoing medical, surgical, or psychological treatment?
                                </td>
                                <td class="text-right text-gray-600">{{ $student->ongoing_treatment ?? 'None' }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 text-gray-600">Condition preventing participation in PE or Sports?</td>
                                <td class="text-right text-gray-600">{{ $student->condition_not_allow_pe ?? 'None' }}
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 text-gray-600">Visual Difficulties?</td>
                                <td class="text-right text-gray-600">{{ $student->visual_dificulties ?? 'None' }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 text-gray-600">Hearing, Speech, or Language Development Issues?</td>
                                <td class="text-right text-gray-600">
                                    {{ $student->hearing_speech_difficulties ?? 'None' }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 text-gray-600">Medical Conditions (e.g., Seizures, TB, Asthma, etc.)
                                </td>
                                <td class="text-right text-gray-600">{{ $student->medical_conditions ?? 'None' }}</td>
                            </tr>
                        </table>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <section class="bg-white dark:bg-gray-900 border border-t-0">
        <div class="py-4 px-4 mx-auto max-w-2xl lg:py-16">
            <form action="{{ route('clinical-reports.store') }}" method="post">
                @csrf
                <input type="hidden" name="student_id" value="{{ $student->id }}">
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div>
                        <label for="type"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                        <div class="flex pt-4">
                            <div class="flex items-center me-4">
                                <input id="clinic" type="radio" value="clinic" name="type"
                                    {{ old('type', 'clinic') == 'clinic' ? 'checked' : '' }}
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="clinic"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Clinic</label>
                            </div>
                            <div class="flex items-center me-4">
                                <input id="emergency" type="radio" value="emergency" name="type"
                                    {{ old('type') == 'emergency' ? 'checked' : '' }}
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="emergency"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Emergency</label>
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="report_details"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Report Details</label>
                        <textarea id="report_details" name="report_details" rows="8"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Type something here..."></textarea>
                    </div>
                </div>
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Save
                </button>
            </form>
        </div>
    </section>

    {{-- <!-- Clinic modal -->
    <div id="clinic" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-20 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <div
                    class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Note
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="clinic">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="{{ route('clinical-reports.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="type" value="clinic">
                    <input type="hidden" name="student_id" value="{{ $student->id }}">
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div class="sm:col-span-2">
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <textarea id="description" rows="4" name="report_details"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Write here..."></textarea>
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Main modal -->
    <div id="emergencyModal" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-20 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <div
                    class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Note
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="emergencyModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="#">
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div class="sm:col-span-2">
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <textarea id="description" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Write here..."></textarea>
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div> --}}

</x-layouts.app>
