<?php
namespace App\Model;

use App\Model\Category;
use App\Model\DBConnect;
class CategoryManager
{
    protected DBConnect $dbConnect;

    public function __construct()
    {
        $this->dbConnect = new DBConnect();
    }

    public function getAllCategory(): array
    {
        $sql = "SELECT * FROM Categories";
        $data = $this->dbConnect->query($sql);
        $categories = [];
        foreach ($data as $item) {
            $categories[] = new Category($item['id'], $item['name']);
        }
        return $categories;
    }

    public function getByID()
    {

    }

}