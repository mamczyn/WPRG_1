<?php
error_log("Formularz logowania został przesłany.");
error_log("Email: " . $_POST['email']);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();


require_once '../../database/connection.php';
require_once '../model/patient.php';

$database = new Connection();
$db = $database->getConnection();

$email = $password = "";
$email_err = $password_err = "";

// Przetwarzanie danych formularza po jego przesłaniu
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (empty(trim($_POST["email"]))) {
        $email_err = "Proszę wprowadzić adres email.";
    } else {
        $email = trim($_POST["email"]);
    }


    if (empty(trim($_POST["password"]))) {
        $password_err = "Proszę wprowadzić hasło.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Próba logowania po walidacji
    if (empty($email_err) && empty($password_err)) {
        $user = new Patient($db);
        if ($user->login($email, $password)) {

            header("location: ../../view/index.php");
            exit;
        } else {

            $_SESSION['login_err'] = "Nieprawidłowy email lub hasło.";
            header("location: ../../view/login.php");
            exit;
        }
    } else {
        // Przekazanie błędów walidacji do sesji
        $_SESSION['email_err'] = $email_err;
        $_SESSION['password_err'] = $password_err;
        header("location: ../../view/login.php");
        exit;
    }

    unset($db);
}
?>
