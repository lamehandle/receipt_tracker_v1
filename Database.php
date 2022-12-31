<?php

class Database {

        public string $host;
        public string $dbname;
        public string $port;
        public string $charset;
        public string $dsn;
        public string $username;
        public string $password;
        public array $options;


    public function connect()  {
        $this->host = 'localhost';
        $this->dbname = 'receipts_tracker';
        $this->port = '3306';
        $this->charset = 'utf8mb4';

        $this->dsn = "mysql:host=$this->host;dbname=$this->dbname;port=$this->port;charset=$this->charset";

        $this->username = 'root';
        $this->password = 'root';

        $this->options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];


        try {
             $db =  new PDO($this->dsn, $this->username, $this->password, $this->options);
        }catch (PDOException $e){
//            echo "there is an error {$e->getMessage()} and {$e->getCode()}";
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

//    public function query($query) {
//        $db = $this->connect();
//        return $db->query($query);
//
//    }

}