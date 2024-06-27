<?php
class Appointment {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getPatientAppointments($patient_id) {
        $query = "SELECT a.appointment_id, a.appointment_date, u.first_name AS doctor_first_name, u.last_name AS doctor_last_name, a.status
                  FROM appointments a
                  JOIN users u ON a.doctor_id = u.user_id
WHERE a.patient_id = ?
ORDER BY a.appointment_date ASC";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $patient_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $appointments = array();

        while ($row = $result->fetch_assoc()) {
            $appointments[] = $row;
        }

        return $appointments;
    }
}
?>

