<?php
session_start();

// ==========================================================================
// 1. SIMULACIÓN DE BASE DE DATOS (PACIENTES DE LA CLÍNICA)
// ==========================================================================
$pacientes = [
    [
        "id" => 1,
        "nombre" => "Don Carlos Mendoza",
        "fase_actual" => 2,
        "estrellas" => 3,
        "ultimo_comentario" => "Va muy bien, ya tolera mejor el vendaje de compresión."
    ],
    [
        "id" => 2,
        "nombre" => "Doña María Elena Ríos",
        "fase_actual" => 1,
        "estrellas" => 5,
        "ultimo_comentario" => "Vigilar que la cicatriz esté completamente cerrada antes de avanzar."
    ]
];

$fases_disponibles = [
    1 => "Fase 1: Pre-operatoria / Cuidado Inicial",
    2 => "Fase 2: Pre-protésica / Fortalecimiento",
    3 => "Fase 3: Protésica Inicial / Primeros pasos",
    4 => "Fase 4: Adaptación Avanzada / Moldes Finales"
];

// Simulamos una tabla de notificaciones enviadas para el sistema interconectado
$notificaciones_areas = [
    ["fecha" => "Hoy - 10:30 AM", "area" => "Taller de Prótesis", "mensaje" => "El paciente Don Juan Pablo Gómez avanzó a la Fase 4. Favor de preparar simulación de molde definitivo."],
    ["fecha" => "Ayer - 04:15 PM", "area" => "Médico General", "mensaje" => "Doña María Elena Ríos inició Fase 1. Monitorear estado general de salud post-operatoria."]
];

$mensaje_sistema = "";
$notificacion_enviada = null;

