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

// Aquí se cargan los cuidados informativos (Manual educativo)
$cuidados_informacion = [
    [
        "titulo" => "Cuidado del Liner y Socket",
        "descripcion" => "Lavar el liner diariamente con jabón neutro y agua tibia para evitar bacterias."
    ],
    [
        "titulo" => "¿Es dolor o presión?",
        "descripcion" => "La presión suele desaparecer después de quitar la prótesis. Si hay dolor, suspenda su uso."
    ],
    [
        "titulo" => "¿Cuándo debo preocuparme?",
        "descripcion" => "Si existe inflamación, enrojecimiento persistente o heridas, debe acudir a revisión de inmediato."
    ]
];

// Fases del proceso recopiladas de la entrevista
$fases_protesis = [
    "Valoración muscular y articular",
    "Cotización enviada/firmada",
    "Pago realizado - Espera de componentes",
    "Elaboración de prótesis de prueba",
    "Cita de prueba y ajuste",
    "Fase Post-Prótesis (Fisioterapia y marcha)"
];

$fases_ortesis = [
    "Valoración muscular y articular",
    "Cotización y Pago verificado",
    "Toma de molde y medidas (Vendas de yeso)",
    "Elaboración y Termoformado en taller",
    "Prueba y entrega final"
];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Prótesis y Ortesis</title>
    <!-- Vinculación a tu archivo de estilos externo -->
    <link rel="stylesheet" href="Ortesis.css">
</head>
<body>

