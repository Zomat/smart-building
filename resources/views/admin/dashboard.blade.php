<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="flex flex-row justify-between p-6 text-gray-900 items-between dark:text-gray-100">
                    <span>
                        {{ __("Users list") }}
                    </span>
                    <x-nav-link :href="route('admin.user.create')" wire:navigate>
                        {{ __('Add user') }}
                    </x-nav-link>
                </div>
                @livewire('users-table')
            </div>
        </div>
    </div>
</x-app-layout>
