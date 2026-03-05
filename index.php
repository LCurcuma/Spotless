<?php
/**
 * @var db $db
 */

require "settings/init.php";
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
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/737b386bab.js" crossorigin="anonymous"></script>
</head>

<body>

    <img src="img/logo.png" class="logoimg">

<div class="text-end">
    <a href="">
        <button class="btn btn-primary kontaktknap"> KONTAKT </button>
    </a>
</div>

<div class="toilet">
    <div class="toiletrengjort text-center text-light">
        <p class="teksttoilet">Dette toilet blev rengjort</p>
        <div class="tid">
            kl.
            <span id="cleanTime">--:--</span>
        </div>
        <div class="dato" id="cleanDate">
            --.--.----
        </div>
    </div>
</div>


<div class="container">
    <div class="cirkel1"></div>
    <div class="cirkel2"></div>
</div>

    <i class="fa-solid fa-user userIcon" style="color: rgb(255, 255, 255);"></i>

<div class="background">
    <img src="img/background-abstract.png" class="backgroundimg">
    <img src="img/background-abstract.png" class="backgroundimg2">
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    /*
    const cleanTime = document.querySelector('#cleanTime');
    const cleanDate = document.querySelector('#cleanDate');

    const saveCleanBtn = document.querySelector('#saveCleanBtn');
    saveCleanBtn.addEventListener('click', () => {

        const cleanTimeInput = document.querySelector('#cleanTimeInput');
        const cleanDateInput = document.querySelector('#cleanDateInput');
        cleanTime.innerHTML = cleanTimeInput.value;
        cleanDate.innerHTML = cleanDateInput.value;

    })

*/
</script>
</body>
</html>
