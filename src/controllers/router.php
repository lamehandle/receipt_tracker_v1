<?php
namespace app\controllers;

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
      '/' => "../public/index.php",
      '/upload' =>"../Data_Upload.php",
      '/delete' =>"../Delete_Record.php",
      '/retrieve' =>"",
      '/update' =>"",
      '/404' => "../404.php",
];

if ( array_key_exists( $uri, $routes ) ){
    require $routes[$uri];
}else {
    http_response_code(404);
    require $routes['/404'];
}


