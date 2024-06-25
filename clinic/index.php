

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Clinic - Main page</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/index.css">
    <style>
        body {
            margin-top: 1cm;
        }
        .hero-image {
            position: relative;
            width: 100%;
            margin-top: 1cm;
        }
        .hero-image img {
            width: 100%;
            height: auto;
        }
        .hero-text {
            text-align: center;
            position: absolute;
            top: 20%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 3em;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }
        .rounded-box {
            border: 1px solid #ddd;
            border-radius: 15px;
            padding: 20px;
            margin: 20px 0;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
<?php include('includes/header.php');?>
<?php include('database/connection.php');?>
<div class="row">
    <hr>
    <hr>
    <hr>
    <hr>
    <hr>


    <h2 class="text-center">Projekt strona przychodni 50pkt</h2>
</div>
<div class="hero-image">
    <img src="assets/images/klinika_tlo.jpg" alt="Klinika Tło">
    <div class="hero-text">Witaj w naszej poradni lekarskiej gdzie o Twoje zdrowie zatroszczymy się jak o własne</div>
</div>

<div class="container">
    <div id="we" class="rounded-box">
        <h3>O Nas</h3>
        <p>Nasza przychodnia lekarska została założona w 1995 roku przez grupę doświadczonych lekarzy, którzy pragnęli
            stworzyć miejsce, gdzie pacjenci będą mogli otrzymać kompleksową opiekę medyczną na najwyższym poziomie.
            Od samego początku naszym celem było zapewnienie dostępu do specjalistów różnych dziedzin medycyny w jednym miejscu,
            co umożliwiło szybkie i skuteczne diagnozowanie oraz leczenie. Przez lata przychodnia rozwijała się,
            zdobywając zaufanie coraz większej liczby pacjentów. W 2005 roku rozbudowaliśmy nasze obiekty, aby sprostać
            rosnącemu zapotrzebowaniu na usługi medyczne. W 2015 roku wprowadziliśmy nowoczesne technologie diagnostyczne
            oraz rozszerzyliśmy naszą ofertę o usługi rehabilitacyjne i fizjoterapeutyczne. Obecnie nasza przychodnia jest
            jednym z wiodących ośrodków medycznych w regionie, cieszącym się uznaniem zarówno pacjentów, jak i środowiska medycznego.
            Nasz zespół składa się z wykwalifikowanych specjalistów, którzy stale podnoszą swoje kwalifikacje, uczestnicząc w
            szkoleniach i konferencjach naukowych. Jesteśmy dumni z naszej historii i ciągle dążymy do doskonalenia świadczonych
            usług, aby jak najlepiej służyć naszym pacjentom.</p>
    </div>
    <div class="rounded-box">
        <h3>Jakość to nasze drugie imie</h3>
        <p>W naszej przychodni priorytetem jest jakość świadczonych usług oraz zadowolenie pacjentów. Każdego dnia staramy
            się zapewnić profesjonalną i troskliwą opiekę medyczną, odpowiadając na indywidualne potrzeby naszych pacjentów.
            Nasz zespół składa się z wysoko wykwalifikowanych specjalistów, którzy stale podnoszą swoje kwalifikacje,
            uczestnicząc w licznych szkoleniach i konferencjach. Dzięki nowoczesnym technologiom diagnostycznym oraz
            innowacyjnym metodom leczenia, jesteśmy w stanie zapewnić szybkie i skuteczne diagnozy oraz terapie.
            Pacjenci mogą liczyć na kompleksową opiekę medyczną, począwszy od konsultacji lekarskich, poprzez diagnostykę,
            aż po rehabilitację. Stawiamy na indywidualne podejście do każdego pacjenta, dlatego każda wizyta jest starannie
            zaplanowana i przeprowadzana z najwyższą dbałością o szczegóły. Dbamy również o komfort naszych pacjentów,
            oferując przyjazne i nowoczesne wnętrza naszej przychodni. Dzięki szerokiej gamie usług medycznych oraz
            elastycznym godzinom przyjęć, jesteśmy w stanie dostosować się do potrzeb nawet najbardziej wymagających pacjentów.
            Naszym celem jest nie tylko leczenie, ale także edukacja zdrowotna, dlatego regularnie organizujemy spotkania
            i warsztaty z zakresu profilaktyki zdrowotnej. Wierzymy, że nasza pasja do medycyny oraz zaangażowanie w pracę
            przekładają się na wysoką jakość świadczonych usług, co doceniają nasi pacjenci.</p>
    </div>
    <div class="rounded-box">
        <h3>Dlaczego Wybrać Naszą Klinikę?</h3>
        <p>Nasza klinika to miejsce, gdzie pacjenci mogą liczyć na kompleksową i profesjonalną opiekę medyczną.
            Wyróżniamy się na tle innych placówek przede wszystkim indywidualnym podejściem do każdego pacjenta.
            Zdajemy sobie sprawę, że każdy przypadek jest inny, dlatego staramy się dostosować nasze usługi do
            specyficznych potrzeb każdego pacjenta. Nasz zespół składa się z doświadczonych i wysoko wykwalifikowanych
            specjalistów, którzy są ekspertami w swoich dziedzinach. Dzięki nowoczesnemu wyposażeniu oraz innowacyjnym
            technologiom diagnostycznym, jesteśmy w stanie szybko i skutecznie diagnozować oraz leczyć różnorodne schorzenia.
            Oferujemy szeroki zakres usług medycznych, w tym konsultacje lekarskie, diagnostykę obrazową,
            zabiegi chirurgiczne oraz rehabilitację. Dbamy o komfort naszych pacjentów, zapewniając im przyjazne i
            nowoczesne wnętrza kliniki. Nasza placówka jest łatwo dostępna, a elastyczne godziny otwarcia pozwalają na
            dostosowanie wizyt do indywidualnych harmonogramów pacjentów. Dodatkowo, oferujemy możliwość rejestracji
            online oraz telefonicznej, co znacznie ułatwia umawianie się na wizyty. Nasza misja to nie tylko leczenie,
            ale także edukacja zdrowotna, dlatego regularnie organizujemy warsztaty i spotkania informacyjne dla pacjentów.
            Wybierając naszą klinikę, wybierasz profesjonalizm, zaangażowanie i troskę o Twoje zdrowie.</p>
    </div>
    <div id="telefon" class="rounded-box">
        <h3>Godziny Otwarcia</h3>
        <li><b>Poniedziałek - Piątek: </b>8:00 - 18:00</li>
        <li><b>Sobota: </b>9:00 - 14:00</li>
        <li><b>Niedziela: </b>Zamknięte</li>
        <h3>Kontakt</h3>
        <li><b>Rejestracja:         </b> +48 123 456 789</li>
        <li><b>Informacje Medyczne: </b> +48 987 654 321</li>
        <li><b>Nagłe Przypadki:     </b> +48 456 789 123</li>
    </div>

    <div id="news" class="row mt-5">
        <h2 class="text-center">Aktualności</h2>
        <div class="col-md-12">
            <div class="alert alert-danger">
                <h4><b>Remont Przychodni</b></h4>
                <p>W związku z remontem budynku, przychodnia w dniach 15 - 26 lipca będzie <b>NIECZYNNA</b>. Za wszelkie niedogodności przepraszamy.</p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
<?php include('includes/footer.php');?>
</body>
</html>

