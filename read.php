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



$sql = "SELECT * FROM line_items";

$db = new PDO($dsn, $username, $password, $options  );

$items = $db->query($sql)->fetchAll();

$total = array_reduce($items, function($carry, $item){
        $tot = (int)$item['price'] + (int)$item['gst'] + (int)$item['pst']/100;
        return $tot + $carry;
});


