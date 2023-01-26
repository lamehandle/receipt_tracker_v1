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
$total = '';
$db = new PDO($dsn, $username, $password, $options);

if( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
    $id = (int) $_GET['id'] ?? 0;
    $sql = "SELECT * FROM line_items WHERE id= $id";
    $item = $db->query($sql)->fetch(PDO::FETCH_ASSOC);

    $price = number_format($item['price']/100,'2','.');
    $gst = number_format($item['gst']/100,'2','.');
    $pst = number_format($item['pst']/100,'2','.');
    $subtotal = $price + $gst + $pst;
    $total = number_format($subtotal,'2','.');
}else{
    require 'index.php';
}


if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

    $id = (int)$_POST['id'];

    $values =  [
        'id'        =>    $_POST['id'],
        'vendor'    =>    $_POST['vendor'],
        'item'      =>    $_POST['item'],
        'category'  =>    $_POST['category'],
        'price'     =>    $_POST['price'],
        'gst'       =>    $_POST['gst'],
        'pst'       =>    $_POST['pst'],
        'total'     =>    $_POST['total'],
        'date'      =>    $_POST['date'],
    ];

//todo fix this to update table
    $sql = "UPDATE line_items 
            SET vendor=:vendor , item=:item, category=:category, price=:price, gst=:gst, pst=:pst, total= :total, date=:date  
            WHERE id=:id";

    $stmt = $db->prepare($sql);
    $stmt->execute($values);


}



