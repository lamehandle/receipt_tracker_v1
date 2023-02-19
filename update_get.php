<?php
if( $_SERVER['REQUEST_METHOD'] === 'GET' ) {
    $con = require 'config.php';
    $db = new PDO( $con['dsn'], $con['username'], $con['password'], $con['options']  );

    $id = (int) $_GET['id'] ?? 0;

    $sql = "SELECT * FROM line_items WHERE id= $id";

    $item = $db->query($sql)->fetch(PDO::FETCH_ASSOC);

    $price = number_format((float)$item['price']/100.00);
    $gst = number_format((float)$item['gst']/100.00);
    $pst = number_format((float)$item['pst']/100.00);
    $subtotal = (((float)$item['price']/100.00) +((float)$item['gst']/100) + ((float)$item['pst']/100.00));
    $total = number_format($subtotal);
}






