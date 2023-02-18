<?php

$con = require 'config.php';

$db = new PDO( $con['dsn'], $con['username'], $con['password'], $con['options']  );

$sql = "SELECT * FROM line_items";

$items = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    $values = array_map(function ($item) {
        $price = (int)$item['price'] / 100;
        $pst = (int)$item['pst'] / 100;
        $gst = (int)$item['gst'] / 100;
        $total = $price + $pst + $gst;

        return [
            'id' => $item['id'],
            'vendor' => $item['vendor'],
            'item' => $item['item'],
            'category' => $item['category'],
            'price' => number_format($price),
            'gst' => number_format($gst),
            'pst' => number_format($pst),
            'total' => number_format($total),
            'date' => $item['date'],
        ];
    }, $items);
$item_totals = array_reduce($items, function($carry, $rec ){
       $price   = (int)$rec['price'] / 100;
       $pst     = (int)$rec['pst']   / 100;
       $gst     = (int)$rec['gst']   / 100;

    $rec_total = $price + $pst + $gst;
    return $carry + $rec_total;
},0.0);









