<!DOCTYPE html>
<html lang="pl">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Clinic - Patient panel</title>
    <link rel="stylesheet" href="../assets/css/survey.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
<?php include('header.php');?>

if (!isset($_SESSION['survey_shown'])) {
$_SESSION['survey_shown'] = false;
}

if (!$_SESSION['survey_shown']) {
?>
<div class="body">
<div id="popup" class="popup">
    <div class="popup-content">
        <h2>Zaproszenie do ankiety</h2>
        <p>Czy chcesz wziąć udział w krótkiej ankiecie satysfakcji z usług poradni lekarskiej?</p>
        <button class="survey-btn" onclick="goToSurvey()">Przejdź do ankiety</button>
        <button class="close-btn" onclick="closePopup()">Zamknij</button>
    </div>
</div>

<script>
    // Pokazuje dymek po załadowaniu strony
    window.onload = function() {
        document.getElementById('popup').style.visibility = 'visible';
        document.getElementById('popup').style.opacity = '1';
    };

    // Zamknięcie dymka
    function closePopup() {
        document.getElementById('popup').style.visibility = 'hidden';
        document.getElementById('popup').style.opacity = '0';
        <?php $_SESSION['survey_shown'] = true; ?>
    }

    // Przejście do ankiety
    function goToSurvey() {
        window.location.href = 'survey/actual_survey.php';
        <?php $_SESSION['survey_shown'] = true; ?>
    }
</script>
</div>
<?php include('footer.php');?>
</body>
</html>
