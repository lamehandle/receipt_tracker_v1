<?php
namespace app\controllers;
use PDO;

require "../../vendor/autoload.php";

$db = new Database();
//$conn = $db->connect();
$query = "SELECT * FROM `line_items`";
$stmt = $db->query($query);

$items = $stmt->fetchAll(PDO::FETCH_ASSOC);




