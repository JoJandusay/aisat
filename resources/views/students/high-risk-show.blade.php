<x-layouts.app>
    <nav class="flex mb-4" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{ route('high-risk') }}"
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
                        High Risk</p>
                </div>
            </li>
        </ol>
    </nav>

    <div class="sm:flex">
        <div class="items-center hidden mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0 dark:divide-gray-700">
            <h3 class="mb-4 text-2xl font-bold leading-none tracking-tight text-gray-600 md:text-2xl dark:text-white">
                {{ $student->firstname }} {{ $student->lastname }}</h3>
        </div>
    </div>

    <div class="w-full overflow-x-auto">
        <table id="mytable" style="width:100%" class="w-full whitespace-no-wrap border">
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                <tr class="text-gray-700 dark:text-gray-400 divide-x">
                    <td class="px-4 py-3 font-bold">
                        Health Condition
                    </td>
                    <td class="px-4 py-3">
                        {{ $student->used_to_treat }}
                    </td>
                </tr>
                <tr class="text-gray-700 dark:text-gray-400 divide-x">
                    <td class="px-4 py-3 font-bold">
                        Allergies
                    </td>
                    <td class="px-4 py-3">
                        {{ $student->allergies }}
                    </td>
                </tr>
                <tr class="text-gray-700 dark:text-gray-400 divide-x">
                    <td class="px-4 py-3 font-bold">
                        Medical, Surgical, Psychological Condition
                    </td>
                    <td class="px-4 py-3">
                        {{ $student->ongoing_treatment }}
                    </td>
                </tr>
                <tr class="text-gray-700 dark:text-gray-400 divide-x">
                    <td class="px-4 py-3 font-bold">
                        Health condition not Allow to participate PE
                    </td>
                    <td class="px-4 py-3">
                        {{ $student->condition_not_allow_pe }}
                    </td>
                </tr>
                <tr class="text-gray-700 dark:text-gray-400 divide-x">
                    <td class="px-4 py-3 font-bold">
                        Visual Difficulties
                    </td>
                    <td class="px-4 py-3">
                        {{ $student->visual_dificulties }}
                    </td>
                </tr>
                <tr class="text-gray-700 dark:text-gray-400 divide-x">
                    <td class="px-4 py-3 font-bold">
                        Hearing and Speech Difficulties
                    </td>
                    <td class="px-4 py-3">
                        {{ $student->hearing_speech_difficulties }}
                    </td>
                </tr>
                <tr class="text-gray-700 dark:text-gray-400 divide-x">
                    <td class="px-4 py-3 font-bold">
                        Medical Conditions
                    </td>
                    <td class="px-4 py-3">
                        {{ $student->medical_conditions }}
                    </td>
                </tr>
                <tr class="text-gray-700 dark:text-gray-400 divide-x">
                    <td class="px-4 py-3 font-bold">
                        Other Medical Conditions
                    </td>
                    <td class="px-4 py-3">
                        {{ $student->other_medical_conditions }}
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="flex flex-col gap-2 sm:flex-row mt-4">
            <a href="{{ route('high-risk') }}"
                class="text-white block bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-3 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Go
                back</a>
        </div>
    </div>

</x-layouts.app>
