<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../../database/connection.php';
require_once '../model/patient.php';

$database = new Connection();
$db = $database->getConnection();
$patient = new Patient($db);

// Define variables and initialize with empty values
$first_name = $last_name = $email = $password = "";
$first_name_err = $last_name_err = $email_err = $password_err = "";

// Process form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate first name
    if (empty(trim($_POST["first_name"]))) {
        $first_name_err = "Please enter first name.";
    } else {
        $first_name = trim($_POST["first_name"]);
    }

    // Validate last name
    if (empty(trim($_POST["last_name"]))) {
        $last_name_err = "Please enter last name.";
    } else {
        $last_name = trim($_POST["last_name"]);
    }

    // Validate email address
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter email address.";
    } elseif ($patient->isEmailExists(trim($_POST["email"]))) { // Check if email already exists
        $email_err = "Ten e-mail już jest zajęty przez innego użytkownika.";
    } elseif ($patient->validateEmail(trim($_POST["email"])) == false) { // Validate using RegEx
        $email_err = "This email address is not valid.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have at least 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Check input errors before inserting into database
    if (empty($first_name_err) && empty($last_name_err) && empty($email_err) && empty($password_err)) {
        // Add patient to database
        if ($patient->addNewPatient($first_name, $last_name, $email, $password)) {
            // Redirect to login page
            header("Location: ../login.php");
            exit();
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }
}

// Pass data to view
$viewData = [
    'first_name' => $first_name,
    'first_name_err' => $first_name_err,
    'last_name' => $last_name,
    'last_name_err' => $last_name_err,
    'email' => $email,
    'email_err' => $email_err,
    'password_err' => $password_err,
];

// Load view and pass data
require_once '../register.php';
?>
