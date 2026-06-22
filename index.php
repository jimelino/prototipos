<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Portal del Paciente - Azaria</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f5f7fb;
    font-family:'Segoe UI',sans-serif;
}

.header-card{
    background:white;
    border-radius:20px;
    padding:25px;
    box-shadow:0 4px 15px rgba(0,0,0,.08);
}

/* =========================
   RUTA TERAPÉUTICA
========================= */

.ruta-terapia{
    position:relative;
    width:100%;
    height:250px;
    margin-bottom:20px;
}

.ruta-terapia svg{
    width:100%;
    height:100%;
}

.inicio{
    position:absolute;
    left:10px;
    top:95px;
    font-size:40px;
}

.meta{
    position:absolute;
    right:10px;
    top:95px;
    font-size:40px;
}

.punto{
    position:absolute;
    font-size:30px;
}

.punto1{
    left:18%;
    top:20px;
}

.punto2{
    left:35%;
    top:170px;
}

.punto3{
    left:48%;
    top:60px;
}

.punto4{
    left:67%;
    top:25px;
}

.punto5{
    left:86%;
    top:90px;
}

/* =========================
   PACIENTE
========================= */

.profile-img{
    width:130px;
    height:130px;
    border-radius:50%;
    object-fit:cover;
    border:5px solid #e0e7ff;
}

.info-paciente h3{
    color:#2563eb;
    font-weight:700;
}

.info-paciente p{
    margin-bottom:8px;
}

.avisos{
    font-size:35px;
}

/* =========================
   CITA
========================= */

.cita{
    background:#2563eb;
    color:white;
    border-radius:20px;
    padding:20px;
    box-shadow:0 4px 15px rgba(37,99,235,.25);
}

/* =========================
   MODULOS
========================= */

.modulo{
    background:white;
    border-radius:20px;
    padding:35px;
    text-align:center;
    text-decoration:none;
    color:#333;
    display:block;
    transition:.3s;
    box-shadow:0 4px 15px rgba(0,0,0,.08);
    height:100%;
}

.modulo:hover{
    transform:translateY(-5px);
}

.icono{
    font-size:50px;
    margin-bottom:10px;
}

h2{
    color:#2563eb;
    font-weight:bold;
}

</style>

</head>

<body>

<div class="container mt-4">

    <!-- TARJETA PRINCIPAL -->

    <div class="header-card">

        <!-- RUTA DE PROGRESO -->

        <div class="ruta-terapia">

            <div class="inicio">🧠</div>

            <svg viewBox="0 0 1200 250">

                <!-- Camino -->

                <path
                d="M40 130
                   C130 20,220 20,260 130
                   S420 250,500 130
                   S680 20,760 130
                   S940 250,1020 130
                   S1120 90,1160 120"
                fill="none"
                stroke="#1f1b20"
                stroke-width="55"
                stroke-linecap="round"/>

                <!-- Línea punteada -->

                <path
                d="M40 130
                   C130 20,220 20,260 130
                   S420 250,500 130
                   S680 20,760 130
                   S940 250,1020 130
                   S1120 90,1160 120"
                fill="none"
                stroke="white"
                stroke-width="4"
                stroke-dasharray="12 18"/>

            </svg>

            <!-- HITOS -->

            <div class="punto punto1">📍</div>
            <div class="punto punto2">📍</div>
            <div class="punto punto3">📍</div>
            <div class="punto punto4">📍</div>
            <div class="punto punto5">📍</div>

            <div class="meta">🏁</div>

        </div>

        <!-- DATOS DEL PACIENTE -->

        <div class="row align-items-center">

            <div class="col-md-2 text-center">

                <img
                src="https://via.placeholder.com/150"
                class="profile-img"
                alt="Paciente">

            </div>

            <div class="col-md-8 info-paciente">

                <h3>Jennifer Pérez</h3>

                <p><strong>Folio:</strong> AZ-2026-001</p>

                <p><strong>Edad:</strong> 23 años</p>

                <p><strong>Protocolo:</strong> Investigación</p>

            </div>

            <div class="col-md-2 text-center">

                <div class="avisos">🔔</div>

                <h4>3</h4>

                <small>Avisos</small>

            </div>

        </div>

    </div>

    <br>

    <!-- CITA -->

    <div class="cita">

        <h4>📅 Próxima cita</h4>

        <p class="mb-0">
            25 Junio 2026 - 10:00 AM
            <br>
            Dra. María González
        </p>

    </div>

    <br><br>

    <h2 class="text-center mb-4">
        Módulos del Paciente
    </h2>

    <div class="row g-4">

        <div class="col-md-6">

            <a href="resultados.php" class="modulo">

                <div class="icono">📋</div>

                <h4>Resultados de Pruebas</h4>

                <p>
                    Consulta tus evaluaciones y resultados.
                </p>

            </a>

        </div>

        <div class="col-md-6">

            <a href="avisos.php" class="modulo">

                <div class="icono">🔔</div>

                <h4>Avisos Importantes</h4>

                <p>
                    Alertas y anuncios de la clínica.
                </p>

            </a>

        </div>

        <div class="col-md-6">

            <a href="chat.php" class="modulo">

                <div class="icono">💬</div>

                <h4>Chat Privado</h4>

                <p>
                    Comunícate con tu especialista.
                </p>

            </a>

        </div>

        <div class="col-md-6">

            <a href="foro.php" class="modulo">

                <div class="icono">🌎</div>

                <h4>Foro Comunitario</h4>

                <p>
                    Comparte experiencias con la comunidad.
                </p>

            </a>

        </div>

    </div>

</div>

</body>
</html>