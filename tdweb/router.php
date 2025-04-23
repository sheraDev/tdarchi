<?php
require_once 'config.php';

define('DS',DIRECTORY_SEPARATOR);

require_once 'controller'.DS.'ProductController.php';
require_once 'controller'.DS.'EmployeeController.php';
require_once 'controller'.DS.'HomeController.php';
require_once 'controller'.DS.'LoginController.php';


class Router 
{
    public function dispatch() 
    {
        global $PDO; 
        
        $controller = $_GET['controller'] ?? 'HomeController';
        $method = $_GET['method'] ?? 'index';
        $id = $_GET['id']??null;

        $controllerInstance = new $controller($PDO);
        $controllerInstance->$method($id);
    }

}
