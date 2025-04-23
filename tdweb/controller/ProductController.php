<?php
define('DS',DIRECTORY_SEPARATOR);

require_once 'Controller.php';
require_once 'model'.DS.'ProductModel.php';

class ProductController extends Controller
{
    private $productModel;

    public function __construct($db) 
    {
        $this->productModel = new ProductModel($db);
    }

    public function listAll()
    {
        //$products = $this->productModel->getAll();
        $json = file_get_contents('http://localhost/webapi/api/products.php');
        $products = json_decode($json); 

        echo "<br><br><br>";
      
        require_once 'view'.DS.'ProductsView.php';  
    }

    public function listOne($id)
    {
        $id = $_GET['id'] ?? null; 
       //$product = $this->productModel->getById($id);
        $json = file_get_contents('http://localhost/webapi/api/products.php?id=' . $id);
        $product = json_decode($json); 
        require_once 'view'.DS.'ProductView.php';
    }

    public function delete($id)
    {
        //$this->productModel->delete($id);
        //header("Location: index.php?controller=ProductController&method=listAll");

        $url = 'http://localhost/webapi/api/products.php?id=' . $id;
        $ch = curl_init($url);
        
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $response = curl_exec($ch);
        curl_close($ch);
        
        $responseData = json_decode($response, true);
        if (isset($responseData['error'])) {
            echo "Erreur: " . $responseData['error'];
        } 
        else {
            header("Location: index.php?controller=ProductController&method=listAll");
        }
    }
}

?>