<?php include('../includes/header.php'); ?>
<main class="container">
    <h1 class="mt-4">Rejestracja</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
        include('../includes/db.php');

        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $role = 'user'; // Domyślnie ustawiamy rolę jako 'user'

        // Sprawdzanie czy nazwa użytkownika już istnieje
        $sql = "SELECT id FROM users WHERE username=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo "<div class='alert alert-danger'>Nazwa użytkownika jest już zajęta.</div>";
        } else {
            // Dodanie nowego użytkownika do bazy danych
            $sql = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $username, $password, $role);

            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Rejestracja zakończona sukcesem. Możesz się teraz zalogować.</div>";
            } else {
                echo "<div class='alert alert-danger'>Wystąpił błąd podczas rejestracji. Spróbuj ponownie.</div>";
            }
        }

        $stmt->close();
        $conn->close();
    }
    ?>
    <form method="POST" action="register.php">
        <div class="form-group">
            <label for="username">Nazwa użytkownika:</label>
            <input type="text" class="form-control" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Hasło:</label>
            <input type="password" class="form-control" name="password" required>
        </div>
        <button type="submit" name="register" class="btn btn-primary">Zarejestruj się</button>
        <p class="mt-3">Masz już konto? <a href="login.php" class="btn btn-secondary">Zaloguj się</a></p>
    </form>
</main>
<?php include('../includes/footer.php'); ?>
