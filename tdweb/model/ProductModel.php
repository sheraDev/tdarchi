<?php
require_once "Model.php";
require_once "./Entitites/ProductEntitie.php";

class ProductModel extends Model
{
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $query = "SELECT * FROM product";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'ProductEntity');
    }

    public function getById($id) {
        $query = "SELECT * FROM product WHERE ProductID = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchObject('ProductEntity');
    }

    public function delete($id)
    {
        $query = "UPDATE product SET FinishedGoodsFlag = 1 WHERE ProductID = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }
}

?>