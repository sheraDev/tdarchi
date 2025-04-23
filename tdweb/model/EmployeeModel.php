<?php

require_once "Model.php";
require_once "./Entitites/EmployeeEntitie.php";

class EmployeeModel extends Model
{
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() 
    {
        $query = "SELECT * FROM employee";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'EmployeeEntity');
    }

    public function getById($id) 
    {
        $query = "SELECT * FROM employee WHERE EmployeeID = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchObject('EmployeeEntity');
    }

    public function delete($id)
    {
        $query = "UPDATE employee SET CurrentFlag = 0 WHERE EmployeeID = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }
}
