<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){


    $price  = ((int)$_POST['price'] * 100);
    $pst    = ((int)$_POST['pst'] * 100);
    $gst    = ((int)$_POST['gst'] * 100);
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
    require 'index.php';

}else{

    echo "sorry nothing submitted.";
    require 'index.php';
}
