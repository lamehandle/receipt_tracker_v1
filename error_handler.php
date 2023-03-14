<?php

$errors = [];

$message = [
    'not a number' => 'input needs to be a number',
    'not a string' => 'input needs to be a text',
    'file not found' => 'the requested file is not available',
    'Vendor name in incorrect format' => 'vendor name must be a string',
    'Item name in incorrect format' => 'Item name must be a string',
    'Category name in incorrect format' => 'Category name must be a string',
    'Price in incorrect format' => 'Price must be a number',
    'GST in incorrect format' => 'GST must be a number',
    'PST name in incorrect format' => 'PST must be a number',
    'Total name in incorrect format' => 'Total must be a number',
    'date needs to be a acceptable format' => '',

];

function add_to_errors(string $error):void {
     $errors[] = $error;
}

function compare_error(string $error, array $message): string{
    if (array_key_exists($error, $message){
        return $message[$error];
    }else{
        return 'The error was unexpected';
    }
}