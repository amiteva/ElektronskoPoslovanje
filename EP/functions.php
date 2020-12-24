<?php
require ('database/DBController.php');
require ('database/Product.php');
require ('database/Cart.php');
require ('database/User.php');
require ('database/Order.php');
$db = new DBController();
$product = new Product($db);
$product_shuffle_all = $product->getData();
$product_shuffle = $product->getActiveProducts();
$customer=new User($db);
$customer_shuffle=$customer->getCustomers();
$Cart = new Cart($db);
$seller = new User($db);
$seller_shuffle = $seller->getSellers();
$order = new Order($db);
$order_shuffle = $order->getData();