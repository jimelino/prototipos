<?php

// =======================================
// PROTOTIPO - PRÓTESIS Y ORTESIS
// SOLO VISUAL - NO FUNCIONAL
// =======================================

$calzados = [
    "Tenis ortopédicos",
    "Zapato deportivo ancho",
    "Calzado con plantilla suave",
    "Zapato de soporte alto"
];

$dudas = [
    [
        "titulo" => "¿Es dolor o presión?",
        "descripcion" =>
            "La presión suele desaparecer después de quitar la prótesis. El dolor puede permanecer incluso en reposo."
    ],

    [
        "titulo" => "¿Cuándo debo preocuparme?",
        "descripcion" =>
            "Si existe enrojecimiento intenso, heridas o inflamación debes contactar al especialista."
    ],

    [
        "titulo" => "Molestias normales",
        "descripcion" =>
            "Una ligera presión inicial es común mientras el cuerpo se adapta."
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
        Prótesis y Ortesis
    </title>

<style>

/* ================================= */
/* GENERAL */
/* ================================= */

body{
    margin:0;
    font-family: Arial;
    background:#F4F6F9;
}

.nutricion-page{
    padding:30px;
}

.nutricion-content{
    display:flex;
    flex-direction:column;
    gap:30px;
}

/* ================================= */
/* HEADER */
/* ================================= */

.nutricion-header-new{
    background:white;
    border-radius:20px;
    padding:25px;
    margin-bottom:25px;
    box-shadow:0 4px 15px rgba(0,0,0,0.08);
}

.nutricion-header-top{
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.nutricion-header-left{
    display:flex;
    align-items:center;
    gap:20px;
}

.nutricion-header-icon{
    width:70px;
    height:70px;
    border-radius:20px;
    background:#E8F5E9;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:35px;
}

.nutricion-subtitle{
    color:#666;
}

/* ================================= */
/* CALENDARIO */
/* ================================= */

.plan-resumen-section{
    background:white;
    border-radius:20px;
    padding:25px;
    box-shadow:0 4px 15px rgba(0,0,0,0.08);
}

.plan-resumen-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

.plan-especialista{
    color:#2E7D32;
    font-weight:bold;
}

.calendar-layout{
    display:flex;
    gap:25px;
    flex-wrap:wrap;
}

.calendar-card{
    flex:2;
    background:#FAFAFA;
    border-radius:20px;
    padding:25px;
}

.calendar-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

.calendar-arrow{
    background:#2E7D32;
    color:white;
    border:none;
    width:40px;
    height:40px;
    border-radius:50%;
    cursor:pointer;
    font-size:20px;
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
    background:white;
    padding:16px;
    border-radius:12px;
    text-align:center;
    cursor:pointer;
    transition:0.3s;
    box-shadow:0 2px 6px rgba(0,0,0,0.05);
}

.calendar-day:hover{
    background:#C8E6C9;
}

.calendar-day.active{
    background:#2E7D32;
    color:white;
    font-weight:bold;
}

.calendar-day.empty{
    background:transparent;
    box-shadow:none;
}

.calendar-info{
    margin-top:25px;
}

.calendar-appointment{
    background:#E8F5E9;
    padding:15px;
    border-radius:15px;
    display:flex;
    align-items:center;
    gap:12px;
}

.appointment-dot{
    width:12px;
    height:12px;
    border-radius:50%;
    background:#2E7D32;
}

.calendar-btn-main{
    width:100%;
    margin-top:20px;
    padding:14px;
    border:none;
    border-radius:12px;
    background:#2E7D32;
    color:white;
    cursor:pointer;
    font-size:15px;
}

/* ================================= */
/* CHAT */
/* ================================= */

.chat-card{
    flex:1;
    background:white;
    border-radius:20px;
    padding:20px;
    box-shadow:0 4px 15px rgba(0,0,0,0.08);
    display:flex;
    flex-direction:column;
}

.chat-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

.chat-status{
    color:green;
    font-size:14px;
}

.chat-body{
    display:flex;
    flex-direction:column;
    gap:12px;
    flex:1;
}

.chat-message{
    padding:12px;
    border-radius:12px;
    max-width:85%;
}

.chat-message.specialist{
    background:#F1F8E9;
    align-self:flex-start;
}

.chat-message.patient{
    background:#E3F2FD;
    align-self:flex-end;
}

.chat-input-container{
    display:flex;
    gap:10px;
    margin-top:20px;
}

.chat-input{
    flex:1;
    padding:12px;
    border-radius:10px;
    border:1px solid #ccc;
}

.chat-send-btn{
    background:#2E7D32;
    color:white;
    border:none;
    padding:0 18px;
    border-radius:10px;
    cursor:pointer;
}

/* ================================= */
/* CALZADO */
/* ================================= */

.calzado-section{
    background:#F9FAFB;
    border-radius:20px;
    padding:25px;
    box-shadow:0 4px 15px rgba(0,0,0,0.08);
}

.section-header{
    margin-bottom:20px;
}

.calzado-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:20px;
}

.calzado-card{
    background:white;
    border-radius:18px;
    padding:25px;
    text-align:center;
    box-shadow:0 3px 10px rgba(0,0,0,0.07);
}

.calzado-img{
    font-size:55px;
    margin-bottom:15px;
}

.calzado-card h3{
    color:#222;
}

.calzado-card p{
    color:#666;
    font-size:14px;
    line-height:1.5;
}

.calzado-btn{
    background:#2E7D32;
    color:white;
    border:none;
    padding:12px 18px;
    border-radius:10px;
    cursor:pointer;
    margin-top:15px;
}

/* ================================= */
/* REPORTES */
/* ================================= */

.comida-card-paciente{
    background:white;
    border-radius:20px;
    padding:25px;
    box-shadow:0 4px 15px rgba(0,0,0,0.08);
}

.comida-card-header{
    margin-bottom:20px;
}

.comida-tipo-info{
    display:flex;
    align-items:center;
    gap:15px;
}

.comida-icono{
    width:60px;
    height:60px;
    border-radius:15px;
    background:#E8F5E9;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:30px;
}

.opciones-grid-paciente{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:20px;
}

.opcion-card-paciente{
    background:#FAFAFA;
    padding:20px;
    border-radius:15px;
}

.textarea-protesis{
    width:100%;
    height:140px;
    border-radius:12px;
    border:1px solid #ccc;
    padding:15px;
    resize:none;
}

input[type="file"]{
    margin-top:15px;
}

/* ================================= */
/* INFORMACIÓN */
/* ================================= */

.recomendaciones-section{
    background:white;
    border-radius:20px;
    padding:25px;
    box-shadow:0 4px 15px rgba(0,0,0,0.08);
}

.plan-comidas-list{
    display:flex;
    flex-direction:column;
    gap:15px;
}

.food-suggestion-item{
    background:#F8F9FA;
    padding:18px;
    border-radius:15px;
}

.food-name{
    font-weight:bold;
    display:block;
    margin-bottom:8px;
}

.food-description{
    color:#666;
}

/* ================================= */
/* RESPONSIVE */
/* ================================= */

@media(max-width:900px){

    .calendar-layout{
        flex-direction:column;
    }

    .opciones-grid-paciente{
        grid-template-columns:1fr;
    }

}

</style>

</head>

<body>

<div class="nutricion-page">

    <!-- HEADER -->
    <div class="nutricion-header-new">

        <div class="nutricion-header-top">

            <div class="nutricion-header-left">

                <div class="nutricion-header-icon">
                    🦿
                </div>

                <div>

                    <h1>
                        Prótesis y Ortesis
                    </h1>

                    <p class="nutricion-subtitle">
                        Seguimiento y cuidado del paciente
                    </p>

                </div>

            </div>

        </div>

    </div>

    <div class="nutricion-content">

        <!-- CALENDARIO -->
        <div class="plan-resumen-section">

            <div class="plan-resumen-header">

                <h2>
                    📅 Agenda de citas
                </h2>

                <span class="plan-especialista">
                    Próxima revisión médica
                </span>

            </div>

            <div class="calendar-layout">

                <!-- CALENDARIO -->
                <div class="calendar-card">

                    <div class="calendar-header">

                        <button class="calendar-arrow">
                            ‹
                        </button>

                        <h3>
                            Mayo 2026
                        </h3>

                        <button class="calendar-arrow">
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

                        <div class="calendar-day empty"></div>
                        <div class="calendar-day empty"></div>

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
                        <div class="calendar-day">11</div>

                    </div>

                    <div class="calendar-info">

                        <div class="calendar-appointment">

                            <span class="appointment-dot"></span>

                            <div>

                                <strong>
                                    Cita de revisión
                                </strong>

                                <p>
                                    4 Mayo - 10:00 AM
                                </p>

                            </div>

                        </div>

                    </div>

                    <button class="calendar-btn-main">
                        Agendar nueva cita
                    </button>

                </div>

                <!-- CHAT -->
                <div class="chat-card">

                    <div class="chat-header">

                        <h3>
                            💬 Chat directo
                        </h3>

                        <span class="chat-status">
                            En línea
                        </span>

                    </div>

                    <div class="chat-body">

                        <div class="chat-message specialist">

                            <p>
                                Hola, ¿cómo te has sentido con la prótesis?
                            </p>

                        </div>

                        <div class="chat-message patient">

                            <p>
                                Tengo un poco de presión al caminar.
                            </p>

                        </div>

                        <div class="chat-message specialist">

                            <p>
                                ¿Existe dolor o solamente presión?
                            </p>

                        </div>

                    </div>

                    <div class="chat-input-container">

                        <input
                            type="text"
                            placeholder="Escribe un mensaje..."
                            class="chat-input"
                        >

                        <button class="chat-send-btn">
                            ➤
                        </button>

                    </div>

                </div>

            </div>

        </div>

        <!-- CALZADO -->
        <div class="calzado-section">

            <div class="section-header">

                <h2>
                    👟 Calzado recomendado
                </h2>

            </div>

            <div class="calzado-grid">

                <?php foreach($calzados as $calzado){ ?>

                <div class="calzado-card">

                    <div class="calzado-img">
                        👟
                    </div>

                    <h3>
                        <?php echo $calzado; ?>
                    </h3>

                    <p>
                        Recomendado para mejorar estabilidad,
                        comodidad y adaptación con la prótesis.
                    </p>

                    <button class="calzado-btn">
                        Ver detalles
                    </button>

                </div>

                <?php } ?>

            </div>

        </div>

        <!-- REPORTAR MOLESTIAS -->
        <div class="comida-card-paciente">

            <div class="comida-card-header">

                <div class="comida-tipo-info">

                    <div class="comida-icono">
                        🩺
                    </div>

                    <div>

                        <h2>
                            Reporte de molestias
                        </h2>

                        <p>
                            Prótesis / Ortesis
                        </p>

                    </div>

                </div>

            </div>

            <div class="opciones-grid-paciente">

                <div class="opcion-card-paciente">

                    <h3>
                        Describe tu molestia
                    </h3>

                    <textarea
                        class="textarea-protesis"
                        placeholder="Describe dolor, presión o incomodidad...">
                    </textarea>

                </div>

                <div class="opcion-card-paciente">

                    <h3>
                        Subir fotografía
                    </h3>

                    <input type="file">

                    <p>
                        Puedes subir imágenes en caso de heridas,
                        irritación o inflamación.
                    </p>

                </div>

            </div>

            <button class="calendar-btn-main">
                Enviar reporte
            </button>

        </div>

        <!-- INFORMACIÓN -->
        <div class="recomendaciones-section">

            <h2>
                ℹ️ Información importante
            </h2>

            <div class="plan-comidas-list">

                <?php foreach($dudas as $duda){ ?>

                <div class="food-suggestion-item">

                    <span class="food-name">
                        <?php echo $duda["titulo"]; ?>
                    </span>

                    <span class="food-description">
                        <?php echo $duda["descripcion"]; ?>
                    </span>

                </div>

                <?php } ?>

            </div>

        </div>

    </div>

</div>

</body>
</html>