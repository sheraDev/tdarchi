<?php
require_once __DIR__ . '/../config/db.php';

function getAll() {
    try {
        $pdo = getPDO();

        if (!$pdo) {
            echo json_encode(["error" => "Connexion PDO échouée"]);
            return;
        }

        $stmt = $pdo->query("SELECT 
            EmployeeID,
            NationalIDNumber,
            ContactID,
            LoginID,
            ManagerID,
            Title,
            BirthDate,
            MaritalStatus,
            Gender,
            HireDate,
            SalariedFlag,
            VacationHours,
            CurrentFlag,
            ModifiedDate
            FROM employee");

        $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($employees)) {
            echo json_encode(["message" => "Aucun employees trouvé"]);
        } else {
            $encodedEmployees = json_encode($employees, JSON_UNESCAPED_UNICODE);

            if ($encodedEmployees === false) {
                echo json_encode(["error" => "Erreur d'encodage JSON : " . json_last_error_msg()]);
            } else {
                echo $encodedEmployees;
            }

        }

    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["error" => $e->getMessage()]);
    }
}
