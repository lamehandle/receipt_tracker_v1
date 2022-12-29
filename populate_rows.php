<?php
include 'Database.php';

$query = "SELECT * FROM line_items";

$db = new Database();

$items = $db->query($query)->fetchAll();

$total = array_reduce($items, function($carry, $item){
        $tot = (int)$item['price'] + (int)$item['gst'] + (int)$item['pst']/100;
        return $tot + $carry;
});


