<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mostrar - Club {{ $club->name }}</title>
</head>
<body>
    <h1>{{ $club->name }}</h1>

    <h2>Información del club:</h2>
    <p><strong>Titulos:</strong> {{ $club->titles }}</p>
    <p><strong>Ciudad:</strong> {{ $club->city }}</p>
    <p><strong>Pais:</strong> {{ $club->country }}</p>
    <p><strong>Colores:</strong> {{ $club->colors }}</p>
    <p><strong>Estadio:</strong> {{ $club->stadium }}</p>
    <p><strong>Fundación:</strong> {{ $club->founded_year }}</p>

</body>
</html>
