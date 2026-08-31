<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clubes de Futbol') }}
        </h2>
    </x-slot>


    <p>
        <a href="{{ route('clubs.create') }}">
            <x-button variant="success">Crear un club</x-button>
        </a>
    </p>

    <hr>

    @if(session('success'))
        <p>
            {{ session('success') }}
        </p>
    @endif

    @if($clubs->count()>0)

        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Titulos</th>
                    <th>Ciudad</th>
                    <th>Pais</th>
                    <th>Colores</th>
                    <th>Estadio</th>
                    <th>Fundación</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($clubs as $club)
                <tr>
                    <td>{{ $club->id }}</td>
                    <td>{{ $club->name }}</td>
                    <td>{{ $club->titles }}</td>
                    <td>{{ $club->city }}</td>
                    <td>{{ $club->country }}</td>
                    <td>{{ $club->colors }}</td>
                    <td>{{ $club->stadium }}</td>
                    <td>{{ $club->founded_year }}</td>

                    <td>
                        <a href="{{ route('clubs.show', $club) }}">
                            <x-button variant="info">Ver Club</x-button>
                        </a>


                        <a href="{{ route('clubs.edit', $club) }}">
                            <x-button variant="warning">Editar Club</x-button>
                        </a>

                        <form action="{{ route('clubs.destroy', $club) }}"
                            method="POST"
                            style="display:inline;"
                        >

                        @csrf
                        @method('DELETE')

                        <x-button variant="danger" type="submit">Borrar Club</x-button>

                        {{-- <button type="submit">Borrar Club</button> --}}

                        </form>

                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>

    @else

    <p>No hay clubes registrados</p>

    @endif



</body>

</x-app-layout>
