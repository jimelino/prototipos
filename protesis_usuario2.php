<?php

// =======================================
// VISTA PACIENTE - PRÓTESIS Y ORTESIS
// INTEGRADO CON REQUERIMIENTOS MÉDICOS
// =======================================

$calzados = [
    "Tenis ortopédicos",
    "Zapato deportivo ancho",
    "Calzado con plantilla suave",
    "Zapato de soporte alto"
];

// Arreglo modificado para incluir enlaces de video educativos
$dudas_y_cuidados = [
    [
        "titulo" => "🧼 Limpieza y Cuidado del Liner y Socket",
        "descripcion" => "Lavar el liner diariamente con jabón neutro y agua tibia para evitar bacterias. Nunca uses alcohol.",
        "video_url" => "https://youtube.com/ejemplo_cuidados_liner"
    ],
    [
        "titulo" => "❓ ¿Es dolor o presión?",
        "descripcion" => "La presión suele desaparecer después de quitar la prótesis. El dolor puede permanecer incluso en reposo.",
        "video_url" => "https://youtube.com/ejemplo_dolor_presion"
    ],
    [
        "titulo" => "🚨 ¿Cuándo debo preocuparme?",
        "descripcion" => "Si existe enrojecimiento intenso, heridas o inflamación debes contactar al especialista de inmediato.",
        "video_url" => "https://youtube.com/ejemplo_alertas"
    ],
    [
        "titulo" => "👣 Molestias normales de adaptación",
        "descripcion" => "Una ligera presión inicial es común en lo que el cuerpo se adapta a la transferencia de cargas.",
        "video_url" => "https://youtube.com/ejemplo_marcha"
    ]
];

// Simulador del estado actual del paciente en su tratamiento
$tipo_dispositivo = "Protesis"; // Puede ser 'Protesis' o 'Ortesis'
$fase_actual_paciente = 3; // Indica que va en el paso 3

// Arreglos de fases para construir el pipeline visual
$fases_linea_tiempo = ($tipo_dispositivo == "Protesis") ? [
    "Valoración", "Cotización", "Espera Componentes", "Prueba Ajuste", "Fisioterapia y Marcha"
] : [
    "Valoración", "Cotización", "Toma de Molde (Yeso)", "Termoformado", "Entrega Final"
];

// Simulación de una indicación directa enviada desde el panel del médico
$indicacion_medica = [
    "tipo" => "Preparación para toma de molde",
    "mensaje" => "Recuerda asistir con un short cómodo y holgado para la sesión de moldes de yeso de mañana a las 10:00 AM."
];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Seguimiento - Prótesis y Ortesis</title>
    <!-- Vinculación a tu archivo de estilos externo -->
    <link rel="stylesheet" href="Ortesis.css">
</head>
<body>

