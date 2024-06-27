<?php
class Appointment {
    private $conn;
    private $table_name = "appointments";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getPatientAppointments($patient_id) {
        $query = "SELECT a.appointment_id, a.appointment_date, a.status, s.first_name AS doctor_first_name, s.last_name AS doctor_last_name 
                  FROM " . $this->table_name . " a 
                  JOIN specialist s ON a.doctor_id = s.specialist_id 
                  WHERE a.patient_id = ? 
                  ORDER BY a.appointment_date DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$patient_id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

//    public function bookAppointment($patient_id, $doctor_id, $appointment_date, $notes = "") {
//        $query = "INSERT INTO " . $this->table_name . " (patient_id, doctor_id, appointment_date, status, notes)
//                  VALUES (?, ?, ?, 'scheduled', ?)";
//        $stmt = $this->conn->prepare($query);
//
//        if ($stmt->execute([$patient_id, $doctor_id, $appointment_date, $notes])) {
//            return true;
//        }
//        return false;
//    }
//
//    public function cancelAppointment($appointment_id, $patient_id) {
//        $query = "UPDATE " . $this->table_name . " SET status = 'cancelled_by_patient'
//                  WHERE appointment_id = ? AND patient_id = ?";
//        $stmt = $this->conn->prepare($query);
//
//        if ($stmt->execute([$appointment_id, $patient_id])) {
//            return true;
//        }
//        return false;
//    }
}
?>
