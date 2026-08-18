<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear un club</title>
</head>
<body>
    <h1>Crear un club</h1>
    <h2>Ingrese los datos del club a registrar</h2>

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

    <form action="{{ route('clubs.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" value="" placeholder="Nombre Equipo FC">
        </div>
        <br>
        <div>
            <label for="titles">Títulos:</label>
            <input type="number" id="titles" name="titles" value="0" min="0">
        </div>
        <br>
        <div>
            <label for="city">Ciudad:</label>
            <input type="text" id="city" name="city" value="" placeholder="">
        </div>
        <br>
        <div>
            <label for="country">Pais:</label>
            <input type="text" id="country" name="country" value="">
        </div>
        <br>
        <div>
            <label for="colors">Colores:</label>
            <input type="text" name="colors" id="colors" value="">
        </div>
        <br>
        <div>
            <label for="stadium">Estadio:</label>
            <input type="text" name="stadium" id="stadium" value="">
        </div>
        <br>
        <div>
            <label for="founded_year">Fundación:</label>
            <input type="number" name="founded_year" id="founded_year" min="1800" max="2026" value="2010">
        </div>

        <br>
        <button type="submit">Crear club</button>
    </form>

</body>
</html>