<div class="main-content">

    <!-- TOPBAR -->
    <div class="topbar">
        <h1>🦿 Panel Prótesis y Ortesis</h1>
        <span>Especialista conectado</span>
    </div>

    <!-- GRID PRINCIPAL -->
    <div class="dashboard-grid">

        <!-- CALENDARIO -->
        <div class="card">
            <div class="calendar-header">
                <button class="calendar-btn">‹</button>
                <h2>Mayo 2026</h2>
                <button class="calendar-btn">›</button>
            </div>

            <div class="calendar-days">
                <div>L</div><div>M</div><div>M</div><div>J</div><div>V</div><div>S</div><div>D</div>
            </div>

            <div class="calendar-grid">
                <div class="calendar-day">1</div>
                <div class="calendar-day">2</div>
                <div class="calendar-day">3</div>
                <div class="calendar-day active">4</div>
                <div class="calendar-day">5</div>
                <div class="calendar-day">6</div>
                <div class="calendar-day">7</div>
                <div class="calendar-day">8</div>
                <div class="calendar-day">9</div>
                <div class="calendar-day">10</div>
            </div>
            <br>
            <div class="info-card">
                <strong>Cita programada</strong>
                <p>Carlos Ramírez - 10:00 AM</p>
            </div>
        </div>

        <!-- CHAT DIRECTO -->
        <div class="card">
            <h2>💬 Chat directo</h2>
            <select class="select-paciente">
                <?php foreach($pacientes as $paciente){ ?>
                    <option><?php echo $paciente; ?></option>
                <?php } ?>
            </select>
            <br><br>
            <div class="chat-box">
                <div class="message patient">Tengo presión al caminar.</div>
                <div class="message admin">¿Existe dolor o solo presión?</div>
                <div class="message patient">Solo presión.</div>
            </div>
            <br>
            <div class="chat-input">
                <input type="text" placeholder="Escribe un mensaje...">
                <button>➤</button>
            </div>
        </div>

    </div>

    <br>

    <!-- CONTROL DE FASES Y SEGUIMIENTO DEL PACIENTE -->
    <div class="card">
        <h2>Seguimiento de Fases del Paciente</h2>
        <p class="section-subtitle">Selecciona el paciente y actualiza su estado actual en el proceso para que se refleje en su barra de progreso.</p>
        
        <div class="fases-container-grid">
            
            <!-- Flujo Prótesis -->
            <div class="flujo-card flujo-protesis">
                <h3>🦿 Proceso para Prótesis</h3>
                <label class="form-label">Seleccionar Paciente:</label>
                <select class="select-paciente">
                    <option>Carlos Ramírez</option>
                    <option>José Hernández</option>
                </select>
                
                <label class="form-label">Fase Actual:</label>
                <select class="select-paciente">
                    <?php foreach($fases_protesis as $index => $fase) { ?>
                        <option value="<?php echo $index+1; ?>">Paso <?php echo $index+1; ?>: <?php echo $fase; ?></option>
                    <?php } ?>
                </select>
                <button class="btn btn-update-protesis">Actualizar Estado de Prótesis</button>
            </div>

            <!-- Flujo Órtesis -->
            <div class="flujo-card flujo-ortesis">
                <h3>🩼 Proceso para Órtesis</h3>
                <label class="form-label">Seleccionar Paciente:</label>
                <select class="select-paciente">
                    <option>Ana López</option>
                    <option>María Torres</option>
                </select>
                
                <label class="form-label">Fase Actual:</label>
                <select class="select-paciente">
                    <?php foreach($fases_ortesis as $index => $fase) { ?>
                        <option value="<?php echo $index+1; ?>">Paso <?php echo $index+1; ?>: <?php echo $fase; ?></option>
                    <?php } ?>
                </select>
                <button class="btn btn-update-ortesis">Actualizar Estado de Órtesis</button>
            </div>

        </div>
    </div>

    <br>

    <!-- INDICACIONES DE PREPARACIÓN O CITAS (ALERTAS) -->
    <div class="card">
        <h2>📢 Asignar Indicaciones</h2>
        <p class="section-subtitle">Estas indicaciones detonan alertas directas en la pantalla principal del paciente para avisos específicos del día de su cita.</p>
        <br>
        <form class="panel-form-single">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px;">
                <div>
                    <label class="form-label">Paciente Destinatario:</label>
                    <select class="select-paciente">
                        <?php foreach($pacientes as $paciente){ ?>
                            <option><?php echo $paciente; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div>
                    <label class="form-label">Tipo de Aviso:</label>
                    <select class="select-paciente">
                        <option>Preparación para toma de molde (Traer Short)</option>
                        <option>Instrucción de Seguridad o Traslado</option>
                        <option>Alerta de agendamiento para cita de prueba</option>
                    </select>
                </div>
            </div>
            <div style="margin-top: 12px;">
                <label class="form-label">Mensaje o instrucción específica:</label>
                <textarea class="form-textarea" placeholder="Ej: Recuerda asistir con short cómodo y holgado para la sesión de moldes de yeso de mañana."></textarea>
            </div>
            <button type="button" class="btn btn-add" style="max-width: 300px; margin-top: 5px;">🔔 Enviar Indicación Directa</button>
        </form>
    </div>

    <br>

    <!-- GESTIÓN DE CALZADO -->
    <div class="card">
        <h2>👟 Gestión de calzado</h2>
        <div class="calzado-grid">
            <?php foreach($calzados as $calzado){ ?>
                <div class="calzado-card">
                    <h3><?php echo $calzado; ?></h3>
                    <p>Compatible con prótesis y ortesis.</p>
                    <div class="calzado-actions">
                        <button class="btn btn-edit">Editar</button>
                        <button class="btn btn-delete">Eliminar</button>
                    </div>
                </div>
            <?php } ?>
        </div>
        <button class="btn btn-add">+ Agregar nuevo calzado</button>
    </div>

    <br>

    <!-- MANUAL DE CUIDADOS E INFORMACIÓN -->
    <div class="card">
        <h2> Manual de Cuidados e Información del Dispositivo</h2>
        <p class="section-subtitle">Administra los artículos educativos permanentes que los pacientes consultan para cuidar su prótesis u órtesis.</p>
        
        <div class="info-list">
            <?php foreach($cuidados_informacion as $info){ ?>
                <div class="info-card">
                    <h3><?php echo $info["titulo"]; ?></h3>
                    <p><?php echo $info["descripcion"]; ?></p>
                    <div class="info-actions">
                        <button class="btn btn-edit">Editar</button>
                        <button class="btn btn-delete">Eliminar</button>
                    </div>
                </div>
            <?php } ?>
        </div>
        <button class="btn btn-add">+ Publicar Nuevo Artículo de Cuidado</button>
    </div>

</div>

</body>
</html>