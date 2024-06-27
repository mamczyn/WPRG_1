<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role"] !== 'patient') {
    header("location: login.php");
    exit;
}

require_once '../database/connection.php';
require_once '../users/model/appointments.php';

$database = new Connection();
$db = $database->getConnection();

$appointment = new Appointment($db);


$patientAppointments = $appointment->getPatientAppointments($_SESSION['user_id']);


$update_err = "";
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Clinic - Panel Pacjenta</title>
    <link rel="stylesheet" href="../assets/css/patient_panel_3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .bodysbodys {
            background-color: #f8f9fa;
            margin-top: 3cm;
        }
    </style>
</head>

<body>
<?php include('header.php');?>
<div class="bodysbodys">
<div class="body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Profil</h5>
                        <p><strong>Imię:</strong> <?php echo htmlspecialchars($_SESSION["first_name"]); ?></p>
                        <p><strong>Nazwisko:</strong> <?php echo htmlspecialchars($_SESSION["last_name"]); ?></p>
                        <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION["email"]); ?> </p>
                        <a href="../users/controler_1/edit.php" class="btn btn-info m-1">Edytuj profil</a>
                        <a href="../users/controler_1/change.php" class="btn btn-warning m-1">Zmień hasło</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title" id="appointmentsHeader">Zaplanowane Wizyty</h5>
                        <div class="btn-group mb-3" role="group">
                            <button type="button" class="btn btn-primary" onclick="loadAppointments('scheduled', true, 'Zaplanowane Wizyty')">Zaplanowane</button>
                            <button type="button" class="btn btn-secondary" onclick="loadAppointments('cancelled_by_me', true, 'Wizyty Odwołane Przeze Mnie')">Odwołane przeze mnie</button>
                            <button type="button" class="btn btn-secondary" onclick="loadAppointments('cancelled_by_doctor', true, 'Wizyty Odwołane przez Lekarza')">Odwołane przez lekarza</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="appointments-table">
                                <thead>
                                <tr>
                                    <th>Data wizyty</th>
                                    <th>Lekarz</th>
                                    <th>Status</th>
                                    <th>Akcje</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($patientAppointments as $appointment): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($appointment['appointment_date']); ?></td>
                                        <td><?php echo htmlspecialchars($appointment['doctor_first_name'] . ' ' . $appointment['doctor_last_name']); ?></td>
                                        <td><?php echo htmlspecialchars($appointment['status']); ?></td>
                                        <td>
                                            <?php if ($appointment['status'] === 'scheduled'): ?>
                                                <button class="btn btn-danger btn-sm" onclick="cancelAppointment(<?php echo $appointment['appointment_id']; ?>)">Cancel</button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div id="calendar"></div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
