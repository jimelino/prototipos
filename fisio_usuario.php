<?php
session_start();

// ==========================================================================
// 1. DATOS RECIBIDOS DIRECTAMENTE DEL PERFIL DE LA DOCTORA (GABY)
// ==========================================================================
$datos_fisioterapia_paciente = [
    "paciente" => "Carlos Mendoza",
    "fase_actual" => 2, // 1, 2, 3 o 4 (Viene de lo que la doctora actualiza)
    "ejercicios_completados" => 2, 
    
    // Ejercicios dinámicos según lo que manda la doctora
    "ejercicios_casa" => [
        "Dar masajes suaves en círculos alrededor de tu cicatriz para que no se sienta tan dura.",
        "Mover tu pierna de arriba a abajo despacio mientras estás acostado.",
        "Apretar los músculos del muslo durante 5 segundos y luego relajar (hazlo 10 veces).",
        "Ponerte tu vendaje de compresión como te enseñamos en la clínica antes de descansar."
    ],
    
    "mensaje_estancamiento" => "", 
    "listo_para_protesis" => false 
];

// Mapeo exacto de las fases compartidas con el módulo de la doctora
$fases_clinicas = [
    1 => [
        "titulo" => "Fase 1: Pre-operatoria / Cuidado Inicial del Muñón",
        "explicacion" => "En esta etapa nos estamos enfocando en cuidar tu herida de la operación, ayudarte a bajar la inflamación y mantener limpia la zona."
    ],
    2 => [
        "titulo" => "Fase 2: Pre-protésica / Fortalecimiento y Desensibilización",
        "explicacion" => "Estamos preparando tu pierna. Hacemos masajes para que la piel se acostumbre al tacto, moldeamos la forma con vendajes y hacemos ejercicios para ganar fuerza."
    ],
    3 => [
        "titulo" => "Fase 3: Protésica Inicial / Entrenamiento de Marcha Adaptada",
        "explicacion" => "¡Empezamos el movimiento! Estamos practicando cómo mantener el equilibrio y dando tus primeros pasos de forma segura en la clínica."
    ],
    4 => [
        "titulo" => "Fase 4: Adaptación Avanzada / Listo para Moldes Finales",
        "explicacion" => "¡Último estirón! Tu pierna ya tiene la fuerza necesaria y estás caminando de forma mucho más independiente. Estás a nada de tu prótesis definitiva."
    ]
];

