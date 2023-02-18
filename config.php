<?php
//configure PDO for database calls
return [
    $host       = 'localhost',
    $dbname     = 'receipts_tracker',
    $port       = '3306',
    $charset    = 'utf8mb4',
    'dsn'       =>"mysql:host=$host;dbname=$dbname;port=$port;charset=$charset",
    'username'  =>'root',
    'password'  =>'root',

    'options' => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]
];