<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(__DIR__ . DS . '..')); 

require_once ROOT . DS . 'controller' . DS . 'Controller.php';
//require_once ROOT . DS . 'model' . DS . 'UserModel.php';
require_once ROOT . DS . 'model' . DS . 'EmployeeModel.php';

class LoginController extends Controller
{
    private $employeeModel;

    public function __construct($db) 
    {
        $this->employeeModel = new EmployeeModel($db);
    }

    public function index() 
    {
        require_once ROOT . DS . 'view' . DS . 'LoginView.php';
    }

    public function login() 
    {
        session_start();
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = $this->employeeModel->getById($username);

        if ($user && $password === 'archiweb1*') {
            $_SESSION['user'] = $user;
            header('Location: index.php?controller=HomeController&method=index');
            exit;
        } else {
            $error = "Identifiants incorrects";
            require_once ROOT . DS . 'view' . DS . 'LoginView.php';
        }
    }

    public function logout() 
    {
        session_start();
        session_destroy();
        header('Location: index.php?controller=LoginController&method=index');
        exit;
    }
}
