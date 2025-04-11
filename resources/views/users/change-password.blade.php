<x-layouts.app>
    <script src="//unpkg.com/alpinejs" defer></script>
    <nav class="flex mb-4" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{ route('change-pass.create') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Change Password
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
                        New</p>
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
    <form action="{{ route('change-pass.update') }}" method="post">
        @csrf

        <div class="grid gap-6 mb-6 md:grid-cols-4">
            {{-- Current Password --}}
            <div class="col-span-full" x-data="{ show: false }">
                <label for="current_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Current Password
                </label>
                <div class="relative">
                    <input :type="show ? 'text' : 'password'" id="current_password" name="current_password"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pr-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                        placeholder="Enter current password" />
                    <button type="button" @click="show = !show"
                        class="absolute inset-y-0 right-0 px-3 text-sm text-gray-500 focus:outline-none">
                        <span x-text="show ? 'Hide' : 'Show'"></span>
                    </button>
                </div>
                @error('current_password')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- New Password --}}
            <div class="col-span-full" x-data="{ show: false }">
                <label for="new_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    New Password
                </label>
                <div class="relative">
                    <input :type="show ? 'text' : 'password'" id="new_password" name="new_password"
                        value="{{ old('new_password') }}"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pr-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                        placeholder="New password" />
                    <button type="button" @click="show = !show"
                        class="absolute inset-y-0 right-0 px-3 text-sm text-gray-500 focus:outline-none">
                        <span x-text="show ? 'Hide' : 'Show'"></span>
                    </button>
                </div>
                @error('new_password')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Confirm New Password --}}
            <div class="col-span-full" x-data="{ show: false }">
                <label for="new_password_confirmation"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Reenter Password
                </label>
                <div class="relative">
                    <input :type="show ? 'text' : 'password'" id="new_password_confirmation"
                        name="new_password_confirmation" value="{{ old('new_password_confirmation') }}"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pr-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                        placeholder="Reenter new password" />
                    <button type="button" @click="show = !show"
                        class="absolute inset-y-0 right-0 px-3 text-sm text-gray-500 focus:outline-none">
                        <span x-text="show ? 'Hide' : 'Show'"></span>
                    </button>
                </div>
                @error('new_password_confirmation')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="flex flex-col gap-2 sm:flex-row">
            <button type="submit"
                class="text-white block bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
            <a href="{{ route('users.index') }}"
                class="text-white block bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-3 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Go
                back</a>
        </div>
    </form>

</x-layouts.app>
