<?php

$metas = [
    "calorias" => 2200,
    "proteinas" => 120,
    "carbos" => 250,
    "grasas" => 70
];

$equivalentes = [
    [
        "grupo" => "Frutas",
        "cantidad" => "3 equivalentes",
        "alimentos" => [
            "Manzana",
            "Plátano",
            "Papaya"
        ]
    ],

    [
        "grupo" => "Cereales",
        "cantidad" => "5 equivalentes",
        "alimentos" => [
            "Tortilla",
            "Pan integral",
            "Avena"
        ]
    ],

    [
        "grupo" => "Proteínas",
        "cantidad" => "4 equivalentes",
        "alimentos" => [
            "Pollo",
            "Atún",
            "Huevo"
        ]
    ],

    [
        "grupo" => "Grasas",
        "cantidad" => "2 equivalentes",
        "alimentos" => [
            "Aguacate",
            "Nueces",
            "Aceite de oliva"
        ]
    ]
];

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Nutrición - Prototipo</title>

    <link rel="stylesheet" href="Nutricion.css">

</head>

<body>

<div class="nutricion-page">

    <!-- HEADER -->
    <div class="nutricion-header-new">

        <div class="nutricion-header-top">

            <div class="nutricion-header-left">

                <div class="nutricion-header-icon">
                    🥗
                </div>

                <div class="nutricion-header-text">
                    <h1>Nutrición</h1>
                    <p class="nutricion-subtitle">
                        Plan diario de alimentación
                    </p>
                </div>

            </div>

            <button class="nutricion-calendar-btn">
                📅
            </button>

        </div>

        <div class="nutricion-date-nav">

            <button class="nutricion-date-arrow">
                ‹
            </button>

            <div class="nutricion-date-display">

                <div class="nutricion-date-text">
                    Hoy
                </div>

                <div class="nutricion-date-full">
                    Lunes 26 Mayo
                </div>

            </div>

            <button class="nutricion-date-arrow">
                ›
            </button>

        </div>

    </div>

    <!-- CONTENIDO -->
    <div class="nutricion-content">

        <!-- METAS -->
        <div class="plan-resumen-section">

            <div class="plan-resumen-header">

                <h2>
                    🎯 Metas Diarias
                </h2>

                <span class="plan-especialista">
                    Nutriólogo asignado
                </span>

            </div>

            <div class="plan-macros-grid">

                <div class="plan-macro-card calorias">

                    <div class="plan-macro-icon">
                        🔥
                    </div>

                    <div class="plan-macro-info">

                        <span class="plan-macro-value">
                            <?php echo $metas["calorias"]; ?>
                        </span>

                        <span class="plan-macro-label">
                            Calorías
                        </span>

                    </div>

                </div>

                <div class="plan-macro-card proteinas">

                    <div class="plan-macro-icon">
                        🍗
                    </div>

                    <div class="plan-macro-info">

                        <span class="plan-macro-value">
                            <?php echo $metas["proteinas"]; ?>g
                        </span>

                        <span class="plan-macro-label">
                            Proteínas
                        </span>

                    </div>

                </div>

                <div class="plan-macro-card carbos">

                    <div class="plan-macro-icon">
                        🍞
                    </div>

                    <div class="plan-macro-info">

                        <span class="plan-macro-value">
                            <?php echo $metas["carbos"]; ?>g
                        </span>

                        <span class="plan-macro-label">
                            Carbohidratos
                        </span>

                    </div>

                </div>

                <div class="plan-macro-card grasas">

                    <div class="plan-macro-icon">
                        🥑
                    </div>

                    <div class="plan-macro-info">

                        <span class="plan-macro-value">
                            <?php echo $metas["grasas"]; ?>g
                        </span>

                        <span class="plan-macro-label">
                            Grasas
                        </span>

                    </div>

                </div>

            </div>

        </div>

        <!-- EQUIVALENTES -->
        <div class="plan-comidas-section">

            <div class="section-header">

                <h2>
                    🥗 Alimentos Equivalentes
                </h2>

            </div>

            <div class="plan-comidas-list">

                <?php foreach($equivalentes as $eq){ ?>

                <details class="plan-comida-item">

                    <summary class="plan-comida-header">

                        <div class="plan-comida-icon">
                            🍽️
                        </div>

                        <div class="plan-comida-title">

                            <span class="plan-comida-nombre">
                                <?php echo $eq["grupo"]; ?>
                            </span>

                            <span class="plan-comida-count">
                                <?php echo $eq["cantidad"]; ?>
                            </span>

                        </div>

                        <div class="plan-comida-chevron">
                            ▼
                        </div>

                    </summary>

                    <div class="plan-comida-body">

                        <?php foreach($eq["alimentos"] as $alimento){ ?>

                        <div class="plan-comida-grupo">

                            <div class="plan-comida-grupo-dot"
                                 style="background:#2E7D32;">
                            </div>

                            <span class="plan-comida-grupo-nombre">
                                <?php echo $alimento; ?>
                            </span>

                            <span class="plan-comida-grupo-cant">
                                1 porción
                            </span>

                        </div>

                        <?php } ?>

                    </div>

                </details>

                <?php } ?>

            </div>

        </div>

        <!-- RECOMENDACIONES -->
        <div class="indicaciones-section">

            <h3>
                ✅ Recomendaciones
            </h3>

            <ul class="indicaciones-list-paciente">

                <li>
                    Consumir agua constantemente durante el día.
                </li>

                <li>
                    Evitar alimentos ultra procesados.
                </li>

                <li>
                    Mantener horarios de comida estables.
                </li>

                <li>
                    Priorizar verduras y frutas frescas.
                </li>

            </ul>

        </div>

        <!-- RECETAS -->
        <div class="mi-plan-recetas-section">

            <h3 class="mi-plan-section-title">
                🍳 Recetas sugeridas
            </h3>

            <div class="mi-plan-recetas-grid">

                <div class="mi-plan-receta-card">

                    <img
                        src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c"
                        class="mi-plan-receta-img"
                    >

                    <div class="mi-plan-receta-body">

                        <h4 class="mi-plan-receta-nombre">
                            Ensalada Balanceada
                        </h4>

                        <span class="mi-plan-receta-tipo">
                            Almuerzo
                        </span>

                        <div class="mi-plan-receta-macros">

                            <span>🔥 320 kcal</span>
                            <span>🍗 25g proteína</span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>