<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl leading-tight font-semibold text-gray-800 dark:text-gray-200">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
            <div class="bg-white p-4 shadow-sm sm:rounded-lg sm:p-8 dark:bg-gray-800">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')

                    @if (auth()->user()?->google_id)
                        <div
                            class="mt-6 rounded-md border-l-4 border-blue-500 bg-blue-100 p-4 text-blue-700 dark:border-blue-400 dark:bg-blue-900 dark:text-blue-200"
                        >
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg
                                        class="h-5 w-5 text-blue-400 dark:text-blue-300"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                        aria-hidden="true"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium">You are signed in using your Google account.</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            @if (auth()->user()?->hasPassword())
                <div class="bg-white p-4 shadow-sm sm:rounded-lg sm:p-8 dark:bg-gray-800">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            @endif

            <div class="bg-white p-4 shadow-sm sm:rounded-lg sm:p-8 dark:bg-gray-800">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
