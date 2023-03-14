<?php

class database
{
    protected string $host;
    protected string $dbname;
    protected string $port;
    protected string $charset;
    protected string $username;
    protected string $password;
    protected string $dsn;


    public function __construct(){
    $this->host = 'localhost';
        $this->dbname = 'receipts_tracker';
        $this->port = '3306';
        $this->charset = 'utf8mb4';
        $this->dsn = "mysql:host=$this->host;dbname=$this->dbname;port=$this->port;charset=$this->charset";
        $this->username = 'root';
        $this->password = 'root';

    $options = [
        'PDO::ATTR_ERRMODE' => 'PDO::ERRMODE_EXCEPTION',
        'PDO::ATTR_DEFAULT_FETCH_MODE' => 'PDO::FETCH_ASSOC',
        'PDO::ATTR_EMULATE_PREPARES' => false,
    ];

    return new PDO($this->dsn,$this->username, $this->password, $this->options);


}
}