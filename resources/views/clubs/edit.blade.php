<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar - {{ $club->name }}</title>
</head>
<body>
    <h1>Editar el club {{ $club->name }}</h1>
    <h2>Ingrese los datos del club a editar</h2>

    @if($errors->any())
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
        <div>
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $club->name) }}" placeholder="Nombre Equipo FC">
        </div>
        <br>
        <div>
            <label for="titles">Títulos:</label>
            <input type="number" id="titles" name="titles" value="{{ old('titles', $club->titles) }}" min="0">
        </div>
        <br>
        <div>
            <label for="city">Ciudad:</label>
            <input type="text" id="city" name="city" value="{{ old('city', $club->city) }}" placeholder="">
        </div>
        <br>
        <div>
            <label for="country">Pais:</label>
            <input type="text" id="country" name="country" value="{{ old('country', $club->country) }}">
        </div>
        <br>
        <div>
            <label for="colors">Colores:</label>
            <input type="text" name="colors" id="colors" value="{{ old('colors', $club->colors) }}">
        </div>
        <br>
        <div>
            <label for="stadium">Estadio:</label>
            <input type="text" name="stadium" id="stadium" value="{{ old('stadium', $club->stadium) }}">
        </div>
        <br>
        <div>
            <label for="founded_year">Fundación:</label>
            <input type="number" name="founded_year" id="founded_year" min="1800" max="2026" value="{{ old('founded_year', $club->founded_year) }}">
        </div>

        <br>
        <button type="submit">Editar club</button>
    </form>

</body>
</html>
