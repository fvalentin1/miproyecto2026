<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 14px; }
        h1 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #999; padding: 8px; text-align: left; }
        th { background: #eee; }
    </style>
</head>
<body>
    <h1>Reporte de clubes según año de fundación</h1>
    <p>Fecha: {{ now()->format('d/m/Y') }}</p>

    <table>
        <thead>
            <tr><th>Período</th><th>Cantidad</th></tr>
        </thead>
        <tbody>
            <tr><td>Antes del 2000</td><td>{{ $before2000 }}</td></tr>
            <tr><td>Desde el 2000</td><td>{{ $after2000 }}</td></tr>
            <tr><th>Total</th><th>{{ $before2000 + $after2000 }}</th></tr>
        </tbody>
    </table>
</body>
</html>
