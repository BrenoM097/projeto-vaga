<?php

namespace app\models;

use PDO;
use PDOException;

class Connection
{
    private $host = 'localhost'; 
    private $dbname = 'amigo_secreto';
    private $username = 'root'; 
    private $password = ''; 
    private $conn; 

    protected function connect()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
        } catch(PDOException $e) {
            echo 'Erro de conexão: ' . $e->getMessage();
        }

        return $this->conn;
    }
}