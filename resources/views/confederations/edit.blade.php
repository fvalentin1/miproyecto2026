<x-app-layout>
    <x-slot name="title">
        {{ __('Editar confederación: ') }} {{ $confederation->name }} {{ __(' - Laravel') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar confederación: ') }} {{ $confederation->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2><strong>Ingrese los datos de la confederación a editar</strong></h2>

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

            <form action="{{ route('confederations.update', $confederation) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div class="mt-4">
                    <x-input-label for="name" :value="__('Nombre')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ old('name', $confederation->name) }}" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Acronym -->
                <div class="mt-4">
                    <x-input-label for="acronym" :value="__('Sigla')" />
                    <x-text-input id="acronym" class="block mt-1 w-full" type="text" name="acronym" value="{{ old('acronym', $confederation->acronym) }}" maxlength="10" />
                    <x-input-error :messages="$errors->get('acronym')" class="mt-2" />
                </div>

                <!-- Continent -->
                <div class="mt-4">
                    <x-input-label for="continent" :value="__('Continente')" />
                    <x-text-input id="continent" class="block mt-1 w-full" type="text" name="continent" value="{{ old('continent', $confederation->continent) }}" />
                    <x-input-error :messages="$errors->get('continent')" class="mt-2" />
                </div>

                <!-- Logo -->
                <div class="mt-4">
                    <x-input-label for="logo" :value="__('Logo')" />
                    @if ($confederation->logo)
                        <img src="{{ asset('storage/' . $confederation->logo) }}" alt="Logo {{ $confederation->acronym }}" class="h-16 my-2">
                    @endif
                    <input id="logo" type="file" name="logo" accept="image/png,image/jpeg,image/webp" class="block mt-1 w-full" />
                    <p class="text-sm text-gray-500 mt-1">Deja vacío para conservar el logo actual.</p>
                    <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-primary-button>
                        {{ __('Editar confederación') }}
                    </x-primary-button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