<div class="nutricion-page">

    <!-- HEADER -->
    <div class="nutricion-header-new">
        <div class="nutricion-header-top">
            <div class="nutricion-header-left">
                <div class="nutricion-header-icon">🦿</div>
                <div>
                    <h1>Portal de Paciente: Prótesis y Órtesis</h1>
                    <p class="nutricion-subtitle">Tu proceso de rehabilitación y adaptación digital</p>
                </div>
            </div>
        </div>
    </div>

    <!-- =====================================================
       NUEVO: PIPELINE VISUAL DE PROGRESO (FASES)
       ===================================================== -->
    <div class="plan-resumen-section">
        <h2>📊 Progreso de tu <?php echo ($tipo_dispositivo == "Protesis") ? "Prótesis" : "Órtesis"; ?></h2>
        <p class="section-subtitle">Conoce en qué etapa se encuentra la fabricación y adaptación de tu dispositivo.</p>
        
        <div class="pipeline-container">
            <?php foreach($fases_linea_tiempo as $index => $fase) { 
                $paso = $index + 1;
                $clase_estado = "";
                if ($paso < $fase_actual_paciente) { $clase_estado = "completed"; }
                elseif ($paso == $fase_actual_paciente) { $clase_estado = "active"; }
            ?>
                <div class="pipeline-step <?php echo $clase_estado; ?>">
                    <div class="step-number"><?php echo $paso; ?></div>
                    <div class="step-text"><?php echo $fase; ?></div>
                </div>
                <?php if($index < count($fases_linea_tiempo) - 1) { ?>
                    <div class="pipeline-line <?php echo ($paso < $fase_actual_paciente) ? 'completed' : ''; ?>"></div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>

    <br>

    <!-- =====================================================
       NUEVO: CASILLA DE INDICACIONES MÉDICAS RECIENTES
       ===================================================== -->
    <?php if($indicacion_medica) { ?>
        <div class="indicacion-urgente-card">
            <div class="indicacion-icon">🔔</div>
            <div class="indicacion-body">
                <h3>Indicación del Médico: <span class="tag-indicacion"><?php echo $indicacion_medica['tipo']; ?></span></h3>
                <p><?php echo $indicacion_medica['mensaje']; ?></p>
            </div>
        </div>
        <br>
    <?php } ?>

    <div class="nutricion-content">

        <!-- CALENDARIO & CHAT GRID -->
        <div class="plan-resumen-section">
            <div class="plan-resumen-header">
                <h2>📅 Tu agenda y comunicación</h2>
                <span class="plan-especialista">Especialista asignado en línea</span>
            </div>

            <div class="calendar-layout">
                <!-- CALENDARIO -->
                <div class="calendar-card">
                    <div class="calendar-header">
                        <button class="calendar-arrow">‹</button>
                        <h3>Mayo 2026</h3>
                        <button class="calendar-arrow">›</button>
                    </div>

                    <div class="calendar-days">
                        <div>L</div><div>M</div><div>M</div><div>J</div><div>V</div><div>S</div><div>D</div>
                    </div>

                    <div class="calendar-grid">
                        <div class="calendar-day empty"></div>
                        <div class="calendar-day empty"></div>
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
                        <div class="calendar-day">11</div>
                    </div>

                    <div class="calendar-info">
                        <div class="calendar-appointment">
                            <span class="appointment-dot"></span>
                            <div>
                                <strong>Cita de revisión y ajuste</strong>
                                <p>4 Mayo - 10:00 AM</p>
                            </div>
                        </div>
                    </div>
                    <button class="calendar-btn-main">Agendar nueva cita</button>
                </div>

                <!-- CHAT -->
                <div class="chat-card">
                    <div class="chat-header">
                        <h3>💬 Chat directo con Protesista</h3>
                        <span class="chat-status">En línea</span>
                    </div>

                    <div class="chat-body">
                        <div class="chat-message specialist">
                            <p>Hola, ¿cómo te has sentido con la prótesis?</p>
                        </div>
                        <div class="chat-message patient">
                            <p>Tengo un poco de presión al caminar.</p>
                        </div>
                        <div class="chat-message specialist">
                            <p>¿Existe dolor o solamente presión?</p>
                        </div>
                    </div>

                    <div class="chat-input-container">
                        <input type="text" placeholder="Escribe un mensaje al especialista..." class="chat-input">
                        <button class="chat-send-btn">➤</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- REPORTE DE MOLESTIAS (ACTUALIZADO CON FORMATO DE ALERTA MÉDICA) -->
        <div class="comida-card-paciente">
            <div class="comida-card-header">
                <div class="comida-tipo-info">
                    <div class="comida-icono">🩺</div>
                    <div>
                        <h2>Módulo de Reporte de Molestias</h2>
                        <p>Notifica directo al expediente médico si detectas irregularidades.</p>
                    </div>
                </div>
            </div>

            <!-- Caja de Advertencia Médica Directa -->
            <div class="alerta-lesion-box">
                <strong>⚠️ ¡Atención Importante antes de reportar!</strong>
                <p>Si notas bultos, llagas abiertas, ampollas o enrojecimiento persistente que no quita tras 15 minutos de retirar tu dispositivo, por favor deja de usarlo y sube una foto aquí mismo para tu revisión prioritaria.</p>
            </div>

            <div class="opciones-grid-paciente">
                <div class="opcion-card-paciente">
                    <h3>Describe detalladamente tu molestia</h3>
                    <textarea class="textarea-protesis" placeholder="Ej: Siento un bulto/roce constante en la zona lateral del muñón o la rodilla desde hace dos días..."></textarea>
                </div>

                <div class="opcion-card-paciente">
                    <h3>Evidencia fotográfica (Recomendado)</h3>
                    <div class="file-upload-wrapper">
                        <input type="file" id="file-foto">
                        <p style="margin-top: 10px; color: #555; font-size: 0.85rem;">Las fotos de la piel ayudan al protesista a calibrar modificaciones del socket o plantilla sin lastimarte.</p>
                    </div>
                </div>
            </div>

            <button class="calendar-btn-main btn-reporte-critico">🚀 Enviar Reporte Médico Prioritario</button>
        </div>

        <!-- CALZADO -->
        <div class="calzado-section">
            <div class="section-header">
                <h2>👟 Modelos de Calzado Autorizados para tu Plan</h2>
            </div>

            <div class="calzado-grid">
                <?php foreach($calzados as $calzado){ ?>
                <div class="calzado-card">
                    <div class="calzado-img">👟</div>
                    <h3><?php echo $calzado; ?></h3>
                    <p>Cumple con las especificaciones de soporte y suela antiderrapante recomendada.</p>
                    <button class="calzado-btn">Ver detalles estructurales</button>
                </div>
                <?php } ?>
            </div>
        </div>

        <!-- INFORMACIÓN Y VIDEOS DE GUÍA -->
        <div class="recomendaciones-section">
            <h2> Manual de Cuidados y Videotutoriales de Apoyo</h2>
            <p class="section-subtitle" style="margin-bottom: 20px;">Consulta el material educativo autorizado por tu especialista.</p>
            
            <div class="plan-comidas-list">
                <?php foreach($dudas_y_cuidados as $duda){ ?>
                <div class="food-suggestion-item c-card-item">
                    <div class="c-card-content">
                        <span class="food-name"><?php echo $duda["titulo"]; ?></span>
                        <span class="food-description"><?php echo $duda["descripcion"]; ?></span>
                    </div>
                    <?php if(isset($duda["video_url"])) { ?>
                        <a href="<?php echo $duda["video_url"]; ?>" target="_blank" class="btn-video-link">
                            ▶️ Ver Video Guía
                        </a>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
        </div>

    </div>
</div>

</body>
</html>