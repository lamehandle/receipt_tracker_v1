<?php

$con = require 'config.php';
$db = new PDO( $con['dsn'], $con['username'], $con['password'], $con['options']  );

if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {

    $id     = (int)$_POST['id'];
    $price  = (float)$_POST['price'] * 100.00;
    $pst    = (float)$_POST['pst'] * 100.00;
    $gst    = (float)$_POST['gst'] * 100.00;
    $total  = $price + $pst + $gst;

    $values =  [
        'id'        =>    $_POST['id'],
        'vendor'    =>    $_POST['vendor'],
        'item'      =>    $_POST['item'],
        'category'  =>    $_POST['category'],
        'price'     =>    (string)$price,
        'gst'       =>    (string)$gst,
        'pst'       =>    (string)$pst,
        'total'     =>    (string)$total,
        'date'      =>   date('Y-m_d H:i:s' , strtotime($_POST['date'])),
    ];


    $sql = "UPDATE line_items 
            SET vendor=:vendor , item=:item, category=:category, price=:price, gst=:gst, pst=:pst, total= :total, date=:date  
            WHERE id=:id";

     $db->prepare($sql)->execute($values);
    require 'success.php';

}else{

    require 'error.php';
}