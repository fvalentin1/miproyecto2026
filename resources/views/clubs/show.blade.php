<x-app-layout>
    <x-slot name="title">
        {{ __('Detalles del club: ') }} {{ $club->name }} {{ __(' - Laravel')   }}
    </x-slot>


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles del club: ') }} {{ $club->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h2><strong>Información del club:</strong></h2>
                    <br>
                    <p><strong>Titulos:</strong> {{ $club->titles }}</p>
                    <p><strong>Ciudad:</strong> {{ $club->city }}</p>
                    <p><strong>Pais:</strong> {{ $club->country }}</p>
                    <p><strong>Colores:</strong> {{ $club->colors }}</p>
                    <p><strong>Estadio:</strong> {{ $club->stadium }}</p>
                    <p><strong>Fundación:</strong> {{ $club->founded_year }}</p>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>




