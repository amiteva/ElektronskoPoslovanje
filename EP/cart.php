<?php
ob_start();
include('header.php');
?>

<?php
count($product->getData('cart')) ? include('Template/_cart-template.php'): include('Template/notFound/_cartNotFound.php');

count($product->getData('wishlist')) ? include('Template/_wishlist_template.php'): include('Template/notFound/_wishlistNotFound.php');

include('Template/_best-selling.php');
?>

<?php
include('footer.php');
?>