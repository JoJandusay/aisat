<div>
    @if (!$verify_otp)
        <!-- Sign In Form -->
        <div class="mt-10 flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img class="mx-auto h-30 w-auto" src="{{ asset('assets/aisat.png') }}" alt="Your Company">
                <h2 class="mt-10 text-center text-2xl font-bold tracking-tight text-gray-900">
                    Sign in to your account
                </h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" wire:submit="authenticate">

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-900">Email address</label>
                        <div class="mt-2">
                            <input type="email" wire:model.live="email" placeholder="Enter email address"
                                class="@error('email') border-red-500 @enderror block w-full rounded-md px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-2 focus:outline-indigo-600">
                            @error('email')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Password with Show/Hide Toggle -->
                    <div x-data="{ show: false }">
                        <label for="password" class="block text-sm font-medium text-gray-900">Password</label>
                        <div class="mt-2 relative">
                            <!-- Password Input Field -->
                            <input :type="show ? 'text' : 'password'" wire:model.live="password"
                                placeholder="Enter your password"
                                class="@error('password') border-red-500 @enderror block w-full rounded-md px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-2 focus:outline-indigo-600">

                            <!-- Show/Hide Toggle Button -->
                            <button type="button" @click="show = !show"
                                class="absolute inset-y-0 right-3 flex items-center text-gray-500 focus:outline-none">
                                <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.975 9.975 0 012.112-3.592M3 3l18 18" />
                                </svg>
                            </button>
                        </div>

                        <!-- Error Messages -->
                        @error('password')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                        @if ($email_pass_error)
                            <p class="text-red-500 text-xs mt-2">{{ $email_pass_error }}</p>
                        @endif
                    </div>


                    <!-- Submit Button -->
                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline focus:outline-2 focus:outline-offset-2 focus:outline-indigo-600">
                            Sign in
                        </button>
                    </div>

                    <!-- Loading Message -->
                    <p wire:loading wire:target="authenticate" class="text-center text-indigo-600 text-sm mt-2">
                        Authenticating... Please wait.
                    </p>
                </form>
            </div>
        </div>
    @else
        <!-- OTP Verification -->
        <main class="relative min-h-screen flex flex-col justify-center overflow-hidden">
            <div class="w-full max-w-6xl mx-auto px-4 md:px-6 py-24">
                <div class="flex justify-center">
                    <div class="max-w-md mx-auto text-center bg-white px-4 sm:px-8 py-10 rounded-xl shadow">
                        <header class="mb-8">
                            <h1 class="text-2xl font-bold mb-1">Confirm OTP</h1>
                            <p class="text-sm text-slate-500">
                                Enter the 4-digit verification code that was sent to your email.
                            </p>
                        </header>

                        <form wire:submit="verifyOtp">
                            <input type="text" wire:model.live="otp"
                                class="w-56 h-14 text-center text-2xl font-extrabold text-slate-900 bg-slate-100 rounded border hover:border-slate-200 p-4 outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 tracking-widest"
                                pattern="\d*" maxlength="4" placeholder="•  •  •  •" />

                            <div class="max-w-[260px] mx-auto mt-4">
                                <button type="submit"
                                    class="w-full rounded-lg bg-indigo-500 px-3.5 py-2.5 text-sm font-medium text-white shadow hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-300 transition">
                                    Verify Account
                                </button>
                            </div>
                        </form>

                        @if ($otp_error)
                            <p class="text-red-500 text-xs mt-4">{{ $otp_error }}</p>
                        @endif

                        <div class="text-sm text-slate-500 mt-4">
                            Didn't receive code?
                            <a wire:click="resendOtp"
                                class="font-medium text-indigo-500 hover:text-indigo-600 cursor-pointer">
                                Resend
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    @endif
</div>
