<?php
require_once __DIR__ . "/../vendor/autoload.php";

$app = new Silex\Application();
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../routes',));

$app->get("/product", function () use($app, $link) {
    $products = GetProducts($link);
    $tags = GetTags($link);
    return $app['twig']->render("product.html", array('products' => $products, 'tags' => $tags));
});

$app->get("/product={id}", function ($id) use($app, $link) {
    $product = GetProduct($link, $id)[0];
    $tags = GetTags($link);
    return $app['twig']->render("product_edit.html", array('product' => $product, 'tags' => $tags));
});

$app->get("/wagon", function () use($app, $link) {
    return $app['twig']->render("wagon.php", array());
});

return $app;
?>