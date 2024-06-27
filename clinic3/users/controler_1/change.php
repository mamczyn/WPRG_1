<?php
session_start();

// Check if the user is logged in and has the role of 'patient'
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role"] !== 'patient') {
    header("location: ../../view/login.php"); // Redirect to login page
    exit;
}

require_once '../../database/connection.php';

$database = new Connection();
$db = $database->getConnection();

// Check if user_id is set in session
//if (!isset($_SESSION['user_id'])) {
//    $_SESSION['password_err'] = "No patient ID found in session.";
//    header("location: ../../view/login.php");
//    exit;
//}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_new_password = $_POST['confirm_new_password'];

    // Validate new password and confirm new password
    if ($new_password !== $confirm_new_password) {
        $_SESSION['password_err'] = "New password and confirm new password do not match.";
        header("location: ../../view/patient_panell.php");
        exit;
    }

    try {
        // Check if the current password is correct
        $sql = "SELECT password FROM patients WHERE patient_id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$_SESSION['user_id']]);
        $patient = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($patient && password_verify($current_password, $patient['password'])) {
            // Update the password
            $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $update_sql = "UPDATE patients SET password = ? WHERE patient_id = ?";
            $update_stmt = $db->prepare($update_sql);
            if ($update_stmt->execute([$new_hashed_password, $_SESSION['user_id']])) {
                $_SESSION['update_success'] = "Password updated successfully.";
                header("location: ../../view/patient_panell.php");
                exit;
            } else {
                $_SESSION['password_err'] = "Coś poszło nie tak, spróbuj jeszcz raz.";
            }
        } else {
            $_SESSION['password_err'] = "Obecne hasło jest niepoprawne.";
        }
    } catch (PDOException $e) {
        $_SESSION['password_err'] = "Error: " . $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="../../assets/css/patient_panel2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Zmień hasło</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label for="current_password">Obecne hasło:</label>
                            <input type="password" id="current_password" name="current_password" class="form-control"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="new_password">Nowe hasło:</label>
                            <input type="password" id="new_password" name="new_password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm_new_password">Powtórz nowe hasło:</label>
                            <input type="password" id="confirm_new_password" name="confirm_new_password"
                                   class="form-control" required>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-success">Zachowaj Zmiany</button>
                            <a href="../../view/appointments.php" class="btn btn-secondary">Anuluj</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>


