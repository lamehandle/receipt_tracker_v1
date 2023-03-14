<?php

//
//create validation functions for all the form inputs
//

$vendor = '';
$name = '';
$price = filter_var($_POST['price'],FILTER_VALIDATE_FLOAT)
$gst = filter_var($_POST['gst'],FILTER_VALIDATE_FLOAT);
$pst = filter_var($_POST['pst'],FILTER_VALIDATE_FLOAT);
$date = '';
