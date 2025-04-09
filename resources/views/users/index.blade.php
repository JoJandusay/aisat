<x-layouts.app>
    <nav class="flex mb-4" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{ route('users.index') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Admin
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

    @if (session('success'))
        <div id="alert-1"
            class="flex items-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
            role="alert">
            <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
                {{ session('success') }}
            </div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-1" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif

    <div class="sm:flex">
        <div class="items-center hidden mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0 dark:divide-gray-700">
            <h3 class="mb-4 text-2xl font-bold leading-none tracking-tight text-gray-600 md:text-2xl dark:text-white">
                List of Admin</h3>
        </div>
        @if (Auth::user()->is_superadmin)
            <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                <a href="{{ route('users.create') }}"
                    class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center bg-white text-gray-600 border border-blue-300 rounded-lg hover:bg-blue-100 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-blue-800 dark:text-blue-400 dark:border-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-700">
                    Add Admin
                </a>
            </div>
        @endif
    </div>
    <div>
        <div class="w-full overflow-hidden">
            <div class="w-full overflow-x-auto">
                <table id="mytable" style="width:100%" class="w-full whitespace-no-wrap border">
                    <thead>
                        <tr
                            class="text-xs tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-blue-100 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">#</th>
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Email</th>
                            <th class="px-4 py-3" width="20%">actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                        @forelse ($admins as $admin)
                            <tr class="text-gray-700 dark:text-gray-400 divide-x">
                                <td class="px-4 py-3">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-4 py-3">
                                    {{ $admin->name }}
                                </td>
                                <td class="px-4 py-3">
                                    {{ $admin->email }}
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-2 text-sm">
                                        <a href="{{ route('users.edit', $admin) }}"
                                            class="inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-center text-gray-900 bg-green-200 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                                            Edit
                                        </a>
                                        <form class="hidden" id="password-reset-{{ $admin->id }}"
                                            action="{{ route('reset-password', $admin) }}" method="post">
                                            @csrf
                                            @method('patch')
                                        </form>
                                        <button form="password-reset-{{ $admin->id }}"
                                            class="inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-center text-gray-900 bg-yellow-300 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700"
                                            onclick="return confirm('Reset password of this user?')">
                                            Reset Password
                                        </button>
                                        <form class="hidden" id="delete-{{ $admin->id }}"
                                            action="{{ route('users.destroy', $admin) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button form="delete-{{ $admin->id }}"
                                            class="inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-center text-gray-900 bg-red-300 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700"
                                            onclick="return confirm('Delete this admin from the system?')">
                                            Delete
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
                <div class="mt-2">
                    {{ $admins->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
