```php
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Gráfica de Progreso</title>

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

.progress{
    height:35px;
    border-radius:20px;
}

.titulo{
    color:#2563eb;
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
📈 Gráfica de Progreso del Tratamiento
</h2>

<hr>

<p>
Protocolo asignado:
<b>Investigación</b>
</p>

<h5>Avance General</h5>

<div class="progress mb-4">
<div class="progress-bar bg-success" style="width:75%">
75%
</div>
</div>

<h5>Evaluaciones Completadas</h5>

<div class="progress mb-4">
<div class="progress-bar bg-primary" style="width:90%">
90%
</div>
</div>

<h5>Ejercicios Terapéuticos</h5>

<div class="progress mb-4">
<div class="progress-bar bg-warning" style="width:60%">
60%
</div>
</div>

<h5>Sesiones Asistidas</h5>

<div class="progress mb-4">
<div class="progress-bar bg-info" style="width:80%">
80%
</div>
</div>

<hr>

<h4 class="mt-4">
🏆 Resumen
</h4>

<ul class="list-group">

<li class="list-group-item">
✅ 18 evaluaciones completadas
</li>

<li class="list-group-item">
✅ 12 ejercicios terapéuticos realizados
</li>

<li class="list-group-item">
✅ 8 sesiones asistidas
</li>

<li class="list-group-item">
📅 Próxima sesión: 25 Junio 2026
</li>

</ul>

</div>

</div>

</body>
</html>
```