// Obtener los textos de la fase en la que va el paciente
$fase_info = $fases_clinicas[$datos_fisioterapia_paciente['fase_actual']];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Progreso en Fisioterapia</title>
    
    <style>
        :root {
            --bg-pantalla: #f8fafc; 
            --verde-fisioterapia: #10b981;
            --verde-claro: #d1fae5;
            --verde-oscuro: #064e3b;
            --amarillo-estrella: #fbbf24;
            --blanco: #ffffff;
            --gris-borde: #e2e8f0;
            --texto-oscuro: #0f172a;
        }

        body {
            font-family: 'Segoe UI', system-ui, sans-serif;
            background-color: var(--bg-pantalla);
            color: var(--texto-oscuro);
            margin: 0;
            padding: 0;
            line-height: 1.5;
        }

        .barra-superior {
            background-color: var(--blanco);
            border-bottom: 1px solid var(--gris-borde);
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .titulo-modulo {
            font-size: 18px;
            font-weight: bold;
            color: var(--verde-fisioterapia);
        }

        .nombre-usuario {
            background-color: var(--verde-claro);
            color: var(--verde-oscuro);
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
        }

        .contenedor {
            max-width: 650px;
            margin: 30px auto;
            padding: 0 20px;
        }

        /* Racha Bonita */
        .tarjeta-racha-moderna {
            background: linear-gradient(135deg, #fffaec 0%, #fff3d1 100%);
            border: 1px solid #fde68a;
            border-radius: 20px;
            padding: 25px 20px;
            text-align: center;
            box-shadow: 0 10px 15px -3px rgba(251, 191, 36, 0.1);
            margin-bottom: 25px;
        }

        .titulo-racha {
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #b45309;
            font-weight: 700;
            margin: 0 0 15px 0;
        }

        .contenedor-medallas {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-bottom: 15px;
        }

        .circulo-estrella {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            background-color: var(--blanco);
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
        }

        .circulo-estrella.activa {
            background-color: var(--amarillo-estrella);
            color: var(--blanco);
            text-shadow: 0 2px 4px rgba(0,0,0,0.15);
            transform: scale(1.1);
        }

        .circulo-estrella.inactiva {
            color: #cbd5e1;
            background-color: #f1f5f9;
        }

        .subtexto-racha {
            font-size: 14.5px;
            color: #78350f;
            margin: 10px 0 0 0;
            font-weight: 500;
        }

        /* Tarjetas Base */
        .tarjeta-progreso {
            background-color: var(--blanco);
            border-radius: 16px;
            padding: 22px;
            border: 1px solid var(--gris-borde);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.01);
            margin-bottom: 20px;
        }

        .tarjeta-progreso h3 {
            margin-top: 0;
            font-size: 16px;
            color: var(--texto-oscuro);
            border-bottom: 2px solid #f1f5f9;
            padding-bottom: 8px;
            margin-bottom: 15px;
        }

        .lista-ejercicios {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .ejercicio-item {
            background-color: #f8fafc;
            border-left: 4px solid var(--verde-fisioterapia);
            padding: 12px 15px;
            margin-bottom: 10px;
            border-radius: 0 8px 8px 0;
            font-size: 14.5px;
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .check-icono {
            color: var(--verde-fisioterapia);
            font-weight: bold;
        }
    </style>
</head>
<body>

    <!-- MENÚ SUPERIOR -->
    <header class="barra-superior">
        <div class="nombre-usuario">👤 <?php echo $datos_fisioterapia_paciente['paciente']; ?></div>
    </header>

    <div class="contenedor">

        <!-- MEDALLERO BONITO DE RACHAS -->
        <div class="tarjeta-racha-moderna">
            <p class="titulo-racha">Mi fase actual✨</p>
            <div class="contenedor-medallas">
                <?php 
                for ($i = 1; $i <= 4; $i++) {
                    if ($i <= $datos_fisioterapia_paciente['ejercicios_completados']) {
                        echo '<div class="circulo-estrella activa">★</div>';
                    } else {
                        echo '<div class="circulo-estrella inactiva">★</div>';
                    }
                }
                ?>
            </div>
            <p class="subtexto-racha">
                ¡Excelente esfuerzo! Te encuentras en la etapa  <strong><?php echo $datos_fisioterapia_paciente['ejercicios_completados']; ?> de 4</strong> 
            </p>
        </div>

        <!-- ¿EN QUÉ ETAPA VOY? (Amarrado 100% al perfil médico de la doctora) -->
        <div class="tarjeta-progreso">
            </p>
            <!-- Explicación amigable para que el paciente entienda de verdad de qué trata -->
            <p style="margin: 10px 0 0 0; font-size: 14px; color: #475569; line-height: 1.6;">
                <strong>¿De qué trata esta etapa?:</strong> <?php echo $fase_info['explicacion']; ?>
            </p>
        </div>

        <!-- MIS EJERCICIOS EN CASA -->
        <div class="tarjeta-progreso">
            <h3>Mis ejercicios en casa</h3>
            <p style="font-size: 13px; color: #64748b; margin-top: -10px; margin-bottom: 15px;">
                Realiza estos movimientos despacio y a tu propio ritmo:
            </p>
            
            <ul class="lista-ejercicios">
                <?php foreach ($datos_fisioterapia_paciente['ejercicios_casa'] as $ejercicio): ?>
                    <li class="ejercicio-item">
                        <span class="check-icono">✓</span>
                        <div><?php echo $ejercicio; ?></div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

    </div>

</body>
</html>