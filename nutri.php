<?php

$plan = [

    [
        "grupo" => "Cereales",
        "icono" => "🌮",
        "alimento" => "Tortilla",
        "cantidad" => "3 piezas",
        "equivalentes" => [
            "1 taza de arroz",
            "2 rebanadas de pan integral",
            "1 papa mediana",
            "1 taza de pasta"
        ]
    ],

    [
        "grupo" => "Proteínas",
        "icono" => "🍗",
        "alimento" => "Pechuga de pollo",
        "cantidad" => "120g",
        "equivalentes" => [
            "1 lata de atún",
            "2 huevos",
            "100g de carne magra",
            "150g de tofu"
        ]
    ],

    [
        "grupo" => "Frutas",
        "icono" => "🍎",
        "alimento" => "Manzana",
        "cantidad" => "1 pieza",
        "equivalentes" => [
            "1 taza de papaya",
            "1 pera",
            "1 naranja",
            "1 plátano chico"
        ]
    ]

];

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Equivalentes Nutricionales</title>

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

                    <h1>
                        Equivalentes
                    </h1>

                    <p class="nutricion-subtitle">
                        Sustitución inteligente de alimentos
                    </p>

                </div>

            </div>

        </div>

    </div>

    <!-- CONTENIDO -->
    <div class="nutricion-content">

        <!-- INTRO -->
        <div class="indicaciones-section">

            <h3>
                ¿Cómo funciona?
            </h3>

            <ul class="indicaciones-list-paciente">

                <li>
                    Si no tienes el alimento indicado puedes sustituirlo.
                </li>

                <li>
                    Todos los alimentos mostrados tienen equivalencia nutricional similar.
                </li>

                <li>
                    Selecciona la opción que tengas disponible en casa.
                </li>

            </ul>

        </div>

        <!-- TARJETAS -->
        <?php foreach($plan as $item){ ?>

        <div class="comida-card-paciente">

            <!-- HEADER -->
            <div class="comida-card-header">

                <div class="comida-tipo-info">

                    <div class="comida-icono">
                        <?php echo $item["icono"]; ?>
                    </div>

                    <div class="comida-tipo-text">

                        <span class="comida-tipo-label">
                            <?php echo $item["grupo"]; ?>
                        </span>

                        <span class="comida-hora">
                            Alimento asignado
                        </span>

                    </div>

                </div>

                <div class="comida-kcal-pill">
                    <?php echo $item["cantidad"]; ?>
                </div>

            </div>

            <!-- BODY -->
            <div class="opciones-grid-paciente">

                <!-- ALIMENTO PRINCIPAL -->
                <div class="opcion-card-paciente">

                    <div class="opcion-card-top">

                        <span class="opcion-num">
                            Alimento actual
                        </span>

                    </div>

                    <h3 class="opcion-nombre-paciente">
                        <?php echo $item["alimento"]; ?>
                    </h3>

                    <p class="opcion-desc-paciente">

                        Este es el alimento recomendado en tu plan alimenticio.

                    </p>

                </div>

                <!-- EQUIVALENTES -->
                <div class="plan-foods-section">

                    <h4>
                        Puedes sustituir por:
                    </h4>

                    <?php foreach($item["equivalentes"] as $eq){ ?>

                    <div class="food-suggestion-item plan-food from-plan">

                        <div class="food-info">

                            <span class="food-name">
                                <?php echo $eq; ?>
                            </span>

                            <span class="food-description">

                                Equivalente nutricional recomendado

                            </span>

                        </div>


                    </div>

                    <?php } ?>

                </div>

            </div>

        </div>

        <?php } ?>

        <!-- RECOMENDACIONES -->
        <div class="recomendaciones-section">

            <h3>
                Recomendaciones Nutricionales
            </h3>

            <ul class="recomendaciones-list">

                <li>
                    Mantén las porciones recomendadas.
                </li>

                <li>
                    Evita alimentos ultra procesados.
                </li>

                <li>
                    Consume suficiente agua durante el día.
                </li>

                <li>
                    Prioriza alimentos frescos y naturales.
                </li>

            </ul>

        </div>

    </div>

</div>

</body>
</html>