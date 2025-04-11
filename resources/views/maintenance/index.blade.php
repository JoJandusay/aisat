<x-layouts.app>
    <nav class="flex mb-4" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{ route('maintenance.index') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Maintenance
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
                        List</p>
                </div>
            </li>
        </ol>
    </nav>

    <div class="sm:flex">
        <div class="items-center hidden mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0 dark:divide-gray-700">
            <h3 class="mb-4 text-2xl font-bold leading-none tracking-tight text-gray-600 md:text-2xl dark:text-white">
                Maintenance</h3>
        </div>
        <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
            {{-- <a href="{{ route('students.create') }}"
                class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center bg-white text-gray-600 border border-blue-300 rounded-lg hover:bg-blue-100 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-blue-800 dark:text-blue-400 dark:border-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-700">
                Add Student
            </a> --}}
        </div>
    </div>
    <div>
        <div class="w-full overflow-x-auto">
            <table id="mytable" style="width:100%" class="w-full whitespace-no-wrap border">
                <thead>
                    <tr
                        class="text-xs tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-blue-100 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3" width="1%">#</th>
                        <th class="px-4 py-3">Title</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3" width="20%">actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                    @forelse ($maintenances as $maintenance)
                        <tr class="text-gray-700 dark:text-gray-400 divide-x">
                            <td class="px-4 py-3">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-4 py-3">
                                {{ ucfirst($maintenance->title) }}
                            </td>
                            <td class="px-4 py-3">
                                @if ($maintenance->is_active)
                                    <span
                                        class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">Active</span>
                                @else
                                    <span
                                        class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-gray-700 dark:text-gray-300">Inactive</span>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-2 text-sm">
                                    <form class="hidden" id="maintenance-{{ $maintenance->id }}"
                                        action="{{ route('maintenance.update', $maintenance) }}" method="post">
                                        @csrf

                                        <input type="hidden" name="is_active"
                                            value="{{ $maintenance->is_active ? 0 : 1 }}">

                                        @method('PATCH')
                                    </form>
                                    <button form="maintenance-{{ $maintenance->id }}"
                                        class="inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-center text-gray-900 bg-yellow-300 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700"
                                        onclick="return confirm('Set this active?')">
                                        @if ($maintenance->is_active)
                                            Deactivate
                                        @else
                                            Activate
                                        @endif
                                    </button>
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
        </div>
    </div>
</x-layouts.app>
