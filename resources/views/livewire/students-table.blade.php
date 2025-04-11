<div class="w-full overflow-hidden">
    <div class="flex flex-col lg:justify-between lg:flex-row mb-2">
        <div class="w-full lg:w-1/2">
            <form>
                <input type="text" id="search" wire:model.live="search"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search something." />
            </form>
        </div>
        <div class="flex gap-x-2">
            <select id="level" wire:model.live="selected_level"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">Choose level</option>
                @foreach ($levels as $level)
                    <option value="{{ $level }}" @selected(old('level') == $level)>{{ $level }}</option>
                @endforeach
            </select>
            <select id="section" wire:model.live="selected_section"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">Choose section</option>
                @foreach ($sections as $section)
                    <option value="{{ $section }}" @selected(old('section') == $section)>{{ $section }}</option>
                @endforeach
            </select>
        </div>
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
                    <th class="px-4 py-3" width="20%">actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                @forelse ($students as $student)
                    <tr class="text-gray-700 dark:text-gray-400 divide-x" wire:key="{{ $student->id }}">
                        <td class="px-4 py-3">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-4 py-3">
                            {{ $student->student_code }}
                        </td>
                        <td class="px-4 py-3">
                            {{ $student->lastname }},
                            {{ $student->firstname }}
                            {{ $student->middlename ? ' ' . $student->middlename : '' }}
                        </td>
                        <td class="px-4 py-3">
                            {{ $student->level }}
                        </td>
                        <td class="px-4 py-3">
                            {{ $student->section }}
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-2 text-sm">
                                <a href="{{ route('students.edit', $student) }}"
                                    class="inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-center text-gray-900 bg-green-200 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                                    Edit
                                </a>
                                <form class="hidden" id="archive-{{ $student->id }}"
                                    action="{{ route('students.archive', $student) }}" method="post">
                                    @csrf
                                    @method('PATCH')
                                </form>
                                <button form="archive-{{ $student->id }}"
                                    class="inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-center text-gray-900 bg-yellow-300 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700"
                                    onclick="return confirm('Move to archive this student?')">
                                    Archive
                                </button>
                                <a href="{{ route('studentQR.show', $student) }}"
                                    class="inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-center text-gray-900 bg-blue-200 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                                    Generate
                                </a>
                            </div>
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
