<?php
require_once 'user.php';
require_once 'IPatientInterface.php';
require_once 'PatientTraits.php';

class Patient extends User implements IPatientInterface
{
    use PatientTrait;
    private $db;
    private $table_name = "patients";

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Funkcja dodająca nowego pacjenta
    public function addNewPatient($firstName, $lastName, $email, $password)
    {
        try {
            $this->db->beginTransaction(); // Rozpoczęcie transakcji

            if ($this->isEmailExists($email)) {
                error_log("Email " . $email . " już istnieje w bazie danych.");
                $this->db->rollBack(); // Wycofanie transakcji
                return false;
            }

            $query = "INSERT INTO " . $this->table_name . " (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)";
            $stmt = $this->db->prepare($query);

            $firstName = htmlspecialchars(strip_tags($firstName));
            $lastName = htmlspecialchars(strip_tags($lastName));
            $email = htmlspecialchars(strip_tags($email));
            $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

            $stmt->bindParam(':first_name', $firstName);
            $stmt->bindParam(':last_name', $lastName);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $passwordHashed);

            if ($stmt->execute()) {
                error_log("Pacjent " . $firstName . " " . $lastName . " został dodany do bazy danych.");
                $this->db->commit(); // Zatwierdzenie transakcji
                return true;
            } else {
                error_log("Błąd dodawania pacjenta: " . implode(";", $stmt->errorInfo()));
                $this->db->rollBack(); // Wycofanie transakcji
                return false;
            }
        } catch (Exception $e) {
            error_log("Transakcja nieudana: " . $e->getMessage());
            $this->db->rollBack(); // Wycofanie transakcji w przypadku wyjątku
            return false;
        }
    }

    public function login($email, $password)
    {
        $query = "SELECT patient_id, first_name, last_name, email, password, role FROM " . $this->table_name . " WHERE email = :email";
        $stmt = $this->db->prepare($query);

        $email = htmlspecialchars(strip_tags($email));
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if (password_verify($password, $row['password'])) {
                $_SESSION["loggedin"] = true;
                $_SESSION["user_id"] = $row['patient_id'];
                $_SESSION["email"] = $row['email'];
                $_SESSION["first_name"] = $row['first_name'];
                $_SESSION["last_name"] = $row['last_name'];
                $_SESSION["role"] = $row['role'];

                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function isEmailExists($email)
    {
        $query = "SELECT COUNT(*) FROM " . $this->table_name . " WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function isEmailUsedByAnotherPatient($patientId, $email)
    {
        $query = "SELECT COUNT(*) FROM " . $this->table_name . " WHERE email = :email AND patient_id != :patient_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':patient_id', $patientId);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function updateProfile($patientId, $firstName, $lastName, $email)
    {
        if ($this->isEmailUsedByAnotherPatient($patientId, $email)) {
            error_log("Podany adres email jest już używany.");
            return false;
        }

        $query = "UPDATE " . $this->table_name . " 
                  SET first_name = :first_name, 
                      last_name = :last_name, 
                      email = :email 
                  WHERE patient_id = :patient_id";
        $stmt = $this->db->prepare($query);

        $firstName = htmlspecialchars(strip_tags($firstName));
        $lastName = htmlspecialchars(strip_tags($lastName));
        $email = htmlspecialchars(strip_tags($email));
        $patientId = htmlspecialchars(strip_tags($patientId));

        $stmt->bindParam(':first_name', $firstName);
        $stmt->bindParam(':last_name', $lastName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':patient_id', $patientId);

        if ($stmt->execute()) {
            error_log("Pacjent " . $_SESSION['first_name'] . " " . $_SESSION['last_name'] . " zaktualizował dane osobowe.");
            return true;
        } else {
            error_log("Błąd aktualizacji danych: " . implode(";", $stmt->errorInfo()));
            return false;
        }
    }

    // Funkcja aktualizująca hasło pacjenta
    public function changePassword($patientId, $currentPassword, $newPassword) {
        // Pobranie aktualnego hasła
        $query = "SELECT password FROM " . $this->table_name . " WHERE patient_id = :patient_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':patient_id', $patientId);

        if (!$stmt->execute()) {
            error_log("Błąd wykonania zapytania select: " . implode(";", $stmt->errorInfo()));
            return false;
        }

        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Weryfikacja aktualnego hasła
            if (password_verify($currentPassword, $row['password'])) {
                // Hashowanie nowego hasła
                $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $updateQuery = "UPDATE " . $this->table_name . " SET password = :new_password WHERE patient_id = :patient_id";
                $updateStmt = $this->db->prepare($updateQuery);
                $updateStmt->bindParam(':new_password', $newHashedPassword);
                $updateStmt->bindParam(':patient_id', $patientId);

                if ($updateStmt->execute()) {
                    error_log("Hasło zostało pomyślnie zaktualizowane.");
                    return true;
                } else {
                    error_log("Błąd wykonania zapytania update: " . implode(";", $updateStmt->errorInfo()));
                }
            } else {
                error_log("Aktualne hasło nie pasuje.");
            }
        } else {
            error_log("Nie znaleziono pacjenta lub wiele wpisów dla patient_id: " . $patientId);
        }
        return false;
    }

    // Walidacja emaila
    public function validateEmail($email)
    {
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
        return preg_match($regex, $email) === 1;
    }
}
?>
