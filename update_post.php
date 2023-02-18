<?php
$con = require 'config.php';

$db = new PDO( $con['dsn'], $con['username'], $con['password'], $con['options']  );

$id = 0;

if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {

    $id = (int)$_POST['id'];

    $price  = (int)['price'] * 100;
    $pst    = (int)$_POST['pst']*100;
    $gst    = (int)$_POST['gst']*100;
    $total  = $price + $pst + $gst;

    $values =  [
        'id'        =>    $_POST['id'],
        'vendor'    =>    $_POST['vendor'],
        'item'      =>    $_POST['item'],
        'category'  =>    $_POST['category'],
        'price'     =>    $price,
        'gst'       =>    $gst,
        'pst'       =>    $pst,
        'total'     =>    $total,
        'date'      =>   date('Y-m_d H:i:s' , strtotime($_POST['date'])),
    ];


    $sql = "UPDATE line_items 
            SET vendor=:vendor , item=:item, category=:category, price=:price, gst=:gst, pst=:pst, total= :total, date=:date  
            WHERE id=:id";

    $stmt = $db->prepare($sql);
    $stmt->execute($values);

}
require 'index.php';
