```php
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Avisos Importantes</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f5f7fb;
}

.card-custom{
    border:none;
    border-radius:20px;
    box-shadow:0 4px 15px rgba(0,0,0,.08);
}

.titulo{
    color:#2563eb;
}

.aviso{
    border-left:6px solid #2563eb;
    margin-bottom:15px;
}

</style>

</head>

<body>

<div class="container mt-5">

<a href="index.php" class="btn btn-outline-primary mb-4">
← Regresar al Inicio
</a>

<div class="card card-custom p-4">

<h2 class="titulo text-center">
🔔 Avisos Importantes
</h2>

<hr>

<div class="alert alert-warning aviso">

<h5>📅 Recordatorio de Cita</h5>

<p>
Tienes una cita programada para el
<b>25 de junio de 2026 a las 10:00 AM</b>.
</p>

</div>

<div class="alert alert-info aviso">

<h5>📢 Nuevo Material Disponible</h5>

<p>
Tu especialista ha agregado nuevas actividades
y ejercicios terapéuticos para esta semana.
</p>

</div>

<div class="alert alert-success aviso">

<h5>✅ Actividad Completada</h5>

<p>
Se registró correctamente tu última evaluación cognitiva.
</p>

</div>

<div class="alert alert-danger aviso">

<h5>⚠ Aviso General</h5>

<p>
La plataforma tendrá mantenimiento el próximo domingo
de 1:00 AM a 3:00 AM.
</p>

</div>

<hr>

<h4>📋 Historial de Avisos</h4>

<table class="table table-striped mt-3">

<thead class="table-primary">
<tr>
<th>Fecha</th>
<th>Aviso</th>
<th>Estado</th>
</tr>
</thead>

<tbody>

<tr>
<td>20/06/2026</td>
<td>Material terapéutico actualizado</td>
<td>Leído</td>
</tr>

<tr>
<td>18/06/2026</td>
<td>Confirmación de cita</td>
<td>Leído</td>
</tr>

<tr>
<td>15/06/2026</td>
<td>Resultados disponibles</td>
<td>Leído</td>
</tr>

</tbody>

</table>

</div>

</div>

</body>
</html>
```
