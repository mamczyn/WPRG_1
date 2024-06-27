<?php
session_start();
?>
<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa z lokalizacją i zdjęciem budynku</title>
    <script type="text/javascript" src="googleMap.js"></script>
    <link rel="stylesheet" href="../assets/css/contact.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col text-center">
            <h2>Jak do nas trafić?</h2>
        </div>
    </div>
</div>
<!-- Kontener dla mapy -->
<!--<div id="map-container">-->
<!--    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6475.664878604763!2d18.42073210124229!3d54.48976794933961!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46fda3d9ddd965cb%3A0xc11611f92f2880b8!2sPrzychodnia%20Medica%20Wiczlino!5e1!3m2!1spl!2spl!4v1719186690311!5m2!1spl!2spl" id="map" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>-->
<!--</div>-->
<div id="map"></div>
<!-- Element img dla zdjęcia budynku -->
<div class="container">
    <div class="row">
        <div class="col text-center">
            <h2>Nasz budynek</h2>
        </div>
    </div>
</div>
<img id="building-photo" src="../assets/images/zdjecie_kliniki.jpg" alt="Zdjęcie budynku">
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBd0Fd7Vz2scjQkoULhOtDrA9sgp_hqQqA&callback=loadMap">
</script>
</body>
<?php include('footer.php');?>
</html>
