<?php include('../includes/header.php'); ?>
<main class="container">
    <h1 class="mt-4">Nasi Specjalisci</h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Specjalizacja</th>
            <th>Email</th>
            <th>Telefon</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include('../includes/db.php');

        $sql = "SELECT * FROM doctors";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["surname"] . "</td>";
                echo "<td>" . $row["specialty"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["phone"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Brak lekarzy w bazie danych</td></tr>";
        }

        $conn->close();
        ?>
        </tbody>
    </table>
</main>
<?php include('../includes/footer.php'); ?>