// ==========================================================================
// 2. LÓGICA CUANDO LA DOCTORA GUARDA CAMBIOS
// ==========================================================================
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paciente_id = $_POST['paciente_id'];
    $nueva_fase = $_POST['nueva_fase'];
    
    // Buscamos el nombre del paciente afectado para la notificación
    $nombre_p = ($paciente_id == 1) ? "Don Carlos Mendoza" : "Doña María Elena Ríos";
    $texto_fase = $fases_disponibles[$nueva_fase];

    $mensaje_sistema = "¡Cambios guardados en el expediente de $nombre_p!";
    
    // Creamos la alerta que viajará hacia las otras áreas del sistema
    $notificacion_enviada = [
        "area_destino" => ($nueva_fase == 4) ? "Taller de Prótesis (Prioridad Alta)" : "Coordinación Médica y Áreas Interconectadas",
        "detalle" => "AVISO: El paciente <strong>$nombre_p</strong> ha sido movido a la <strong>$texto_fase</strong>. Favor de actualizar sus agendas y preparativos correspondientes."
    ];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Fisioterapia - Dra. Gaby</title>
    
    <style>
        :root {
            --bg-pantalla: #f1f5f9; 
            --verde-fisioterapia: #059669;
            --verde-claro: #d1fae5;
            --verde-oscuro: #064e3b;
            --blanco: #ffffff;
            --gris-borde: #cbd5e1;
            --texto-oscuro: #0f172a;
            --azul-alerta: #e0f2fe;
            --azul-texto: #0369a1;
        }

        body {
            font-family: 'Segoe UI', system-ui, sans-serif;
            background-color: var(--bg-pantalla);
            color: var(--texto-oscuro);
            margin: 0;
            padding: 0;
            line-height: 1.5;
        }

        .barra-doctora {
            background-color: var(--verde-oscuro);
            color: var(--blanco);
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .titulo-panel {
            font-size: 18px;
            font-weight: bold;
        }

        .contenedor {
            max-width: 900px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .bienvenida h2 { margin: 0; color: var(--texto-oscuro); }
        .bienvenida p { margin: 5px 0 25px 0; color: #64748b; }

        /* Alertas del Sistema */
        .alerta-exito {
            background-color: var(--verde-claro);
            border: 1px solid var(--verde-fisioterapia);
            color: var(--verde-oscuro);
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .alerta-notificacion-area {
            background-color: var(--azul-alerta);
            border-left: 5px solid #0284c7;
            color: #0c4a6e;
            padding: 15px;
            border-radius: 0 8px 8px 0;
            margin-bottom: 25px;
            font-size: 14.5px;
        }

        /* Tarjeta Paciente */
        .tarjeta-paciente {
            background-color: var(--blanco);
            border: 1px solid var(--gris-borde);
            border-radius: 16px;
            padding: 20px;
            margin-bottom: 20px;
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }

        @media (min-width: 768px) {
            .tarjeta-paciente { grid-template-columns: 1fr 1.5fr; }
        }

        .info-actual { border-bottom: 1px solid #f1f5f9; padding-bottom: 15px; }
        @media (min-width: 768px) {
            .info-actual { border-bottom: none; border-right: 2px solid #f1f5f9; padding-right: 20px; padding-bottom: 0; }
        }

        .nombre-paciente { font-size: 18px; font-weight: bold; margin: 0 0 8px 0; }
        .etiqueta-fase { display: inline-block; background-color: #f1f5f9; padding: 4px 8px; border-radius: 6px; font-size: 13px; font-weight: 600; }

        .formulario-control { display: flex; flex-direction: column; gap: 12px; }
        .grupo-campo { display: flex; flex-direction: column; gap: 5px; }
        .grupo-campo label { font-size: 13.5px; font-weight: 600; color: #475569; }
        
        .control-input {
            font-family: inherit; padding: 8px 12px; border: 1px solid var(--gris-borde); border-radius: 8px; background-color: #f8fafc;
        }

        .btn-guardar {
            background-color: var(--verde-fisioterapia); color: var(--blanco); border: none; padding: 10px 16px; font-weight: bold; border-radius: 8px; cursor: pointer; align-self: flex-end;
        }

        /* ==========================================================================
           NUEVO BLOQUE: SECCIÓN DE AVISOS INTERNOS ENTRE ÁREAS
           ========================================================================== */
        .bloque-notificaciones {
            background-color: var(--blanco);
            border: 1px solid var(--gris-borde);
            border-radius: 16px;
            padding: 20px;
            margin-top: 30px;
        }

        .bloque-notificaciones h3 { margin-top: 0; color: #334155; font-size: 16px; border-bottom: 1px solid #f1f5f9; padding-bottom: 10px; }

        .tabla-notificaciones { width: 100%; border-collapse: collapse; font-size: 13.5px; }
        .tabla-notificaciones th { text-align: left; padding: 8px; color: #64748b; font-weight: 600; }
        .tabla-notificaciones td { padding: 10px 8px; border-bottom: 1px solid #f1f5f9; }
        .badge-area { background-color: #f3e8ff; color: #6b21a8; padding: 3px 8px; border-radius: 4px; font-weight: 600; font-size: 12px; }
    </style>
</head>
<body>

    <header class="barra-doctora">
        <div class="titulo-panel">Control de Fisioterapia y Rehabilitación</div>
        <div>Dra. Gaby</div>
    </header>

    <div class="contenedor">

        <div class="bienvenida">
            <h2>Panel de Seguimiento Clínico</h2>
            <p>Al guardar cambios, el sistema enviará en automático un aviso a los departamentos involucrados.</p>
        </div>

        <!-- MENSAJE DE ÉXITO AL GUARDAR EXPENDIENTE -->
        <?php if (!empty($mensaje_sistema)): ?>
            <div class="alerta-exito">✓ <?php echo $mensaje_sistema; ?></div>
        <?php endif; ?>

        <!-- SIMULACIÓN EN TIEMPO REAL DEL AVISO SALIENTE A OTRAS ÁREAS -->
        <?php if ($notificacion_enviada): ?>
            <div class="alerta-notificacion-area">
                <strong>Notificación Automática Enviada a:</strong> <span style="text-decoration: underline; font-weight: bold;"><?php echo $notificacion_enviada['area_destino']; ?></span><br>
                <span style="font-size: 13.5px; display:inline-block; margin-top:5px;"><?php echo $notificacion_enviada['detail'] ?? $notificacion_enviada['detalle']; ?></span>
            </div>
        <?php endif; ?>

        <!-- LISTA DE PACIENTES -->
        <main class="seccion-pacientes">
            <?php foreach ($pacientes as $paciente): ?>
                <div class="tarjeta-paciente">
                    
                    <div class="info-actual">
                        <p class="nombre-paciente"><?php echo $paciente['nombre']; ?></p>
                        <div class="etiqueta-fase">Actual: <?php echo $fases_disponibles[$paciente['fase_actual']]; ?></div>
                        <p style="font-size: 13px; color: #64748b; margin-top: 15px;"><strong>Último apunte:</strong><br>"<?php echo $paciente['ultimo_comentario']; ?>"</p>
                    </div>

                    <form action="" method="POST" class="formulario-control">
                        <input type="hidden" name="paciente_id" value="<?php echo $paciente['id']; ?>">
                        
                        <div class="grupo-campo">
                            <label>Mover a la Fase:</label>
                            <select name="nueva_fase" class="control-input">
                                <?php foreach ($fases_disponibles as $num => $texto): ?>
                                    <option value="<?php echo $num; ?>" <?php echo ($paciente['fase_actual'] == $num) ? 'selected' : ''; ?>>
                                        <?php echo $texto; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="grupo-campo">
                            <label>Tareas para la casa:</label>
                            <textarea name="nuevos_ejercicios" rows="2" class="control-input">1. Masajes suaves en círculo.&#10;2. Mover la pierna de arriba a abajo despacio.</textarea>
                        </div>

                        <button type="submit" class="btn-guardar">Guardar y Notificar Áreas</button>
                    </form>

                </div>
            <?php endforeach; ?>
        </main>

       
                </tbody>
            </table>
        </section>

    </div>

</body>
</html>