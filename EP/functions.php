<?php
require ('database/DBController.php');
require ('database/Product.php');
require ('database/Cart.php');
require ('database/User.php');
$db = new DBController();
$product = new Product($db);
$product_shuffle = $product->getData();
$customer=new User($db);
$customer_shuffle=$customer->getCustomers();
$Cart = new Cart($db);
$seller = new User($db);
$seller_shuffle = $seller->getSellers();