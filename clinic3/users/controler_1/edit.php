<?php
session_start();

// Check if the user is logged in and has the role of 'patient'
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role"] !== 'patient') {
    header("location: ../../view/login.php"); // Redirect to login page
    exit;
}

// Include file with database connection configuration
require_once '../../database/connection.php';

$database = new Connection();
$db = $database->getConnection();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    try {
        // Update the user's profile
        $sql = "UPDATE PATIENTS SET first_name = ?, last_name = ?, email = ? WHERE patient_id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$first_name, $last_name, $email, $_SESSION['user_id']]);

        if ($stmt->rowCount() > 0) {
            $_SESSION['update_success'] = "Profil został zaaktualizowany";
            $_SESSION['first_name'] = $first_name;
            $_SESSION['last_name'] = $last_name;
            $_SESSION['email'] = $email;
            header("location: ../../view/patient_panell.php");
            exit;
        } else {
            $_SESSION['update_err'] = "Spróbuj jeszcze raz!";
        }
    } catch (PDOException $e) {
        $_SESSION['update_err'] = "Error: " . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../../assets/css/patient_panel2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 style="text-align: center" class="card-title">Zaaktualizuj Profil</h2>
                    <?php
                    if (isset($_SESSION['update_err'])) {
                        echo '<div class="alert alert-danger">' . $_SESSION['update_err'] . '</div>';
                        unset($_SESSION['update_err']);
                    }
                    if (isset($_SESSION['update_success'])) {
                        echo '<div class="alert alert-success">' . $_SESSION['update_success'] . '</div>';
                        unset($_SESSION['update_success']);
                    }
                    ?>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label for="first_name">Imię</label>
                            <input type="text" id="first_name" name="first_name" class="form-control" value="<?php echo htmlspecialchars($_SESSION["first_name"]); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Nazwisko</label>
                            <input type="text" id="last_name" name="last_name" class="form-control" value="<?php echo htmlspecialchars($_SESSION["last_name"]); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($_SESSION["email"]); ?>" required>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-success">Zapisz</button>
                            <a href="../../view/patient_panell.php" class="btn btn-secondary">Anuluj</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>

