<?php
session_start(); // Initialize session

// Check if the user is logged in and has the role of 'patient'
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role"] !== 'patient') {
    header("location: ../view/login.php"); // Redirect to patient login page
    exit;
}

// Include file with database connection configuration and Appointment class
require_once '../database/connection.php';
require_once '../users/model/appointments.php';

// Create a database object
$database = new Connection();
$db = $database->getConnection();

// Create an instance of the Appointment class
//$appointment = new Appointment($db);

// Get patient appointments
//$patientAppointments = $appointment->getPatientAppointments($_SESSION['user_id']);

// Initialize variable with an empty string for update errors
//$update_err = "";

//// Check if there are update data errors
//if (isset($_SESSION['update_err'])) {
//    $update_err = $_SESSION['update_err'];
//    unset($_SESSION['update_err']); // Clear error from session
//}

// Initialize variable for password change errors
//$password_err = "";
//if (isset($_SESSION['$password_err'])) {
//    $password_err = $_SESSION['$password_err'];
//    unset($_SESSION['$password_err']); // Clear error from session
//}
//?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Clinic - Patient panel</title>
    <link rel="stylesheet" href="../assets/css/patient_panel2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
<?php include('header.php');?>

<!--if (!isset($_SESSION['survey_shown'])) {-->
<!--$_SESSION['survey_shown'] = false;-->
<!--}-->
<!---->
<!--if (!$_SESSION['survey_shown']) {-->
<!--?>-->
<!--<div id="popup" class="popup">-->
<!--    <div class="popup-content">-->
<!--        <h2>Zaproszenie do ankiety</h2>-->
<!--        <p>Czy chcesz wziąć udział w krótkiej ankiecie satysfakcji z usług poradni lekarskiej?</p>-->
<!--        <button class="survey-btn" onclick="goToSurvey()">Przejdź do ankiety</button>-->
<!--        <button class="close-btn" onclick="closePopup()">Zamknij</button>-->
<!--    </div>-->
<!--</div>-->
<!---->
<!--<script>-->
<!--    // Pokazuje dymek po załadowaniu strony-->
<!--    window.onload = function() {-->
<!--        document.getElementById('popup').style.visibility = 'visible';-->
<!--        document.getElementById('popup').style.opacity = '1';-->
<!--    };-->
<!---->
<!--    // Zamknięcie dymka-->
<!--    function closePopup() {-->
<!--        document.getElementById('popup').style.visibility = 'hidden';-->
<!--        document.getElementById('popup').style.opacity = '0';-->
<!--        --><?php //$_SESSION['survey_shown'] = true; ?>
<!--//    }-->
<!--//-->
<!--//    // Przejście do ankiety-->
<!--//    function goToSurvey() {-->
<!--//        window.location.href = 'ankieta.php';-->
<!--//        --><?php ////$_SESSION['survey_shown'] = true; ?>
<!--//    }-->
<!--//</script>-->

<div class="body">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Profile</h5>
                    <p><strong>First Name:</strong> <?php echo htmlspecialchars($_SESSION["first_name"]); ?></p>
                    <p><strong>Last Name:</strong> <?php echo htmlspecialchars($_SESSION["last_name"]); ?></p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION["email"]); ?> </p>
                    <a href="../users/controler_1/edit.php" class="btn btn-info m-1">Edit profile</a>
                    <a href="../users/controler_1/change.php" class="btn btn-warning m-1">Change password</a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Appointments</h5>
                    <div class="row">
                        <div class="col-md-8">
                            <h2 id="appointmentsHeader"></h2>
                        </div>
                        <div class="col-md-4">
                            <div class="dropdown">
                                <button class="btn btn-success dropdown-toggle w-100" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    Filter appointments
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                                    <li><a class="dropdown-item" href="#" onclick="loadAppointments('scheduled', false, 'scheduled:')">Scheduled</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="loadAppointments('cancelled_by_me', false, 'cancelled by me:')">Cancelled by me</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="loadAppointments('cancelled_by_doctor', false, 'cancelled by doctor:')">Cancelled by doctor</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="loadAppointments('', false, 'all:')">All</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="appointments-table">
                            <thead class="table-light">
                            <tr>
                                <th class="align-middle">Date and Time <button class="btn btn-light btn-sm" onclick="sortAppointments('date')"><i class="bi bi-sort-down"></i></button></th>
                                <th class="align-middle">Doctor <button class="btn btn-light btn-sm" onclick="sortAppointments('doctor')"><i class="bi bi-sort-alpha-down"></i></button></th>
                                <th class="align-middle">Status</th>
                                <th class="align-middle">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- Dynamic data generated using AJAX will appear here -->
                            </tbody>
                        </table>
                    </div>

                    <button onclick="toggleSection('new-appointment', true);" class="btn btn-primary m-1 w-100">Book a new appointment</button>

                    <div class="card" id="new-appointment" style="display: none;">
                        <div class="row">
                            <div class="col-md-8">
                                <h2 class="text-center">Doctors' availability calendar:</h2>
                            </div>
                            <div class="col-md-4">
                                <button type="button" onclick="toggleSection('new-appointment',false);" class="btn btn-secondary m-2 w-100">Hide</button>
                            </div>
                        </div>
                        <br>
                        <div id="calendar" data-patient-id="<?php echo $_SESSION['user_id'];?>"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
