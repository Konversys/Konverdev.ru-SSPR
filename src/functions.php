<?php

function QueryExecute(mysqli $connection, string $query)
{
    $result = mysqli_query($connection, $query);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $data;
}

function GetTotalWP(mysqli $connection, int $wagon, int $product)
{
    $query = sprintf("select gettotalwp(%d, %d) as total;", $wagon, $product);
    return QueryExecute($connection, $query);
}

function GetSelledWP(mysqli $connection, int $wagon, int $product)
{
    $query = sprintf("select getselledwp(%d, %d) as selled;", $wagon, $product);
    return QueryExecute($connection, $query);
}

function GetTotalW(mysqli $connection, int $wagon)
{
    $query = sprintf("select gettotalw(%d) as total;", $wagon);
    return QueryExecute($connection, $query);
}

function GetSelledW(mysqli $connection, int $wagon)
{
    $query = sprintf("select getselledw(%d) as selled;", $wagon);
    return QueryExecute($connection, $query);
}

function GetProducts(mysqli $connection)
{
    $query = sprintf("select product.id, product.title, tag.title as tag, product.price, product.unit, product.img_path 
    from product, tag
    where product.tag = tag.id");
    return QueryExecute($connection, $query);
}

function InsertProduct(mysqli $connection, string $title, int $tag, string $img_path, float $price, string $unit)
{
    $query = sprintf("INSERT INTO product (title, price, tag, img_path, unit)
    VALUES('%s', %f, %d, '%s', '%s')",
     $title, $price, $tag, $img_path, $unit);
    return QueryExecute($connection, $query);
}

function UpdateProduct(mysqli $connection, int $id, string $title, int $tag, string $img_path, float $price, string $unit)
{
    $query = sprintf("UPDATE product SET
     title = '%s', tag = %d, img_path = '%s', price = %f, unit = '%s' where id = %d",
     $title, $tag, $img_path, $price, $unit, $id);
    return QueryExecute($connection, $query);
}

function GetProduct(mysqli $connection, int $id)
{
    $query = sprintf("select * from product where id = %d", $id);
    return QueryExecute($connection, $query);
}

function GetTags(mysqli $connection)
{
    $query = sprintf("select * from tag");
    return QueryExecute($connection, $query);
}


function DeleteProduct(mysqli $connection, int $id)
{
    $query = sprintf("delete from product where id = %d", $id);
    return QueryExecute($connection, $query);
}
?>

