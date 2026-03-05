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
    <meta name="copyright" content="Information om copyright">

    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/737b386bab.js" crossorigin="anonymous"></script>
</head>

<body>
    <i class="fa-solid fa-user userIcon" style="color: rgb(255, 255, 255);" data-bs-target="#loginModal" data-bs-toggle="modal"></i>

<nav>
<img src="img/logo.png" class="logoimg">

<div class="text-end">
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
                    <i class="bi bi-telephone fs-2 fw-bold"></i> <span class="ms-3 fw-bold">+45 01020304</span>
                </div>
                <div>
                    <i class="bi bi-envelope fs-2 fw-bold"></i>
                    <span class="ms-3 fw-bold">kontakt@zealand.dk</span>
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
                    <label for="login" class="modal-title fs-3 me-auto ms-4" id="loginLabel">Login</label>
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

    <form action="index.php" method="post">
        <div class="modal fade" id="insertForm" aria-hidden="true" aria-labelledby="insertForm" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content custom-modal">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="medarbejder" class="fs-4">Medarbejder</label>
                            <input type="text" class="form-control fs-4" id="medarbejder" name="medarbejder" value="Maria Hansen">
                        </div>
                        <div class="mb-3 d-flex flex-row">
                            <div class="mb-3">
                                <label for="date" class="fs-4">Date</label>
                                <input type="date" class="form-control tidspunkt fs-4" id="date" name="date" value="<?php echo $today; ?>">
                            </div>
                            <div class="mb-3 ms-auto">
                                <label for="tidspunkt" class="fs-4">Tidspunkt</label>
                                <input type="time" class="form-control tidspunkt fs-4" id="tidspunkt" name="tidspunkt" value="<?php echo $timeNow; ?>">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="andet" class="fs-4">Evt. bemærkninger</label>
                            <input type="text" class="form-control fs-4" id="andet" name="andet">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary submitBTN" data-bs-target="#inertForm" data-bs-dismiss="modal" id="saveCleanBtn">INDSEND</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <?php
        $sqlWorkers = "SELECT * FROM Workers";
        $workers = $db->sql($sqlWorkers);

        if(!empty($_POST)){
            $sqlInsert = "INSERT INTO History (workerId, toiletId, date) VALUES (:workerId, :toiletId, :date)";
            $workerID = null;

            foreach($workers as $worker){
                if($worker->name===$_POST['medarbejder']){
                    $workerID = $worker->id;
                }
            }
            $bindsInsert = [
                    ":workerId" => $workerID,
                ":toiletId" => "2",
                ":date" => $_POST['date']." ".$_POST['tidspunkt']
            ];
            $db->sql($sqlInsert, $bindsInsert);
            echo "<div class='bg-light d-flex flex-column justify-content-center align-items-center goodJob'><p>Godt arbejde!</p><a href='index.php' class='btn btn-primary takBTN'>Tak :)</a></div>";
        }
    ?>

    <div class="container">
        <div class="cirkel1"></div>
        <div class="cirkel2"></div>
    </div>

    <div class="background">
        <img src="img/background-abstract.png" class="backgroundimg">
        <img src="img/background-abstract.png" class="backgroundimg2">
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
