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


$categories = [
            "Alcohol",
            "Auto",
            "Bakery",
            "Clothing",
            "Deli",
            "Entertainment",
            "Household",
            "Maintenance",
            "Meat",
            "Medical",
            "Produce",
            "Seafood",
            "Seafood",
            "Snacks",
            "Toys",
            "Utilities",
            "Weed",
];
sort($categories, SORT_STRING);


if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $values = [
        'vendor'=>$_POST['vendor'],
        'item'=>$_POST['item'],
        'category'=>$_POST['category'],
        'price'=>$_POST['price'],
        'gst'=>$_POST['gst'],
        'pst'=>$_POST['pst'],
        'date'=>$_POST['date'],
    ];

    $sql = "INSERT into line_items ( vendor, item, category, price, gst, pst, date )
                            VALUES   ( :vendor,:item,:category,:price,:gst,:pst,:date )";

    $db = new PDO($dsn, $username, $password, $options  );
    $db->prepare($sql)->execute($values); //todo rewrite Database to be more general

require 'index.php';
}
