<div class="w-full overflow-hidden">
    <div class="w-full overflow-x-auto">
        <table id="mytable" style="width:100%" class="w-full whitespace-no-wrap border">
            <thead>
                <tr
                    class="text-xs tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-blue-100 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">Date</th>
                    <th class="px-4 py-3">Details</th>
                    <th class="px-4 py-3">Type</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                @forelse ($student->clinicReports as $record)
                    <tr class="text-gray-700 dark:text-gray-400 divide-x">
                        <td class="px-4 py-3">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-4 py-3">
                            {{ \Carbon\Carbon::parse($record->report_date)->format('F d, Y | h:i A') }}
                        </td>
                        <td class="px-4 py-3">
                            {{ $record->report_details }}
                        </td>
                        <td class="px-4 py-3">
                            {{ Str::ucfirst($record->type) }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">
                            <div class="flex flex-col items-center">
                                📦
                                <p class="text-gray-500 font-medium mt-2">No Data Available</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
