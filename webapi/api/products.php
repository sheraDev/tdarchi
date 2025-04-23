<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/../config/db.php';
require_once '../controllers/ProductController.php';


$method = $_SERVER['REQUEST_METHOD'];
$id = $_GET['id'] ?? null;

header('Content-Type: application/json; charset=utf-8');

switch ($method) {
    case 'GET':
        if ($id) {
            getById($id);
        } else {
            getAll();
        }
        break;

    case 'DELETE':
        if ($id) {
            delete($id);
        } else {
            http_response_code(400);
            echo json_encode(["error" => "ID requis pour suppression"]);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(["error" => "Méthode non autorisée"]);
        break;
}
