<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $price  = ((float)$_POST['price'] * 100.00);
    $pst    = ((float)$_POST['pst'] * 100.00);
    $gst    = ((float)$_POST['gst'] * 100.00);
    $total  = $price + $pst + $gst;

    $values = [
        'vendor'    =>$_POST['vendor'],
        'item'      =>$_POST['item'],
        'category'  =>$_POST['category'],
        'price'     =>$price,
        'gst'       =>$pst,
        'pst'       =>$gst,
        'total'     =>$total,
        'date'      =>$_POST['date'],
    ];

    $sql = "INSERT into line_items   (  vendor,  item,  category,  price,  gst,  pst,  total,  date )
                            VALUES   ( :vendor, :item, :category, :price, :gst, :pst, :total, :date )";

$con = require 'config.php';

$db = new PDO( $con['dsn'], $con['username'], $con['password'], $con['options']  );

$db->prepare($sql)->execute($values);
    require 'success.php';

}else{

    echo "sorry nothing submitted.";
    require 'error.php';
}
