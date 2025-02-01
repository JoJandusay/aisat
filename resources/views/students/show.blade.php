<x-layouts.guest>
    <div class="p-4">
        <div class="sm:flex pb-2">
            <div class="items-center mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0 dark:divide-gray-700">
                <h3 class="text-2xl font-bold leading-none tracking-tight text-gray-600 md:text-2xl dark:text-white">
                    Student Information</h3>
            </div>
        </div>
        <div class="w-full">
            <div class="w-full">
                <ul class="list-group space-y-4">
                    <li class="list-group-item p-6 border-b-0 border rounded-t-lg shadow-sm bg-white">
                        <!-- Student Information -->
                        <div class="w-full">
                            <table class="w-full text-sm text-gray-800">
                                <!-- Student Name and Section -->
                                <tr class="font-bold text-lg text-gray-900">
                                    <td>{{ $student->lastname }}, {{ $student->firstname }} {{ $student->middlename }}.
                                    </td>
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
                                        {{ \Carbon\Carbon::parse($student->first_vaccine_date)->format('F d, Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2 text-gray-600">1st Vaccine:
                                        {{ $student->first_vaccine_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2 text-gray-600">Second Dose Date:
                                        {{ \Carbon\Carbon::parse($student->second_vaccine_date)->format('F d, Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2 text-gray-600">2nd Vaccine:
                                        {{ $student->second_vaccine_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2 text-gray-600">Booster Date:
                                        {{ \Carbon\Carbon::parse($student->booster_date)->format('F d, Y') }}</td>
                                </tr>
                                <tr>
                                    <td class="py-2 text-gray-600">Booster: {{ $student->booster_name }}
                                    </td>
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
                                    <td class="py-2 text-gray-600">Ongoing medical, surgical, or psychological
                                        treatment?
                                    </td>
                                    <td class="text-right text-gray-600">{{ $student->ongoing_treatment ?? 'None' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2 text-gray-600">Condition preventing participation in PE or Sports?
                                    </td>
                                    <td class="text-right text-gray-600">
                                        {{ $student->condition_not_allow_pe ?? 'None' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2 text-gray-600">Visual Difficulties?</td>
                                    <td class="text-right text-gray-600">{{ $student->visual_dificulties ?? 'None' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2 text-gray-600">Hearing, Speech, or Language Development Issues?</td>
                                    <td class="text-right text-gray-600">
                                        {{ $student->hearing_speech_difficulties ?? 'None' }}</td>
                                </tr>
                                <tr>
                                    <td class="py-2 text-gray-600">Medical Conditions (e.g., Seizures, TB, Asthma, etc.)
                                    </td>
                                    <td class="text-right text-gray-600">{{ $student->medical_conditions ?? 'None' }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <section class="bg-white dark:bg-gray-900 border border-t-0">
            <div class="py-4 px-4 max-w-2xl lg:py-16">
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
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Report
                                Details</label>
                            <textarea id="report_details" name="report_details" rows="8"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type something here..."></textarea>
                            @error('report_details')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                        Save
                    </button>
                </form>
            </div>
        </section>
    </div>
</x-layouts.guest>
