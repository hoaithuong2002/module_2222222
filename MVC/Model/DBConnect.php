<?php
namespace App\Model;

use PDO;
use PDOException;
class DBConnect
{
    protected  $dsn;
    protected  $user;
    protected  $password;

    public function __construct()
    {
        $this->dsn = 'mysql:host=localhost;dbname=demo_mvc;charset=utf8';
        $this->user = 'root';
        $this->password = 'Hoaithuong2105@@';
    }

    public function connect()
    {
        try {
            return new PDO($this->dsn, $this->user, $this->password);
        } catch (PDOException $e){
            echo $e->getMessage();
        }
        return null;
    }

    public function query($statement)
    {
        $stmt = $this->connect()->query($statement);
        return $stmt->fetchAll();
    }

    public function execute($statement)
    {
        $stmt = $this->connect()->prepare($statement);
        $stmt->execute();
    }
}