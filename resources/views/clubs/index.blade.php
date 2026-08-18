<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index - Clubes</title>
</head>
<body>

    <h1>Clubes de futbol:</h1>
    <p>
        <a href="{{ route('clubs.create') }}"> Crear un club</a>
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
                        <a href="{{ route('clubs.show', $club) }}">Ver Club</a>
                        <a href="{{ route('clubs.edit', $club) }}">Editar Club</a>

                        <form action="{{ route('clubs.destroy', $club) }}"
                            method="POST"
                            style="display:inline;"
                        >

                        @csrf
                        @method('DELETE')

                        <button type="submit">Borrar Club</button>

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

</html>
