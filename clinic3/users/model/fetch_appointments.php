<?php
//require_once '../../database/connection.php';
//session_start();
//
//$database = new Connection();
//$db = $database->getConnection();
//
//$filter = $_POST['filter'];
//$patient_id = $_SESSION['user_id'];
//
//$query = "SELECT a.appointment_id, a.appointment_date, a.status, s.first_name AS doctor_first_name, s.last_name AS doctor_last_name
//          FROM appointments a
//          JOIN specialist s ON a.doctor_id = s.specialist_id
//          WHERE a.patient_id = ? ";
//
//if ($filter === 'scheduled') {
//    $query .= "AND a.status = 'scheduled'";
//} elseif ($filter === 'cancelled_by_me') {
//    $query .= "AND a.status = 'cancelled_by_patient'";
//} elseif ($filter === 'cancelled_by_doctor') {
//    $query .= "AND a.status = 'cancelled_by_doctor'";
//}
//
//$query .= " ORDER BY a.appointment_date DESC";
//$stmt = $db->prepare($query);
//$stmt->execute([$patient_id]);
//
//$appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
//$output = '';
//foreach ($appointments as $appointment) {
//    $output .= '<tr>
//        <td>' . $appointment['appointment_date'] . '</td>
//        <td>' . $appointment['doctor_first_name'] . ' ' . $appointment['doctor_last_name'] . '</td>
//        <td>' . $appointment['status'] . '</td>
//        <td>
//            <button class="btn btn-danger btn-sm" onclick="cancelAppointment(' . $appointment['appointment_id'] . ')">Cancel</button>
//        </td>
//    </tr>';
//}
//
//echo $output;
//?>
