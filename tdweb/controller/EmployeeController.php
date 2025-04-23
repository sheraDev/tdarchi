<?php
require_once 'Controller.php';
require_once 'model'.DS.'EmployeeModel.php';


class EmployeeController extends Controller
{
    private $employeeModel;

    public function __construct($db) 
    {
        $this->employeeModel = new EmployeeModel($db);
    }

    public function listAll()
    {
        $employees = $this->employeeModel->getAll();
        require_once 'view'.DS.'EmployeesView.php';  
    }

    public function listOne($id)
    {
        $employee = $this->employeeModel->getById($id);
        require_once 'view'.DS.'EmployeeView.php';
    }

    public function delete($id)
    {
        $this->employeeModel->delete($id);
        header("Location: index.php?controller=EmployeeController&method=listAll");
    }
}

?>