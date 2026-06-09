<?php
session_start();

// Datos simulados de los estatus de los pacientes (las tarjetas del tablero de abajo)
$estatus_pacientes = [
    [
        "nombre" => "Carlos Mendoza",
        "edad" => 45,
        "situacion" => "Bilateral",
        "laboratorios" => "Colesterol Alto (260 mg/dL)",
        "restricciones" => ["Atención Vascular: No exigir más del 10% de esfuerzo al corazón. Evitar sobreesfuerzos físicos.", "Control de Presión: Monitorear la presión arterial de forma obligatoria antes de movilizar."]
    ],
    [
        "nombre" => "María Elena Ríos",
        "edad" => 62,
        "situacion" => "Miembro Izquierdo",
        "laboratorios" => "Normal",
        "restricciones" => []
    ],
    [
        "nombre" => "Carlos Mendoza",
        "edad" => 68,
        "situacion" => "Miembro Derecho",
        "laboratorios" => "presion baja",
        "restricciones" => ["Control de Presión: Monitorear la presión arterial de forma obligatoria antes de movilizar."]
    ]
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Interclínica - Área de Medicina</title>
    <style>
        body {
            font-family: 'Segoe UI', system-ui, sans-serif;
            background-color: #f8fafc;
            margin: 0;
            padding: 0;
            color: #1e293b;
        }

        .navbar {
            background-color: #1e40af;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h1 { margin: 0; font-size: 20px; font-weight: 700; }
        .badge-monitoreo { background-color: #ef4444; padding: 4px 10px; border-radius: 12px; font-size: 12px; font-weight: bold; }

        .container { max-width: 1200px; margin: 25px auto; padding: 0 20px; }

        .panel-principal {
            background-color: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.05);
            border: 1px solid #e2e8f0;
            margin-bottom: 30px;
        }

        .panel-principal h2 { color: #1e3a8a; font-size: 18px; margin-top: 0; display: flex; align-items: center; gap: 8px; font-weight: 700; }

        .form-group { margin-bottom: 15px; display: flex; flex-direction: column; gap: 5px; }
        .form-group label { font-size: 13.5px; font-weight: bold; color: #334155; }
        .form-control { padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; background-color: white; font-family: inherit; font-size: 14px; }

        /* NUEVA SECCIÓN DE SIGNOS VITALES INTEGRADA */
        .seccion-signos-inputs {
            background-color: #f0f4f8;
            border: 1px solid #d9e2ec;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
        }
        .seccion-signos-inputs h4 { margin: 0 0 12px 0; color: #1e3a8a; font-size: 14px; font-weight: bold; }
        .grid-signos-inputs { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; }

        .box-alertas-clinicas {
            background-color: #fff5f5;
            border: 1px solid #fee2e2;
            border-left: 4px solid #ef4444;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        .box-alertas-clinicas h4 { margin: 0 0 10px 0; color: #991b1b; font-size: 13.5px; font-weight: bold; }
        .checkbox-group { display: flex; flex-direction: column; gap: 8px; margin-bottom: 12px; font-size: 13.5px; }
        .checkbox-group label { display: flex; align-items: center; gap: 8px; font-weight: normal; cursor: pointer; }

        .btn-submit {
            background-color: #2563eb;
            color: white;
            border: none;
            width: 100%;
            padding: 12px;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
        }
        .btn-submit:hover { background-color: #1d4ed8; }

        /* Tablero de Estatus General de abajo */
        .seccion-estatus h3 { font-size: 18px; color: #1e3a8a; margin-bottom: 5px; font-weight: 700; }
        .seccion-estatus p.subtitulo { font-size: 13px; color: #64748b; margin: 0 0 20px 0; }
        .grid-estatus { display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 20px; }
        
        .card-paciente {
            background-color: white;
            border-radius: 12px;
            padding: 20px;
            border-top: 4px solid #cbd5e1;
            position: relative;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.05);
            border-left: 1px solid #e2e8f0;
            border-right: 1px solid #e2e8f0;
            border-bottom: 1px solid #e2e8f0;
        }
        .card-paciente.alerta { border-top-color: #ef4444; }
        .card-paciente.ok { border-top-color: #10b981; }
        .card-paciente.warning { border-top-color: #f59e0b; }

        .card-paciente h4 { margin: 0 0 10px 0; font-size: 16px; color: #1e3a8a; font-weight: 700; }
        .card-paciente p { margin: 5px 0; font-size: 13px; color: #334155; }
        .card-paciente p strong { color: #0f172a; }
        
        .box-restriccion {
            background-color: #fef2f2;
            border: 1px solid #fee2e2;
            padding: 12px;
            border-radius: 6px;
            margin-top: 15px;
            font-size: 12.5px;
            color: #b91c1c;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <h1>Sistema Área de Medicina</h1>
        <div class="badge-monitoreo">Estatus Monitoreados: 3</div>
    </nav>

    <div class="container">
        
        <div class="panel-principal">
            <h2>Panel de Diagnóstico y Actualización de Alertas</h2>
            
            <form action="" method="POST">
                <div class="form-group">
                    <label>Seleccionar Paciente de la Consulta:</label>
                    <select class="form-control">
                        <option>-- Seleccione un paciente en lista para actualizar --</option>
                        <option selected>Carlos Mendoza (68 años) - Miembro Derecho</option>
                        <option>María Elena Ríos (62 años)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Estudios de Laboratorio de Cuidado Vascular (Colesterol/Lípidos):</label>
                    <input type="text" class="form-control" placeholder="Ej. Colesterol elevado, Lípidos fuera de rango, etc." value="presion baja">
                </div>

                <div class="seccion-signos-inputs">
                    <h4>Registro de Signos Vitales (Enfermería/Médico hoy):</h4>
                    <div class="grid-signos-inputs">
                        <div class="form-group">
                            <label>Presión Arterial (mmHg):</label>
                            <input type="text" class="form-control" name="presion" placeholder="Ej. 120/80" value="120/80">
                        </div>
                        <div class="form-group">
                            <label>Frecuencia Cardíaca (lpm):</label>
                            <input type="text" class="form-control" name="corazon" placeholder="Ej. 72" value="72">
                        </div>
                        <div class="form-group">
                            <label>Temperatura (°C):</label>
                            <input type="text" class="form-control" name="temperatura" placeholder="Ej. 36.6" value="36.6">
                        </div>
                        <div class="form-group">
                            <label>Oxigenación (%):</label>
                            <input type="text" class="form-control" name="oxigeno" placeholder="Ej. 98" value="98">
                        </div>
                    </div>
                </div>

                <div class="box-alertas-clinicas">
                    <h4>Configuration de Advertencias Clínicas:</h4>
                    <div class="checkbox-group">
                        <label><input type="checkbox"> Paciente Hipertenso (Presión arterial inestable)</label>
                        <label><input type="checkbox"> Paciente Vascular / Complicación en Corazón</label>
                    </div>
                    
                    <label style="font-size: 13px; font-weight: bold; color: #991b1b;">Escribir otra condición médica o especificación de salud:</label>
                    <textarea class="form-control" rows="2" placeholder="Ej. Padece diabetes mellitus, insuficiencia arterial, úlceras por presión, alergias...">Monitorear la presión arterial de forma obligatoria antes de movilizar.</textarea>
                </div>

                <div class="form-group">
                    <label>Notas de la Cita:</label>
                    <textarea class="form-control" rows="2">Tu herida de la operación va sanando muy bien y no hay señales de infección</textarea>
                </div>

                <div class="form-group">
                    <label>Indicaciones:</label>
                    <textarea class="form-control" rows="3">1. Mantén tu pierna levantada sobre unas almohadas cuando estés descansando para que no se hinche.
2. Lava la zona de tu operación todos los días usando solo agua limpia y jabón neutro
3. Mantén el vendaje limpio y seco entre cada lavada.</textarea>
                </div>

                <button type="submit" class="btn-submit">Actualizar Estado y Notificar a las Áreas</button>
            </form>
        </div>

        <div class="seccion-estatus">
            <h3>Tablero de Estatus General</h3>
            <p class="subtitulo">Módulo de semáforo médico en tiempo real para evitar riesgos cardiovasculares durante ejercicios o tomas de moldes.</p>
            
            <div class="grid-estatus">
                <?php foreach($estatus_pacientes as $p): ?>
                    <?php 
                        $clase = "ok";
                        if(count($p['restricciones']) > 0) {
                            $clase = ($p['nombre'] == "Carlos Mendoza" && $p['situacion'] == "Miembro Derecho") ? "warning" : "alerta";
                        }
                    ?>
                    <div class="card-paciente <?php echo $clase; ?>">
                        <?php if(count($p['restricciones']) > 0): ?>
                            <span style="position:absolute; right:20px; top:20px;">⚠️</span>
                        <?php endif; ?>
                        
                        <h4><?php echo $p['nombre']; ?></h4>
                        <p><strong>Edad del Paciente:</strong> <?php echo $p['edad']; ?> años</p>
                        <p><strong>Situación del Miembro:</strong> <?php echo $p['situacion']; ?></p>
                        <p><strong>Historial de Laboratorios:</strong> <?php echo $p['laboratorios']; ?></p>
                        
                        <?php if(count($p['restricciones']) > 0): ?>
                            <div class="box-restriccion">
                                <strong style="display:block; margin-bottom:5px; font-size:11px; text-transform:uppercase;">🔴 RESTRICCIÓN DE ATENCIÓN:</strong>
                                .
                                <?php foreach($p['restricciones'] as $res): ?>
                                    <div style="margin-top:6px; font-size:12px; line-height:1.4;"><?php echo $res; ?></div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</body>
</html>