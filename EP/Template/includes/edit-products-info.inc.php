<?php
if(isset($_POST["submit"])){

    $name = $_POST["name"];
    $brand=$_POST["brand"];
    $price=$_POST["price"];
    $msrp=$_POST["msrp"];
    $description=$_POST["description"];
    $itemid=$_POST["itemid"];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    updateProduct($conn, $name, $brand, $price, $msrp, $description,$itemid);

}

if(isset($_POST["delete"])){

    $item_id = $_POST["itemid"];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    deleteProduct($conn, $item_id);

}

else{
    header("location: ../../editProductList.php");
    exit();
}
