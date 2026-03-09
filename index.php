<?php
/**
 * @var db $db
 */

require "settings/init.php";

date_default_timezone_set('Europe/Copenhagen');
$date = date("Y-m-d H:i:s");
$today = date("d.m.Y");
$day = date("Y-m-d");
$timeNow = date("H:i");

$sqlHistory = "SELECT * FROM History ORDER BY date DESC";
$history = $db->sql($sqlHistory);
$firstDate = $history[0]->date;
$firstDato = date("d.m.Y", strtotime($firstDate));
$firstTime = date("H:i", strtotime($firstDate));
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">
    
    <title>Spotless</title>
    
    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <link rel="shortcut icon" href="/img/favicon.ico">
    <meta name="copyright" content="Information om copyright">

    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/737b386bab.js" crossorigin="anonymous"></script>
</head>

<body>
    <i class="fa-solid fa-user userIcon" style="color: rgb(255, 255, 255);" data-bs-target="#loginModal" data-bs-toggle="modal"></i>

<nav class="navigation">
<img src="img/logo.png" class="logoimg" alt="Spotless logo">

<div class="text-end ms-auto">
    <button class="btn btn-primary kontaktknap" data-bs-toggle="modal" data-bs-target="#kontaktModal">
            KONTAKT
    </button>

</div>

</nav>

<div class="modal fade" id="kontaktModal" tabindex="-1" aria-labelledby="kontaktModalLabel">
    <div class="modal-dialog modal-dialog-centered"> <div class="modal-content custom-modal">

            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body text-start p-4">
                <div class="mb-4">
                    <i class="bi bi-telephone fs-2"></i> <span class="ms-3">+45 01020304</span>
                </div>
                <div>
                    <i class="bi bi-envelope fs-2"></i>
                    <span class="ms-3">kontakt@zealand.dk</span>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="toilet">
    <div class="toiletrengjort text-center text-light">
        <p class="teksttoilet">Dette toilet blev rengjort</p>
        <div class="tid">
            kl.
            <span id="cleanTime" class="tid text-white"><?php echo $firstTime?></span>
        </div>
        <div class="dato" id="cleanDate">
            <?php echo $firstDato?>
        </div>
    </div>
</div>


    <div class="modal fade" id="loginModal" aria-hidden="true" aria-labelledby="loginModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content custom-modal">
                <div class="modal-header">
                    <label for="login" class="modal-title fs-5 fs-md-3 me-auto ms-4" id="loginLabel">Login</label>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input class="form-control" type="password" id="login">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#insertForm" data-bs-toggle="modal">OK</button>
                </div>
            </div>
        </div>
    </div>


<!-- Opretter en formular. Formularen sender data til filen index.php, når brugeren trykker på indsend.
   method="post" betyder, at dataene sendes som POST-data. -->
    <form action="index.php" method="post">

<!-- Der oprettes en Bootstrap modal, som er et popup-vindue. Klassen modal fade giver popup-vinduet en animation,
når det åbner, id="insertForm" bruges til at identificere denne modal og attributterne aria-hidden og aria-labelledby bruges
til tilgængelighed, så skærmlæsere kan forstå elementet.-->
        <div class="modal fade" id="insertForm" aria-hidden="true" aria-labelledby="insertForm" tabindex="-1">

<!-- Her oprettes selve dialogboksen inde i modalen. Klassen modal-dialog-centered gør, at popup-vinduet bliver centreret
på skærmen.-->
            <div class="modal-dialog modal-dialog-centered">

<!--Her starter indholdet af popup-vinduet. Klassen modal-content er en Bootstrap-klasse, der styrer layoutet, og custom-modal
er en klasse, som bruges til styling i CSS.-->
                <div class="modal-content custom-modal">

<!-- Opretter toppen af popup-vinduet-->
                    <div class="modal-header">

<!-- Opretter en luk-knap i popup-vinduet. Klassen btn-close giver knappen et kryds-ikon. data-bs-dismiss="modal" gør,
at modalen bliver lukket, når brugeren klikker på knappen.-->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

