<?php
//require_once '../../database/connection.php';
//
//$database = new Connection();
//$db = $database->getConnection();
//
//$patient_id = $_POST['patient_id'];
//$doctor_id = $_POST['doctor_id']; // Dodaj tę linię
//$start = $_POST['start'];
//$end = $_POST['end'];
//$title = $_POST['title'];
//
//$query = "INSERT INTO appointments (patient_id, doctor_id, appointment_date, status, notes)
//          VALUES (?, ?, ?, 'scheduled', ?)";
//$stmt = $db->prepare($query);
//
//if ($stmt->execute([$patient_id, $doctor_id, $start, $title])) {
//    echo json_encode(['success' => true]);
//} else {
//    echo json_encode(['success' => false]);
//}
//?>
