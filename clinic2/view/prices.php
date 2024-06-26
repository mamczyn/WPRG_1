<?php
session_start();
?>
<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Cennik</title>
    <link rel="stylesheet" href="../assets/css/prices.css">
</head>
<body>
<h1>Ceny Naszych Usług</h1>
<table>
    <tr>
        <th>Usługa</th>
        <th>Cena (PLN)</th>
    </tr>
    <?php
    $services = [
        "Konsultacja lekarska" => "150",
        "Badanie krwi" => "80",
        "USG jamy brzusznej" => "200",
        "ECHO serca" => "250",
        "RTG klatki piersiowej" => "180",
        "Rezonans magnetyczny" => "600",
        "Tomografia komputerowa" => "500",
        "Szczepienie przeciw grypie" => "100",
        "Zabieg chirurgiczny" => "1200",
        "Rehabilitacja" => "300"
    ];

    foreach ($services as $service => $price) {
        echo "<tr><td>$service</td><td>$price</td></tr>";
    }
    ?>
</table>
</body>
<?php include('footer.php');?>
</html>
