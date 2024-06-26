<?php
session_start();
?>
<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<style>
    body {
        margin-top: 3cm;
    }
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nasi Specjaliści</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../assets/css/specialists.css">
    <style>
        body {
            margin-top: 3cm;
        }
    </style>
</head>
<body>

<div class="container">

    <h1 class="title">Nasi Specjaliści</h1>

    <div class="specialist-container">
        <div class="specialist-row">
            <img src="../assets/images/lekarz1.jpeg" alt="Specjalista 1">
            <div class="specialist-info">
                <h3>Dr. Yehor Malikov </h3>
                <p><b>Specjalizacja:</b> Opis specjalizacji 1</p>
                <p>Dr. Piotr Wiśniewski ukończył studia na Uniwersytecie Medycznym we Wrocławiu i posiada specjalizację w zakresie chirurgii stomatologicznej. Pracuje w zawodzie od 12 lat, przeprowadzając skomplikowane zabiegi chirurgiczne z dużą precyzją. Jego pasją jest edukacja pacjentów na temat profilaktyki zdrowia jamy ustnej. Jest autorem licznych publikacji naukowych w branżowych czasopismach.</p>
            </div>
        </div>
    </div>
    <hr>
    <div class="specialist-container">
        <div class="specialist-row">
            <div class="specialist-info">
                <h3>Dr. Michalina Gadomska </h3>
                <p><b>Specjalizacja:</b> Absolwentka Uniwersytetu Medycznego w Gdańsku, gdzie uzyskała tytuł specjalisty neurologi. Od ponad 8 lat pomaga pacjentom w uzyskaniu pięknego uśmiechu, stosując najnowsze techniki ortodontyczne. Jest ceniona za cierpliwość i zaangażowanie w leczenie swoich pacjentów. Dr. Nowak prowadzi również badania naukowe z zakresu ortodoncji.</p>
                <p>Neurologia</p>
            </div>
            <img src="../assets/images/lekarz2.avif" alt="Specjalista 2" style="max-height: 200px;" >
        </div>
    </div>
    <hr>
    <div class="specialist-container">
        <div class="specialist-row">
            <img src="../assets/images/lekarz3.png" alt="Specjalista 3">
            <div class="specialist-info">
                <h3>Dr. Aleksander Zapała</h3>
                <p><b>Specjalizacja:</b> </p>
                <p>Ukończył Akademię Medyczną w Warszawie z wyróżnieniem. Specjalizuje się w stomatologii zachowawczej i estetycznej, z ponad 10-letnim doświadczeniem. Jest znany z indywidualnego podejścia do pacjentów i precyzyjnych zabiegów. Regularnie uczestniczy w międzynarodowych konferencjach, poszerzając swoją wiedzę.</p>
            </div>
        </div>
    </div>
    <hr>
    <div class="specialist-container">
        <div class="specialist-row">
            <div class="specialist-info">
                <h3>Dr. Grzegorz Łuszczek</h3>
                <p><b>Specjalizacja:</b> Kardiolog</p>
                <p>Specjalista w dziedzinie protetyki stomatologicznej, ukończyła studia na Uniwersytecie Jagiellońskim. Od 23 lat pomaga pacjentom odzyskać pewność siebie dzięki nowoczesnym rozwiązaniom protetycznym. Dr. Łuszczek jest znany z dokładności i dbałości o szczegóły. Aktywnie uczestniczy w szkoleniach i kursach, aby zapewniać swoim pacjentom najlepszą opiekę.</p>
            </div>
            <img src="../assets/images/lekarz4.jpg" alt="Specjalista 4">
        </div>
    </div>

</div>
</body>
<?php include('footer.php');?>
</html>

