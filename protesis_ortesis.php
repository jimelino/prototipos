<?php

// =======================================
// PANEL ADMINISTRATIVO
// PRÓTESIS Y ORTESIS
// SOLO VISUAL - SIN MENÚ LATERAL
// =======================================

$pacientes = [
    "Carlos Ramírez",
    "Ana López",
    "María Torres",
    "José Hernández"
];

$calzados = [
    "Tenis ortopédicos",
    "Zapato deportivo ancho",
    "Calzado con plantilla suave"
];

$informacion = [

    [
        "titulo" => "¿Es dolor o presión?",
        "descripcion" =>
            "La presión suele desaparecer después de quitar la prótesis."
    ],

    [
        "titulo" => "¿Cuándo debo preocuparme?",
        "descripcion" =>
            "Si existe inflamación o heridas debe acudir a revisión."
    ]

];

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>
    Panel Prótesis y Ortesis
</title>

<style>

/* ================================= */
/* GENERAL */
/* ================================= */

body{
    margin:0;
    font-family:Arial;
    background:#F4F6F9;
}

.main-content{
    padding:30px;
}

/* ================================= */
/* TOPBAR */
/* ================================= */

.topbar{
    background:white;
    padding:20px 30px;
    border-radius:20px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    box-shadow:0 4px 15px rgba(0,0,0,0.08);
    margin-bottom:25px;
}

.topbar h1{
    margin:0;
    color:#1B4332;
}

/* ================================= */
/* GRID */
/* ================================= */

.dashboard-grid{
    display:grid;
    grid-template-columns:2fr 1fr;
    gap:25px;
}

/* ================================= */
/* CARDS */
/* ================================= */

.card{
    background:white;
    border-radius:20px;
    padding:25px;
    box-shadow:0 4px 15px rgba(0,0,0,0.08);
}

/* ================================= */
/* CALENDARIO */
/* ================================= */

.calendar-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

.calendar-btn{
    background:#2D6A4F;
    color:white;
    border:none;
    width:40px;
    height:40px;
    border-radius:50%;
    cursor:pointer;
}

.calendar-days{
    display:grid;
    grid-template-columns:repeat(7,1fr);
    text-align:center;
    font-weight:bold;
    margin-bottom:10px;
}

.calendar-grid{
    display:grid;
    grid-template-columns:repeat(7,1fr);
    gap:10px;
}

.calendar-day{
    background:#F8F9FA;
    padding:16px;
    border-radius:12px;
    text-align:center;
    cursor:pointer;
    transition:0.3s;
}

.calendar-day:hover{
    background:#D8F3DC;
}

.calendar-day.active{
    background:#2D6A4F;
    color:white;
}

/* ================================= */
/* CHAT */
/* ================================= */

.select-paciente{
    width:100%;
    padding:12px;
    border-radius:10px;
    border:1px solid #ccc;
}

.chat-box{
    background:#F8F9FA;
    border-radius:15px;
    padding:15px;
    height:300px;
    overflow-y:auto;
}

.message{
    margin-bottom:15px;
    padding:12px;
    border-radius:12px;
    max-width:80%;
}

.message.admin{
    background:#D8F3DC;
    margin-left:auto;
}

.message.patient{
    background:white;
}

.chat-input{
    display:flex;
    gap:10px;
}

.chat-input input{
    flex:1;
    padding:12px;
    border-radius:10px;
    border:1px solid #ccc;
}

.chat-input button{
    background:#2D6A4F;
    color:white;
    border:none;
    padding:0 20px;
    border-radius:10px;
    cursor:pointer;
}

/* ================================= */
/* CALZADO */
/* ================================= */

.calzado-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:20px;
    margin-top:20px;
}

.calzado-card{
    background:#F9FAFB;
    border-radius:15px;
    padding:20px;
}

.calzado-card h3{
    color:#222;
}

.calzado-actions{
    display:flex;
    gap:10px;
    margin-top:15px;
}

.btn{
    border:none;
    padding:10px 14px;
    border-radius:10px;
    cursor:pointer;
}

.btn-edit{
    background:#40916C;
    color:white;
}

.btn-delete{
    background:#D90429;
    color:white;
}

.btn-add{
    margin-top:20px;
    background:#2D6A4F;
    color:white;
    width:100%;
}

