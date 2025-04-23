<?php
function getPDO() {
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=adwfull;charset=utf8', 'root', 'root');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        return null; 
    }
}
