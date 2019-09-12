<?php

use \Hcode\PageAdmin;
use \Hcode\Model\User;
use \Hcode\Model\Product;

$app->get("/admin/products", function(){

    user::verifyLogin();

    $products = Product::listAll();

    $page = new PageAdmin();

    $page->setTpl("products", [
        "products"=>$products
    ]);
});

$app->get("/admin/products/create", function(){

    user::verifyLogin();

    $page = new PageAdmin();

    $page->setTpl("products-create");

});

$app->post("/admin/products/create", function(){

    user::verifyLogin();

   $product = new Product();

   $product->setData($_POST);

   $product->save();

   header("Location: /admin/products");
   exit;

    
});


?>