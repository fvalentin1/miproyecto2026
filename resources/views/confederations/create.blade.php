<x-app-layout>
    <x-slot name="title">
        {{ __('Confederaciones - Crear - Laravel') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Confederaciones - Crear') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h2><strong>Ingrese los datos de la confederación a registrar</strong></h2>

            @if ($errors->any())
                <div>
                    <h2>Errores</h2>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('confederations.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Name -->
                <div class="mt-4">
                    <x-input-label for="name" :value="__('Nombre')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ old('name') }}" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Acronym -->
                <div class="mt-4">
                    <x-input-label for="acronym" :value="__('Sigla')" />
                    <x-text-input id="acronym" class="block mt-1 w-full" type="text" name="acronym" value="{{ old('acronym') }}" maxlength="10" />
                    <x-input-error :messages="$errors->get('acronym')" class="mt-2" />
                </div>

                <!-- Continent -->
                <div class="mt-4">
                    <x-input-label for="continent" :value="__('Continente')" />
                    <x-text-input id="continent" class="block mt-1 w-full" type="text" name="continent" value="{{ old('continent') }}" />
                    <x-input-error :messages="$errors->get('continent')" class="mt-2" />
                </div>

                <!-- Logo -->
                <div class="mt-4">
                    <x-input-label for="logo" :value="__('Logo')" />
                    <input id="logo" type="file" name="logo" accept="image/png,image/jpeg,image/webp" class="block mt-1 w-full" />
                    <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                </div>

                <x-button variant="primary" type="submit" class="mt-4">
                    Crear Confederación
                </x-button>
            </form>

        </div>
    </div>
</x-app-layout>
