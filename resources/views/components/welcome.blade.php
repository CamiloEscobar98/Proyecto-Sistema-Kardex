<div
    class="p-6 bg-white border-b border-gray-200 lg:p-8 dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700">
    {{-- <x-application-logo class="block w-auto h-12" /> --}}

    <h1 class="mt-8 text-4xl font-medium text-gray-900 dark:text-white">
        @lang('pages.welcome.title')
    </h1>

    <p class="mt-6 leading-relaxed text-gray-500 dark:text-gray-400">
        @lang('pages.welcome.introduction')
    </p>
</div>

<div class="grid grid-cols-1 gap-6 p-6 bg-gray-200 bg-opacity-25 dark:bg-gray-800 md:grid-cols-2 lg:gap-8 lg:p-8">
    <div>
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                class="w-6 h-6 stroke-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
            </svg>
            <h2 class="ml-3 text-xl font-semibold text-gray-900 dark:text-white">
                <a href="https://laravel.com/docs">@lang('pages.welcome.requirements.title')</a>
            </h2>
        </div>


        <p class="mt-4 text-sm leading-relaxed text-gray-500 dark:text-gray-400">
            @lang('pages.welcome.requirements.text')
        </p>
    </div>

    <div>
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                class="w-6 h-6 stroke-gray-400">
                <path stroke-linecap="round"
                    d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
            </svg>
            <h2 class="ml-3 text-xl font-semibold text-gray-900 dark:text-white">
                <a href="https://laracasts.com">@lang('pages.welcome.rules.title')</a>
            </h2>
        </div>

        <p class="mt-4 text-sm leading-relaxed text-gray-500 dark:text-gray-400">
            @lang('pages.welcome.rules.text')
        </p>
    </div>
</div>
