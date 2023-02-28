<?php
//configure PDO for database calls
$con = require 'config.php';

$db = new PDO( $con['dsn'], $con['username'], $con['password'], $con['options']  );


if ( $_SERVER['REQUEST_METHOD'] === 'GET' ) {

    $id = $_GET['id'];

    $sql = "DELETE FROM line_items WHERE id= $id";

    $db = new PDO($con['dsn'], $con['username'], $con['password'], $con['options']  );
    $db->query($sql);

require 'index.php';
}
