```php
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Chat Privado</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f5f7fb;
}

.card-chat{
    border:none;
    border-radius:20px;
    box-shadow:0 4px 15px rgba(0,0,0,.08);
}

.chat-box{
    height:450px;
    overflow-y:auto;
    padding:20px;
    background:#f8f9fa;
    border-radius:15px;
}

.mensaje-paciente{
    background:#2563eb;
    color:white;
    padding:12px;
    border-radius:15px 15px 0px 15px;
    margin-bottom:15px;
    width:70%;
    margin-left:auto;
}

.mensaje-especialista{
    background:white;
    padding:12px;
    border-radius:15px 15px 15px 0px;
    margin-bottom:15px;
    width:70%;
    border:1px solid #ddd;
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

<div class="card card-chat p-4">

<h2 class="titulo text-center">
💬 Chat Privado
</h2>

<p class="text-center">
Especialista asignado: <b>Dra. María González</b>
</p>

<hr>

<div class="chat-box">

<div class="mensaje-especialista">
Hola Jennifer, ¿cómo te has sentido esta semana?
</div>

<div class="mensaje-paciente">
Hola doctora, me he sentido mejor y he completado los ejercicios asignados.
</div>

<div class="mensaje-especialista">
Excelente. He revisado tu progreso y se observan avances positivos.
</div>

<div class="mensaje-paciente">
Gracias. ¿Debo continuar con las actividades de memoria visual?
</div>

<div class="mensaje-especialista">
Sí, te recomiendo seguir practicando diariamente durante 15 minutos.
</div>

</div>

<hr>

<form>

<div class="input-group">

<input
type="text"
class="form-control"
placeholder="Escribe un mensaje...">

<button class="btn btn-primary">
Enviar
</button>

</div>

</form>

</div>

</div>

</body>
</html>
```
