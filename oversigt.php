<?php
/**
 * @var db $db
 */

require "settings/init.php";


// SQL forespørgsel:
// Vi henter ALLE kolonner fra tabellen "History"
// Samtidig henter vi navnet fra tabellen "Workers"
$sql = "
    SELECT History.*, Workers.name
    FROM History
        
    -- INNER JOIN kobler History og Workers sammen
    -- workerId fra History skal være lig id fra Workers
    INNER JOIN Workers ON History.workerId = Workers.id
    
    -- Sorterer resultaterne så de nyeste datoer vises først
    ORDER BY History.date DESC
";

// Her kalder jeg efter databasen med vores SQL og gemmer resultatet med variablen $historyEntries
$historyEntries = $db->sql($sql);
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">
    <title>Rengørings historik</title>
    <link rel="shortcut icon" href="/img/favicon.ico">
    <link href="css/styles.css" rel="stylesheet">
</head>

<body>

<div class="background">
    <img src="img/background-abstract.png" class="backgroundimg" alt="Abstract background img">
    <img src="img/background-abstract.png" class="backgroundimg2" alt="Abstract background img">
</div>

<div class="logo">
    <img src="img/logo.png" class="logoimg" alt="Logo">
</div>


<div class="container mt-50">

    <!-- Overskrift -->
    <div class="text-center mt-5 text-white">
        <h1 class="fs-23">Historik</h1>
    </div>

    <!-- Årstal i toppen -->
    <div class="mb-2 fs-3 text-white">2026</div>

    <?php

    // Starter et foreach loop der køre igennem alt dataen jeg vi i variablen $historyEntries
    foreach ($historyEntries as $entry) {

        // Konverterer datastringen jeg for fra databasen til et timestamp med strtotime()
        // Herefter bruger jeg date() til at udtrække kun timer/minutter og dag/måned fra vores database
        $tid = date("H:i", strtotime($entry->date));
        $dato = date("d.m", strtotime($entry->date));
        ?>

        <div class="d-flex justify-space-between align-items-center text-white bg-primary rounded-3 p-3 mb-3 fs-2" >
            <!-- Viser tidspunkt -->
            <div><?php echo $tid; ?></div>

            <!-- Viser medarbejderens navn -->
            <div class="flex-grow-1 px-5"><?php echo $entry->name; ?></div>

            <!-- Viser dato -->
            <div><?php echo $dato; ?></div>
        </div>

        <?php
    }
    ?>

    <!-- Tilbage knap -->
    <div class="text-center mt-4">
        <a href="index.php" class="btn btn-light fs-3 rounded-5 px-5">Tilbage</a>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>