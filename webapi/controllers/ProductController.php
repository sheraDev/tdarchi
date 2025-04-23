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
            ProductID, 
            Name, 
            ProductNumber, 
            MakeFlag,
            Size, 
            Weight,
            ListPrice, 
            ProductModelID, 
            SellStartDate, 
            SellEndDate, 
            Color, 
            StandardCost, 
            FinishedGoodsFlag 
            FROM product");

        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($products)) {
            echo json_encode(["message" => "Aucun produit trouvé"]);
        } else {
            $encodedProducts = json_encode($products, JSON_UNESCAPED_UNICODE);

            if ($encodedProducts === false) {
                echo json_encode(["error" => "Erreur d'encodage JSON : " . json_last_error_msg()]);
            } else {
                echo $encodedProducts;
            }

        }

    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["error" => $e->getMessage()]);
    }
}

function getById($id) {
    try {
        $pdo = getPDO();

        if (!$pdo) {
            echo json_encode(["error" => "Connexion PDO échouée"]);
            return;
        }

        $stmt = $pdo->prepare("SELECT 
            ProductID, 
            Name, 
            ProductNumber, 
            MakeFlag,
            Size, 
            Weight,
            ListPrice, 
            ProductModelID, 
            SellStartDate, 
            SellEndDate, 
            Color, 
            StandardCost, 
            FinishedGoodsFlag 
            FROM product 
            WHERE ProductID = :id");

        $stmt->execute(['id' => $id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($product) {
            echo json_encode($product, JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(["message" => "Produit non trouvé"]);
        }

    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["error" => $e->getMessage()]);
    }
}

function delete($id) {
    try {
        $pdo = getPDO();

        if (!$pdo) {
            echo json_encode(["error" => "Connexion PDO échouée"]);
            return;
        }

        $stmt = $pdo->prepare("UPDATE product SET FinishedGoodsFlag = 1 WHERE ProductID = :id");
        $stmt->execute(['id' => $id]);

        if ($stmt->rowCount() > 0) {
            echo json_encode(["message" => "Produit désactivé avec succès"]);
        } else {
            echo json_encode(["message" => "Aucun produit trouvé à désactiver"]);
        }

    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["error" => $e->getMessage()]);
    }
}
