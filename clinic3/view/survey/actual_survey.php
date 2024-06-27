
<?php
require_once '../../database/Connection.php';

$conn = new Connection();
$db = $conn->getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $q1 = $_POST["q1"];
    $q2 = $_POST["q2"];
    $q3 = $_POST["q3"];
    $q4 = $_POST["q4"];
    $comment = $_POST["comment"];

    $query = "INSERT INTO surveys (q1, q2, q3, q4, comment) VALUES (:q1, :q2, :q3, :q4, :comment)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":q1", $q1);
    $stmt->bindParam(":q2", $q2);
    $stmt->bindParam(":q3", $q3);
    $stmt->bindParam(":q4", $q4);
    $stmt->bindParam(":comment", $comment);
    $stmt->execute();

    ?>
    <h1>Dziękujemy za udział w ankiecie!</h1>
    <script>
        setTimeout(function() {
            window.location.href = "../index.php";
        }, 3000); // redirect to main index page after 3 seconds
    </script>
    <?php
    exit;
}
?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/survey.css">
    <title>Ankieta Satysfakcji</title>

</head>

<body class="body2">
<h1>Ankieta Satysfakcji</h1>
<form method="post">
    <!-- Pytania ankiety -->
    <label for="q1">Jak oceniasz jakość usług?</label>
    <select id="q1" name="q1">
        <option value="1">1 - Bardzo zła</option>
        <option value="2">2 - Zła</option>
        <option value="3">3 - Średnia</option>
        <option value="4">4 - Dobra</option>
        <option value="5">5 - Bardzo dobra</option>
    </select>
    <br><br>
    <label for="q2">Czy poleciłbyś/łabyś nasze usługi innym?</label>
    <select id="q2" name="q2">
        <option value="yes">Tak</option>
        <option value="no">Nie</option>
    </select>
    <br><br>
    <label for="q3">Jak oceniasz lokalizację przychodni?</label>
    <select id="q3" name="q3">
        <option value="1">1 - Bardzo niezadowalająca</option>
        <option value="2">2 - Niezadowalająca</option>
        <option value="3">3 - Średnia</option>
        <option value="4">4 - Zadowalająca</option>
        <option value="5">5 - Bardzo zadowalająca</option>
    </select>
    <br><br>
    <label for="q4">Jak oceniasz lekarza z którym ostatnio miałeś kontakt?</label>
    <select id="q4" name="q4">
        <option value="1">1 - Bardzo niezadowalający</option>
        <option value="2">2 - Niezadowalający</option>
        <option value="3">3 - Średnia</option>
        <option value="4">4 - Zadowalający</option>
        <option value="5">5 - Bardzo zadowalający</option>
    </select>
    <br><br>
    <label for="comment">Komentarz:</label>
    <textarea id="comment" name="comment" rows="5" cols="30"></textarea>
    <br><br>
    <button type="submit">Wyślij ankietę</button>
</form>
</body>
</html>
