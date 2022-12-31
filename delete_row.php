<?php
//configure PDO for database calls
$host       = 'localhost';
$dbname     ='receipts_tracker';
$port       = '3306';
$charset    = 'utf8mb4';
$dsn        ="mysql:host=$host;dbname=$dbname;port=$port;charset=$charset";
$username   ='root';
$password   ='root';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];


if ( $_SERVER['REQUEST_METHOD'] === 'GET' ) {

    $id = $_GET['id'];

    $sql = "DELETE FROM line_items WHERE id= $id";

    $db = new PDO($dsn, $username, $password, $options  );
    $db->query($sql);

require 'index.php';
}
