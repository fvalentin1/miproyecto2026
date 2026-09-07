<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clubes de Futbol - Crear') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h2>Ingrese los datos del club a registrar</h2>

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

            <form action="{{ route('clubs.store') }}" method="POST">
                @csrf


                <label for="name" class="text-black">
                    <span class="text-sm font-semibold">Nombre:</span>

                    <input type="text" id="name" name="name" value="" placeholder="Nombre Equipo FC"
                        class="mt-0.5 mb-4 w-full border-2 border-black bg-white shadow-[4px_4px_0_0] shadow-black focus:ring-2 focus:ring-yellow-300 sm:text-sm" />
                </label>

                <br>

                <label for="titles" class="text-black">
                    <span class="text-sm font-semibold"> Títulos </span>

                    <input type="number" id="titles" name="titles" value="0" min="0"
                        class="mt-0.5 mb-4 w-full border-2 border-black bg-white shadow-[4px_4px_0_0] shadow-black focus:ring-2 focus:ring-yellow-300 sm:text-sm" />
                </label>

                <br>

                <label for="city" class="text-black">
                    <span class="text-sm font-semibold"> Ciudad </span>

                    <input type="text" id="city" name="city" value=""
                        class="mt-0.5 mb-4 w-full border-2 border-black bg-white shadow-[4px_4px_0_0] shadow-black focus:ring-2 focus:ring-yellow-300 sm:text-sm" />
                </label>

                <br>

                <label for="country" class="text-black">
                    <span class="text-sm font-semibold"> Pais </span>

                    <input type="text" id="country" name="country" value=""
                        class="mt-0.5 mb-4 w-full border-2 border-black bg-white shadow-[4px_4px_0_0] shadow-black focus:ring-2 focus:ring-yellow-300 sm:text-sm" />
                </label>

                <br>

                <label for="colors" class="text-black">
                    <span class="text-sm font-semibold"> Colores </span>

                    <input type="text" id="colors" name="colors" value=""
                        class="mt-0.5 mb-4 w-full border-2 border-black bg-white shadow-[4px_4px_0_0] shadow-black focus:ring-2 focus:ring-yellow-300 sm:text-sm" />
                </label>

                <br>

                <label for="stadium" class="text-black">
                    <span class="text-sm font-semibold"> Estadio </span>

                    <input type="text" id="stadium" name="stadium" value=""
                        class="mt-0.5 mb-4 w-full border-2 border-black bg-white shadow-[4px_4px_0_0] shadow-black focus:ring-2 focus:ring-yellow-300 sm:text-sm" />
                </label>

                <br>

                <label for="founded_year" class="text-black">
                    <span class="text-sm font-semibold"> Fundación </span>

                    <input type="number" id="founded_year" name="founded_year" value="2010" min="1800" max="2026"
                        class="mt-0.5 mb-4 w-full border-2 border-black bg-white shadow-[4px_4px_0_0] shadow-black focus:ring-2 focus:ring-yellow-300 sm:text-sm" />
                </label>

                <br>
                <x-button variant="primary" type="submit" class="mt-4">
                    Crear Club
                </x-button>
                {{-- <button type="submit">Crear club</button> --}}
            </form>



        </div>

    </div>

</x-app-layout>
