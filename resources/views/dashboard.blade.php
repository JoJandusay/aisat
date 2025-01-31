<x-layouts.app>
    <nav class="flex mb-4" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Home
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
                        Dashboard</p>
                </div>
            </li>
        </ol>
    </nav>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div
            class="bg-green-400 flex items-center justify-between p-6 border-2 rounded-lg dark:border-gray-600 h-32 shadow-lg hover:bg-green-500 transition-colors">
            <span class="text-lg text-gray-700 dark:text-white font-semibold">Total Students</span>
            <span class="text-4xl font-semibold text-gray-900 dark:text-white">{{ $students }}</span>
        </div>

        <div
            class="bg-blue-400 flex items-center justify-between p-6 border-2 rounded-lg dark:border-gray-600 h-32 shadow-lg hover:bg-blue-500 transition-colors">
            <span class="text-lg text-gray-700 dark:text-white font-semibold">Archived</span>
            <span class="text-4xl font-semibold text-gray-900 dark:text-white">{{ $archived }}</span>
        </div>

        <div
            class="bg-yellow-400 flex items-center justify-between p-6 border-2 rounded-lg dark:border-gray-600 h-32 shadow-lg hover:bg-yellow-500 transition-colors">
            <span class="text-lg text-gray-700 dark:text-white font-semibold">High Risk</span>
            <span class="text-4xl font-semibold text-gray-900 dark:text-white">{{ $high_risk }}</span>
        </div>

        <div
            class="bg-red-400 flex items-center justify-between p-6 border-2 rounded-lg dark:border-gray-600 h-32 shadow-lg hover:bg-red-500 transition-colors">
            <span class="text-lg text-gray-700 dark:text-white font-semibold">Reports</span>
            <span class="text-4xl font-semibold text-gray-900 dark:text-white">{{ $reports }}</span>
        </div>
    </div>



    <div class="w-full overflow-hidden">
        <div class="mb-2 mt-8">
            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-300">Emergency Reports <span
                    class="text-xs text-gray-500">(Today)</span></h2>
        </div>
        <div class="w-full overflow-x-auto">
            <table id="mytable" style="width:100%" class="w-full whitespace-no-wrap border">
                <thead>
                    <tr
                        class="text-xs tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-blue-100 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Report Issue</th>
                        <th class="px-4 py-3">Time</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                    @forelse ($emergency_students as $emergency_student)
                        <tr class="text-gray-700 dark:text-gray-400 divide-x">
                            <td class="px-4 py-3">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $emergency_student->student->firstname }} {{ $emergency_student->student->lastname }}
                                <span class="text-xs">
                                    ({{ $emergency_student->student->level }}
                                    {{ $emergency_student->student->section }})
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                {{ $emergency_student->report_details }}
                            </td>
                            <td class="px-4 py-3">
                                {{ \Carbon\Carbon::parse($emergency_student->report_date)->diffForHumans() }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                <div class="flex flex-col items-center">
                                    📦
                                    <p class="text-gray-500 font-medium mt-2">No Report Today</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="w-full overflow-hidden">
        <div class="mb-2 mt-8">
            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-300">Clinic Reports <span
                    class="text-xs text-gray-500">(Today)</span></h2>
        </div>
        <div class="w-full overflow-x-auto">
            <table id="mytable" style="width:100%" class="w-full whitespace-no-wrap border">
                <thead>
                    <tr
                        class="text-xs tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-blue-100 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Report Issue</th>
                        <th class="px-4 py-3">Time</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                    @forelse ($clinic_students as $clinic_student)
                        <tr class="text-gray-700 dark:text-gray-400 divide-x">
                            <td class="px-4 py-3">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $clinic_student->student->firstname }} {{ $clinic_student->student->lastname }}
                                <span class="text-xs">
                                    ({{ $clinic_student->student->level }} {{ $clinic_student->student->section }})
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                {{ $clinic_student->report_details }}
                            </td>
                            <td class="px-4 py-3">
                                {{ \Carbon\Carbon::parse($clinic_student->report_date)->diffForHumans() }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                <div class="flex flex-col items-center">
                                    📦
                                    <p class="text-gray-500 font-medium mt-2">No Report Today</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-layouts.app>