<!-- Selve indholdet af popup-vinduet-->
                    <div class="modal-body">

<!-- Opretter en container omkring inputfelt. Klassen mb-3 giver en margin under elementet, så der er afstand til næste felt.-->
                        <div class="mb-3">

<!-- Opretter en tekst, der beskriver inputfeltet. for="medarbejder" kobler labelen til inputfeltet med samme id. Klasserne fs-6
og fs-md-4 styrer tekstens størrelse i Bootstrap.-->
                            <label for="medarbejder" class="fs-6 fs-md-4">Medarbejder</label>

<!-- Opretter et tekstfelt, hvor brugeren kan skrive et medarbejdernavn. Klassen form-control giver Bootstrap-styling.
id="medarbejder" bruges til at forbinde feltet med labelen. name="medarbejder" er vigtigt, fordi det er dette navn,
PHP bruger til at hente værdien fra formularen. value="Maria Hansen" betyder, at feltet allerede er udfyldt med navnet Maria Hansen.-->
                            <input type="text" class="form-control fs-6 fs-md-4" id="medarbejder" name="medarbejder" value="Maria Hansen">
                        </div>

<!-- Opretter en container med flexbox-layout. Klassen d-flex aktiverer flexbox, og flex-row gør, at elementerne ligger ved
siden af hinanden vandret.-->
                        <div class="mb-3 d-flex flex-row">

<!-- Opretter en container omkring et inputfelt. Klassen mb-3 giver en margin under elementet, så der er afstand til næste felt.-->
                            <div class="mb-3">

<!-- Opretter en label til dato-feltet-->
                                <label for="date" class="fs-6 fs-md-4">Date</label>

<!-- Opretter et inputfelt til dato. type="date" giver en kalender. name="date" gør, at værdien kan sendes til PHP. value="-->
<?php //echo $today; ?><!--" betyder, at feltet automatisk bliver udfyldt med dagens dato fra PHP-variablen $today.-->
                                <input type="date" class="form-control tidspunkt fs-6 fs-md-4" id="date" name="date" value="<?php echo $today; ?>">
                            </div>

<!-- Opretter en container omkring et inputfelt. Klassen mb-3 giver en margin under elementet, så der er afstand til næste felt.
Klassen ms-auto giver automatisk selv margin til venstre (start), og skubber elementet helt til højre-->
                            <div class="mb-3 ms-auto">

<!-- Opretter en label til tid-feltet-->
                                <label for="tidspunkt" class="fs-6 fs-md-4">Tidspunkt</label>

<!-- Opretter et inputfelt til tidspunkt. type="time" giver et tidsvælger-felt. name="tidspunkt" bruges til at sende værdien til
PHP. value="--><?php //echo $timeNow; ?><!--" indsætter automatisk det aktuelle klokkeslæt fra PHP-variablen $timeNow.-->
                                <input type="time" class="form-control tidspunkt fs-6 fs-md-4" id="tidspunkt" name="tidspunkt" value="<?php echo $timeNow; ?>">
                            </div>
                        </div>

<!-- Opretter en container omkring et inputfelt. Klassen mb-3 giver en margin under elementet, så der er afstand til næste felt.-->
                        <div class="mb-3">

<!-- Opretter en label til feltet, hvor brugeren kan skrive ekstra kommentarer.-->
                            <label for="andet" class="fs-6 fs-md-4">Evt. bemærkninger</label>

<!-- Opretter et tekstfelt, hvor brugeren kan skrive bemærkninger. name="andet" gør, at PHP kan hente teksten fra formularen.-->
                            <input type="text" class="form-control fs-6 fs-md-4" id="andet" name="andet">
                        </div>
                    </div>

<!-- Opretter footer (bunden) til modal-->
                    <div class="modal-footer">

