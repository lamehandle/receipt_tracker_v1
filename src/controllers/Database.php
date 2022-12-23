<?php

namespace app\controllers;
require "../../vendor/autoload.php";

use PDO;
use PDOException;
use PDOStatement;

class Database {

    public  string   $host;
    public  string   $dbname;
    public  string   $port;
    public  string   $charset;
    public  string   $username;
    public  string   $password;
    public  string   $dsn;   //data source name
    public  array   $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,        //always throw exceptions
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,   //retrieve records as associative arrays
        PDO::ATTR_EMULATE_PREPARES   => false,              //do not use emulate mode
    ];



    public function __construct(){

        $this->host     = 'localhost';
        $this->dbname   = 'receipts_tracker';
        $this->port     = '3306';
        $this->charset  = 'utf8mb4';
        $this->username = 'root';
        $this->password = 'root';

        $this->dsn = "mysql:host=$this->host;dbname=$this->dbname;port=$this->port;charset=$this->charset";

    }


    public function connect() : PDO {
        try {

            return $conn = new PDO($this->dsn,$this->username,$this->password,$this->options);

        } catch(PDOException $e){
            echo "Connection failed " . $e->getMessage();
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function query(string $query) : PDOStatement {
        $conn = $this->connect();
        return $statement = $conn->query($query);

    }


}