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

$db = new PDO( $dsn, $username, $password, $options  );

$items = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

$values = array_map(function($item) {

          return [  'id' => $item['id'],
                    'vendor'   =>  $item['vendor'],
                    'item'     =>  $item['item'],
                    'category' =>  $item['category'],
                    'price'    =>  number_format((int)$item['price'] / 100.00, '2', '.'),
                    'gst'      =>  number_format((int)$item['gst'] / 100.00, '2', '.'),
                    'pst'      =>  number_format((int)$item['pst'] / 100.00, '2', '.'),
                    'total'    =>  number_format(((int)$item['price'] / 100.00) + ($item['pst'] / 100.00) + ((int)$item['gst'] / 100), '2', '.'),
                    'date'     =>  date('Y-m_d', strtotime($item['date'])),
          ];

    },$items);

$item_totals = array_reduce($items, function($carry, $rec ){
       $price   = (int)$rec['price'] / 100.00;
       $pst     = (int)$rec['pst']   / 100.00;
       $gst     = (int)$rec['gst']   / 100.00;

    $rec_total = $price + $pst + $gst;
    return $carry + $rec_total;
},0.0);








