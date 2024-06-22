<?php include('../includes/header.php'); ?>
<main class="container">
    <h1 class="mt-4">Logowanie</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
        include('../includes/db.php');

        $username = $_POST['username'];
        $password = $_POST['password'];

        // Sprawdzanie nazwy użytkownika i hasła
        $sql = "SELECT id, password, role FROM users WHERE username=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $hashed_password, $role);

        if ($stmt->num_rows > 0) {
            $stmt->fetch();
            if (password_verify($password, $hashed_password)) {
                // Rozpoczęcie sesji i zapisanie danych użytkownika
                session_start();
                $_SESSION['user_id'] = $id;
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $role;
                header("Location: /index.php"); // Przekierowanie na stronę główną po zalogowaniu
                exit();
            } else {
                echo "<div class='alert alert-danger'>Nieprawidłowe hasło.</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Nie znaleziono użytkownika o podanej nazwie.</div>";
        }
        header("Location: /index.php");

        $stmt->close();
        $conn->close();
    }
    ?>
    <form method="POST" action="login.php">
        <div class="form-group">
            <label for="username">Nazwa użytkownika:</label>
            <input type="text" class="form-control" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Hasło:</label>
            <input type="password" class="form-control" name="password" required>
        </div>
        <button type="submit" name="login" class="btn btn-primary">Zaloguj się</button>
        <p class="mt-3">Nie masz jeszcze konta? <a href="register.php" class="btn btn-secondary">Zarejestruj się</a></p>
    </form>
</main>
<?php include('../includes/footer.php'); ?>
