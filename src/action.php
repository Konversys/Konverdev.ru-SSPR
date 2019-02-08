<?php
require_once 'connect.php';
require_once 'functions.php';

$product_link = 'Location: http://konverdev.ru/product';

if ($_GET['action'] == 'save'){
    UpdateProduct($link, $_GET['id'], $_GET['title'], $_GET['tag'],$_GET['img_path'], $_GET['price'], $_GET['unit']);
    header($product_link);
}

if ($_GET['action'] == 'addItem'){
    InsertProduct($link, $_GET['title'], $_GET['tag'], $_GET['img_path'], $_GET['price'], $_GET['unit']);
    header($product_link);
}

if (stristr($_GET['action'], "edit") !== FALSE){
    $id = substr($_GET['action'], 4);
    $line = sprintf('Location: http://konverdev.ru/product=%d', $id);
    header($line);
}

if (stristr($_GET['action'], "remove") !== FALSE){
    $id = substr($_GET['action'], 6);
    DeleteProduct($link, $id);
    header($product_link);
}
?>