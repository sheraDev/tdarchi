<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/../config/db.php';
require_once '../controllers/EmployeeController.php';

header('Content-Type: application/json');



getAll();
