<?php
session_start();
// Checking for login errors to display
$email_err = $password_err = $login_err = "";

if (isset($_SESSION['login_err'])) {
    $login_err = $_SESSION['login_err'];
    unset($_SESSION['login_err']);
}

if (isset($_SESSION['email_err'])) {
    $email_err = $_SESSION['email_err'];
    unset($_SESSION['email_err']);
}

if (isset($_SESSION['password_err'])) {
    $password_err = $_SESSION['password_err'];
    unset($_SESSION['password_err']);
}
?>
<?php include('header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-light">
<div class="specialists-body">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card my-5">
                <div class="card-body">
                    <h2 class="card-title text-center">Login</h2>
                    <?php
                    // Display login error message
                    if (!empty($login_err)) {
                        echo '<div class="alert alert-danger">' . $login_err . '</div>';
                    }
                    ?>

                    <!-- Patient login form -->
                    <form action="../users/controler_1/patient_login.php" method="post">
                        <div class="form-group mb-3">
                            <label class="form-label">E-mail</label>
                            <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="">
                            <span class="invalid-feedback"><?php echo $email_err; ?></span>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Hasło</label>
                            <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                        </div>
                        <div class="form-group mb-4">
                            <input type="submit" class="btn btn-primary w-100" value="Zaloguj">
                        </div>
                        <p class="text-center">Nie masz jeszcze konta?  <a href="register.php">Zarejestruj się!</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<?php include('footer.php');?>
</body>

</html>