/* ================================= */
/* INFORMACIÓN */
/* ================================= */

.info-list{
    display:flex;
    flex-direction:column;
    gap:15px;
    margin-top:20px;
}

.info-card{
    background:#F8F9FA;
    padding:20px;
    border-radius:15px;
}

.info-card h3{
    margin-top:0;
}

.info-actions{
    display:flex;
    gap:10px;
    margin-top:15px;
}

/* ================================= */
/* RESPONSIVE */
/* ================================= */

@media(max-width:950px){

    .dashboard-grid{
        grid-template-columns:1fr;
    }

}

</style>

</head>

<body>

<div class="main-content">

    <!-- TOPBAR -->
    <div class="topbar">

        <h1>
            🦿 Panel Prótesis y Ortesis
        </h1>

        <span>
            Especialista conectado
        </span>

    </div>

    <!-- GRID -->
    <div class="dashboard-grid">

        <!-- CALENDARIO -->
        <div class="card">

            <div class="calendar-header">

                <button class="calendar-btn">
                    ‹
                </button>

                <h2>
                    Mayo 2026
                </h2>

                <button class="calendar-btn">
                    ›
                </button>

            </div>

            <div class="calendar-days">

                <div>L</div>
                <div>M</div>
                <div>M</div>
                <div>J</div>
                <div>V</div>
                <div>S</div>
                <div>D</div>

            </div>

            <div class="calendar-grid">

                <div class="calendar-day">1</div>
                <div class="calendar-day">2</div>
                <div class="calendar-day">3</div>

                <div class="calendar-day active">
                    4
                </div>

                <div class="calendar-day">5</div>
                <div class="calendar-day">6</div>
                <div class="calendar-day">7</div>
                <div class="calendar-day">8</div>
                <div class="calendar-day">9</div>
                <div class="calendar-day">10</div>

            </div>

            <br>

            <div class="info-card">

                <strong>
                    Cita programada
                </strong>

                <p>
                    Carlos Ramírez - 10:00 AM
                </p>

            </div>

        </div>

        <!-- CHAT -->
        <div class="card">

            <h2>
                💬 Chat directo
            </h2>

            <select class="select-paciente">

                <?php foreach($pacientes as $paciente){ ?>

                <option>
                    <?php echo $paciente; ?>
                </option>

                <?php } ?>

            </select>

            <br><br>

            <div class="chat-box">

                <div class="message patient">

                    Tengo presión al caminar.

                </div>

                <div class="message admin">

                    ¿Existe dolor o solo presión?

                </div>

                <div class="message patient">

                    Solo presión.

                </div>

            </div>

            <br>

            <div class="chat-input">

                <input type="text"
                       placeholder="Escribe un mensaje...">

                <button>
                    ➤
                </button>

            </div>

        </div>

    </div>

    <br>

    <!-- CALZADO -->
    <div class="card">

        <h2>
            👟 Gestión de calzado
        </h2>

        <div class="calzado-grid">

            <?php foreach($calzados as $calzado){ ?>

            <div class="calzado-card">

                <h3>
                    <?php echo $calzado; ?>
                </h3>

                <p>
                    Compatible con prótesis y ortesis.
                </p>

                <div class="calzado-actions">

                    <button class="btn btn-edit">
                        Editar
                    </button>

                    <button class="btn btn-delete">
                        Eliminar
                    </button>

                </div>

            </div>

            <?php } ?>

        </div>

        <button class="btn btn-add">
            + Agregar nuevo calzado
        </button>

    </div>

    <br>

    <!-- INFORMACIÓN -->
    <div class="card">

        <h2>
            ℹ️ Información importante
        </h2>

        <div class="info-list">

            <?php foreach($informacion as $info){ ?>

            <div class="info-card">

                <h3>
                    <?php echo $info["titulo"]; ?>
                </h3>

                <p>
                    <?php echo $info["descripcion"]; ?>
                </p>

                <div class="info-actions">

                    <button class="btn btn-edit">
                        Editar
                    </button>

                    <button class="btn btn-delete">
                        Eliminar
                    </button>

                </div>

            </div>

            <?php } ?>

        </div>

        <button class="btn btn-add">
            + Agregar información
        </button>

    </div>

</div>

</body>
</html>