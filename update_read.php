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
$id = 0;
$db = new PDO($dsn, $username, $password, $options);

if( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
    $id = (int) $_GET['id'] ?? 0;

    $sql = "SELECT * FROM line_items WHERE id= $id";
    $item = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    $total = (int)$item['price'] + (int)$item['gst'] + (int)$item['pst'] / 100;


}else{
    require 'index.php';
}

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $update = $_POST;

    $sql = "UPDATE line_items WHERE id= :id";
    $db->prepare($sql)->execute(['id'=>$update['id']]); //todo fix this to update table

}



