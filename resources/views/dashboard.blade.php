<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}

                    <x-button variant="primary" class="mt-4">
                        Primary Button
                    </x-button>

                    <x-button variant="secondary" class="mt-4">
                        Secondary Button
                    </x-button>

                    <x-button variant="success" class="mt-4">
                        Success Button
                    </x-button>

                    <x-button variant="danger" class="mt-4">
                        Danger Button
                    </x-button>

                    <x-button variant="warning" class="mt-4">
                        Warning Button
                    </x-button>

                    <x-button variant="info" class="mt-4">
                        Info Button
                    </x-button>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
