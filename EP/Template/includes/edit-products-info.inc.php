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

if(isset($_POST["deactivate"])){

    $item_id = $_POST["itemid"];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    deactivateProduct($conn, $item_id);

}

if(isset($_POST["activate"])){

    $item_id = $_POST["itemid"];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    activateProduct($conn, $item_id);

}

else{
    header("location: ../../editProductList.php");
    exit();
}
