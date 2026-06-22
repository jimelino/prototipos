```php
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Resultados de Pruebas</title>

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

.resultado{
    font-weight:bold;
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
📋 Resultados de Pruebas
</h2>

<hr>

<table class="table table-hover">

<thead class="table-primary">

<tr>
<th>Prueba</th>
<th>Resultado</th>
<th>Estado</th>
</tr>

</thead>

<tbody>

<tr>
<td>Atención Visual</td>
<td class="resultado">8/10</td>
<td>🟢 Adecuado</td>
</tr>

<tr>
<td>Memoria Visual</td>
<td class="resultado">7/10</td>
<td>🟡 Seguimiento</td>
</tr>

<tr>
<td>Memoria Auditiva</td>
<td class="resultado">9/10</td>
<td>🟢 Adecuado</td>
</tr>

<tr>
<td>Lenguaje</td>
<td class="resultado">9/10</td>
<td>🟢 Adecuado</td>
</tr>

<tr>
<td>Funciones Ejecutivas</td>
<td class="resultado">6/10</td>
<td>🟡 Mejorable</td>
</tr>

</tbody>

</table>

<hr>

<h4>🩺 Recomendaciones del Especialista</h4>

<div class="alert alert-info mt-3">

<ul>
<li>Continuar con ejercicios de memoria visual.</li>
<li>Realizar actividades de atención sostenida 15 minutos diarios.</li>
<li>Mantener asistencia constante a sesiones terapéuticas.</li>
<li>Completar los ejercicios asignados en la plataforma.</li>
</ul>

</div>

<hr>

<h4>📊 Progreso de Actividades</h4>

<div class="progress mb-3" style="height:30px;">
<div class="progress-bar bg-success" style="width:85%;">
85%
</div>
</div>

<p>
Has completado <b>17 de 20 actividades</b> asignadas.
</p>

</div>

</div>

</body>
</html>
```
