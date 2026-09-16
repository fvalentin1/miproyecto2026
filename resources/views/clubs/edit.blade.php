<x-app-layout>
    <x-slot name="title">
        {{ __('Editar club: ') }} {{ $club->name }} {{ __(' - Laravel')   }}
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar club: ') }} {{ $club->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2><strong>Ingrese los datos del club a editar</strong></h2>

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

            <form action="{{ route('clubs.update', $club) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div class="mt-4">
                    <x-input-label for="name" :value="__('Nombre')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ old('name', $club->name) }}" placeholder="Nombre Equipo FC" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Titles -->
                <div class="mt-4">
                    <x-input-label for="titles" :value="__('Títulos')" />
                    <x-text-input id="titles" class="block mt-1 w-full" type="number" name="titles" value="{{ old('titles', $club->titles) }}" min="0" />
                    <x-input-error :messages="$errors->get('titles')" class="mt-2" />
                </div>

                <!-- City -->
                <div class="mt-4">
                    <x-input-label for="city" :value="__('Ciudad')" />
                    <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" value="{{ old('city', $club->city) }}" placeholder="" />
                    <x-input-error :messages="$errors->get('city')" class="mt-2" />
                </div>

                <!-- Country -->
                <div class="mt-4">
                    <x-input-label for="country" :value="__('País')" />
                    <x-text-input id="country" class="block mt-1 w-full" type="text" name="country" value="{{ old('country', $club->country) }}" />
                    <x-input-error :messages="$errors->get('country')" class="mt-2" />
                </div>

                <!-- Colors -->
                <div class="mt-4">
                    <x-input-label for="colors" :value="__('Colores')" />
                    <x-text-input id="colors" class="block mt-1 w-full" type="text" name="colors" value="{{ old('colors', $club->colors) }}" />
                    <x-input-error :messages="$errors->get('colors')" class="mt-2" />
                </div>

                <!-- Stadium -->
                <div class="mt-4">
                    <x-input-label for="stadium" :value="__('Estadio')" />
                    <x-text-input id="stadium" class="block mt-1 w-full" type="text" name="stadium" value="{{ old('stadium', $club->stadium) }}" />
                    <x-input-error :messages="$errors->get('stadium')" class="mt-2" />
                </div>

                <!-- Founded Year -->
                <div class="mt-4">
                    <x-input-label for="founded_year" :value="__('Fundación')" />
                    <x-text-input id="founded_year" class="block mt-1 w-full" type="number" name="founded_year" value="{{ old('founded_year', $club->founded_year) }}" min="1800" max="2026" />
                    <x-input-error :messages="$errors->get('founded_year')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-primary-button>
                        {{ __('Editar club') }}
                    </x-primary-button>
                </div>


            </form>

        </div>

    </div>

</x-app-layout>
