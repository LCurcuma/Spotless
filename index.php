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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<div class="background">
    <img src="img/background-abstract.png" class="backgroundimg">
    <img src="img/background-abstract.png" class="backgroundimg2">
</div>

<div class="logo">
    <img src="img/logo.png" class="logoimg">
</div>

<div class="text-end">
    <button class="btn btn-primary kontaktknap" data-bs-toggle="modal" data-bs-target="#kontaktModal">
            KONTAKT
    </button>

</div>

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



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const cleanTime = document.querySelector('#cleanTime');
    const cleanDate = document.querySelector('#cleanDate');


    saveCleanBtn.addEventListener('click', () => {

        const cleanTimeInput = document.querySelector('#cleanTimeInput');
        const cleanDateInput = document.querySelector('#cleanDateInput');
        cleanTime.innerHTML = cleanTimeInput.value;
        cleanDate.innerHTML = cleanDateInput.value;

    })


</script>
</body>
</html>
