<?php
include 'Database.php';
if ( $_SERVER['REQUEST_METHOD'] === 'GET' ) {

    $id = $_GET['id'];
    $query = "DELETE FROM line_items WHERE id= $id";

    $db = new Database();
    $db->query($query);

require 'index.php';
}
