<?php
namespace app\controllers;
use PDO;

require "../../vendor/autoload.php";

if($_SERVER['REQUEST_METHOD'] === 'GET'){
$id = $_GET['id'];
$db = new Database();
$query = "DELETE FROM `line_items` WHERE `id` = $id";
$stmt = $db->query($query);
require './index.php';

}