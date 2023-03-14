<?php

$con = require 'config.php';
//todo set up db at home
$db = new PDO( $con['dsn'], $con['username'], $con['password'], $con['options']  );

$sql = "SELECT * FROM line_items";

$items = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    $values = array_map(function ($item) {
        $price  = (float) $item['price'] / 100.00;
        $pst    = (float) $item['pst']   / 100.00;
        $gst    = (float) $item['gst']   / 100.00;
        $total  = $price + $pst + $gst;

        return [
            'id'        => $item['id'],
            'vendor'    => $item['vendor'],
            'item'      => $item['item'],
            'category'  => $item['category'],
            'price'     => $price,
            'gst'       => $gst,
            'pst'       => $pst,
            'total'     => $total,
            'date'      => $item['date'],
        ];
    }, $items);

    $item_totals = array_reduce( $items, function( $carry, $rec ){
       $price   = (float) $rec['price'] / 100.00;
       $pst     = (float) $rec['pst']   / 100.00;
       $gst     = (float) $rec['gst']   / 100.00;

        $rec_total = $price + $pst + $gst;
        return $carry + $rec_total;
    },0.0);