<!-- Opretter en knap til at indsende formularen. Klassen btn btn-primary giver Bootstrap-styling. data-bs-dismiss="modal" betyder,
 at popup-vinduet lukkes, når knappen trykkes.-->
                        <button class="btn btn-primary submitBTN" data-bs-target="#inertForm" data-bs-dismiss="modal" id="saveCleanBtn">INDSEND</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

<!-- Starter PHP-koden.-->
    <?php

// Opretter en SQL-forespørgsel, der henter alle rækker fra databasen i tabellen Workers.
        $sqlWorkers = "SELECT * FROM Workers";

// Sender SQL-forespørgslen til databasen og gemmer resultatet i variablen $workers.
        $workers = $db->sql($sqlWorkers);

// Her bliver der tjekket, om formularen er blevet sendt. If (hvis) $_POST indeholder data, betyder det, at brugeren har
// trykket på indsend.
        if(!empty($_POST)){

// Opretter en SQL-kommando, som indsætter data i tabellen History. Den bruger placeholders (:workerId, :toiletId osv.),
// som senere bliver erstattet med rigtige værdier.
            $sqlInsert = "INSERT INTO History (workerId, toiletId, date, remarks) VALUES (:workerId, :toiletId, :date, :remarks)";

// Opretter en variabel til medarbejderens ID og sætter den først til null.
            $workerID = null;

// Gennemgår alle medarbejdere, der blev hentet fra databasen.
            foreach($workers as $worker){

// Sammenligner navnet fra databasen med det navn, brugeren skrev i formularen.
                if($worker->name===$_POST['medarbejder']){

// Hvis navnet passer, bliver medarbejderens ID gemt i variablen $workerID.
                    $workerID = $worker->id;
                }
            }

// Opretter et array med værdier, der skal indsættes i SQL-forespørgslen.
            $bindsInsert = [

// Sætter værdien af workerId til medarbejderens ID.
                    ":workerId" => $workerID,

// Sætter toilet-ID til værdien 2.
                ":toiletId" => "2",

// Kombinerer dato og tidspunkt fra formularen til én samlet værdi.
                ":date" => $_POST['date']." ".$_POST['tidspunkt'],

// Gemmer bemærkningerne fra formularen.
                ":remarks" => $_POST['andet']
            ];

// Sender SQL-kommandoen til databasen og indsætter dataene.
            $db->sql($sqlInsert, $bindsInsert);

// Gør så der bliver vist en besked på siden, der fortæller brugeren, at registreringen er blevet gemt. Den indeholder også en knap,
// som sender brugeren tilbage til index.php.
            echo "<div class='bg-light d-flex flex-column justify-content-center align-items-center goodJob'><p>Godt arbejde!</p><a href='index.php' class='btn btn-primary takBTN'>Tak :)</a></div>";
        }
    ?>

    <div class="container">
        <div class="cirkel1"></div>
        <div class="cirkel2"></div>
    </div>

    <div class="background">
        <img src="img/background-abstract.png" class="backgroundimg" alt="Background image">
        <img src="img/background-abstract.png" class="backgroundimg2" alt="Background image">
    </div>

    <div class="cleaning-overview">
        <h2>Rengørings oversigt</h2>

       <div class="clean-row">
            <div class="history-list">
                <?php
                $latestHistory = array_slice($history, 0, 3);
                foreach($latestHistory as $entry) {
                    $workerName = "Ukendt";
                    foreach($workers as $worker) {
                        if($worker->id == $entry->workerId) {
                            $workerName = $worker->name;
                            break;
                        }
                    }

                    $entryDato = date("d.m", strtotime($entry->date));
                    $entryTid = date("H:i", strtotime($entry->date));
                    ?>

                    <div class="history-item d-flex justify-content-between align-items-center mb-3">
                        <span class="history-time"><?php echo $entryTid; ?></span>
                        <span class="history-name"><?php echo $workerName; ?></span>
                        <span class="history-date"><?php echo $entryDato; ?></span>
                    </div>
                <?php } ?>
            </div>
        </div>

    </div>
    <div class="link_btn">
    <a href="oversigt.php" class="history-btn">Historik</a>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
