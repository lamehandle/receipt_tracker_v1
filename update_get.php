<?php
if( $_SERVER['REQUEST_METHOD'] === 'GET' ) {
    $con = require 'config.php';
    $db = new PDO( $con['dsn'], $con['username'], $con['password'], $con['options']  );

    $id = (int) $_GET['id'] ?? 0;

    $sql = "SELECT * FROM line_items WHERE id= $id";

    $item = $db->query($sql)->fetch(PDO::FETCH_ASSOC);

    $price = number_format($item['price']/100,'2','.');
    $gst = number_format($item['gst']/100,'2','.');
    $pst = number_format($item['pst']/100,'2','.');
    $subtotal = (float)(($item['price']/100) +($item['gst']/100) + ($item['pst']/100));
    $total = number_format($subtotal,'2','.');
}






