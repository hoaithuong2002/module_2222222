<?php
namespace App\Controller;


class PageController
{
    protected ProductManager $productManager;
    protected CategoryManager $categoryManager;

    public function __construct()
    {
        $this->productManager = new ProductManager();
        $this->categoryManager = new CategoryManager();
    }

    public function productsPage()
    {
        include "src/View/products.php";
    }

    public function editProductPage()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $id = $_REQUEST['id'];
            include 'src/View/edit-product.php';
        }
        else {
            $name = $_POST['name'];
            $category = $_POST['category'];
            $price = $_POST['price'];
            $amount = $_POST['amount'];
            $description = $_POST['description'];

            $this->productManager->updateProduct($_REQUEST['id'], new Product('', $name, $category, $price, $amount, '', $description));
            header("Location: index.php");
        }
    }

    public function deleteProductPage()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $id = $_REQUEST['id'];
            include 'src/View/delete-product.php';
        }
        else{
            if ($_POST['action'] == "delete"){
                $this->productManager->deleteProduct($_REQUEST['id']);
                header("Location: index.php");
            }
        }
    }

    public function createProductPage()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $cateManager = new CategoryManager();
            include 'src/View/create-product.php';
        }
        else{
            $name = $_POST['name'];
            $category = $_POST['category'];
            $price = $_POST['price'];
            $amount = $_POST['amount'];
            $description = $_POST['description'];

            $this->productManager->createProduct(new Product('', $name, $category, $price,$amount,'',$description));
            header("Location: index.php");
        }
    }
}