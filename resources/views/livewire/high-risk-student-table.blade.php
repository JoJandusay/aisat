<div class="w-full overflow-hidden">
    <div class="flex mb-2">
        <form class="w-full lg:w-1/2">
            <input type="text" id="search" wire:model.live="search"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Search something." />
        </form>
    </div>
    <div class="w-full overflow-x-auto">
        <table id="mytable" style="width:100%" class="w-full whitespace-no-wrap border">
            <thead>
                <tr
                    class="text-xs tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-blue-100 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Level</th>
                    <th class="px-4 py-3">Section</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                @forelse ($students as $student)
                    <tr class="text-gray-700 dark:text-gray-400 divide-x">
                        <td class="px-4 py-3">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-4 py-3">
                            {{ $student->student_code }}
                        </td>
                        <td class="px-4 py-3">
                            {{ $student->firstname }} {{ $student->lastname }}
                        </td>
                        <td class="px-4 py-3">
                            {{ $student->level }}
                        </td>
                        <td class="px-4 py-3">
                            {{ $student->section }}
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
        <div class="mt-2">
            {{ $students->links() }}
        </div>
    </div>
</div>
