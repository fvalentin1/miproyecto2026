<x-app-layout>
    <x-slot name="title">
        {{ __('Detalles de la confederación: ') }} {{ $confederation->name }} {{ __(' - Laravel') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles de la confederación: ') }} {{ $confederation->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h2><strong>Información de la confederación:</strong></h2>
                    <br>
                    @if ($confederation->logo)
                        <img src="{{ asset('storage/' . $confederation->logo) }}" alt="Logo {{ $confederation->acronym }}" class="h-24 mb-4">
                    @endif
                    <p><strong>Nombre:</strong> {{ $confederation->name }}</p>
                    <p><strong>Sigla:</strong> {{ $confederation->acronym }}</p>
                    <p><strong>Continente:</strong> {{ $confederation->continent }}</p>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
