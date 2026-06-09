<?php
session_start();

// Datos de los signos vitales
$signos_vitales = [
    "presion" => "120/80",
    "corazon" => "72",
    "temperatura" => "36.6",
    "oxigeno" => "98"
];

// Notas de cuidado en lenguaje sencillo para adultos mayores
$cuidados_casa = [
    "Mantén tu pierna levantada sobre unas almohadas cuando estés descansando para que no se hinche.",
    "Lava la zona de tu operación todos los días usando solo agua limpia y jabón neutro (suave).",
    "Mantén el vendaje limpio y seco entre cada lavada."
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Expediente Médico</title>
    <style>
        :root {
            --primary: #1e40af;
            --primary-light: #eff6ff;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --bg-body: #f8fafc;
            --card-bg: #ffffff;
            --orange-alert: #f97316;
            --orange-bg: #fff7ed;
            --border-color: #e2e8f0;
        }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background-color: var(--bg-body);
            margin: 0;
            padding: 0;
            color: var(--text-main);
            -webkit-font-smoothing: antialiased;
        }

        /* Barra de navegación moderna */
        .navbar {
            background-color: var(--card-bg);
            border-bottom: 1px solid var(--border-color);
            padding: 16px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
        }

        .navbar h1 { 
            font-size: 19px; 
            color: var(--primary); 
            margin: 0; 
            font-weight: 700; 
            letter-spacing: -0.5px;
        }

        .user-tag { 
            background-color: var(--primary-light); 
            color: var(--primary); 
            padding: 8px 16px; 
            border-radius: 9999px; 
            font-size: 13.5px; 
            font-weight: 600; 
            display: flex; 
            align-items: center; 
            gap: 8px;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }

        /* Contenedor principal con grid de alta calidad */
        .main-layout {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 24px;
            display: grid;
            grid-template-columns: 1fr;
            gap: 32px;
        }

        @media (min-width: 768px) {
            .main-layout { grid-template-columns: 1.8fr 1fr; }
        }

        .col-izquierda { 
            display: flex; 
            flex-direction: column; 
            gap: 32px; 
        }

        /* Tarjetas de diseño limpio (Cards) */
        .card-seccion {
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            padding: 32px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -2px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card-seccion h3 { 
            font-size: 16px; 
            color: var(--primary); 
            margin-top: 0; 
            margin-bottom: 20px; 
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Texto clínico estilizado */
        .resumen-texto { 
            font-size: 15px; 
            color: #334155; 
            line-height: 1.7; 
            margin-bottom: 24px;
            background-color: #f8fafc;
            padding: 16px;
            border-radius: 12px;
            border-left: 4px solid var(--primary);
        }

        .meta-doctor { 
            font-size: 13px; 
            color: var(--text-muted); 
            line-height: 1.6;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 12px;
            padding-top: 8px;
        }

        .meta-item strong {
            color: var(--text-main);
        }

        /* Contenedor de Alertas e Indicaciones */
        .alerta-decorativa { 
            background-color: var(--orange-bg); 
            border: 1px solid #ffedd5;
            border-left: 4px solid var(--orange-alert); 
            border-radius: 12px; 
            padding: 20px; 
        }

        .lista-notas { 
            padding-left: 20px; 
            margin: 0; 
        }

        .lista-notas li { 
            color: #c2410c; 
            font-size: 14.5px; 
            margin-bottom: 14px; 
            line-height: 1.6; 
            font-weight: 500;
        }
        .lista-notas li:last-child { margin-bottom: 0; }

        /* Panel de Signos Vitales (Grid de Componentes Dinámicos) */
        .subtitulo-signos { 
            font-size: 13px; 
            color: var(--text-muted); 
            margin-top: -12px; 
            margin-bottom: 24px; 
        }

        .grid-signos { 
            display: grid; 
            grid-template-columns: repeat(2, 1fr); 
            gap: 16px; 
        }

        .signo-box { 
            background-color: #f8fafc; 
            border: 1px solid var(--border-color); 
            border-radius: 14px; 
            padding: 20px 12px; 
            text-align: center;
            transition: all 0.2s ease;
        }
        
        .signo-box:hover {
            border-color: #cbd5e1;
            background-color: #f1f5f9;
        }

        .signo-label { 
            font-size: 11px; 
            color: var(--text-muted); 
            text-transform: uppercase; 
            font-weight: 700; 
            letter-spacing: 1px;
            margin-bottom: 6px;
        }

        .signo-valor { 
            font-size: 20px; 
            font-weight: 800; 
            color: var(--text-main); 
            display: flex;
            align-items: baseline;
            justify-content: center;
            gap: 2px;
        }

        .signo-unidad { 
            font-size: 12px; 
            color: var(--text-muted); 
            font-weight: 500; 
        }
    </style>
</head>
<body>

    <!-- MENÚ SUPERIOR INTERFAZ BONITA -->
    <nav class="navbar">
        <h1>Mi Expediente Médico</h1>
        <div class="user-tag">
            <span>👤</span> Carlos Mendoza
        </div>
    </nav>

    <!-- CUERPO PRINCIPAL -->
    <div class="main-layout">
        
        <!-- COLUMNA IZQUIERDA -->
        <div class="col-izquierda">
            
            <!-- TARJETA: RESUMEN DE MI OPERACIÓN -->
            <div class="card-seccion">
                <h3>NOTAS DE CITA</h3>
                <div class="resumen-texto">
                    Tu herida de la operación va sanando muy bien y no hay señales de infección
                </div>
                <div class="meta-doctor">
                    <div class="meta-item">Atendido por: <strong>Dra. Maria</strong></div>
                    <div class="meta-item">Fecha de consulta: <strong>02/06/2026</strong></div>
                </div>
            </div>

            <!-- TARJETA: NOTAS IMPORTANTES -->
            <div class="card-seccion">
                <h3>INDICACIONES</h3>
                <div class="alerta-decorativa">
                    <ul class="lista-notas">
                        <?php foreach($cuidados_casa as $cuidado): ?>
                            <li><?php echo $cuidado; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

        </div>

        <!-- COLUMNA DERECHA (SIGNOS VITALES) -->
        <div class="col-derecha">
            <div class="card-seccion">
                <h3>Signos vitales</h3>
                <div class="subtitulo-signos">Registrados por enfermería/médico hoy:</div>
                
                <div class="grid-signos">
                    <!-- PRESIÓN -->
                    <div class="signo-box">
                        <div class="signo-label">Presión</div>
                        <div class="signo-valor">
                            <?php echo $signos_vitales['presion']; ?>
                            <span class="signo-unidad">mmHg</span>
                        </div>
                    </div>
                    <!-- CORAZÓN -->
                    <div class="signo-box">
                        <div class="signo-label">Corazón</div>
                        <div class="signo-valor">
                            <?php echo $signos_vitales['corazon']; ?>
                            <span class="signo-unidad">lpm</span>
                        </div>
                    </div>
                    <!-- TEMPERATURA -->
                    <div class="signo-box">
                        <div class="signo-label">Temperatura</div>
                        <div class="signo-valor">
                            <?php echo $signos_vitales['temperatura']; ?>
                            <span class="signo-unidad">°C</span>
                        </div>
                    </div>
                    <!-- OXÍGENO -->
                    <div class="signo-box">
                        <div class="signo-label">Oxígeno</div>
                        <div class="signo-valor">
                            <?php echo $signos_vitales['oxigeno']; ?>
                            <span class="signo-unidad">%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>
</html>