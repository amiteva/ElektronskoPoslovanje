<?php

if(isset($_POST["submit"])){

    $brand = $_POST["brand"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $msrp = $_POST["msrp"];
    $description = $_POST["description"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputAddProduct($brand, $name, $price, $msrp, $description) !== false){
        header("location: ../../sellerAddProduct.php?error=emptyinput");
        exit();
    }

    addProduct($conn, $brand, $name, $price, $msrp, $description);

}
else{
    header("location: ../../sellerAddProduct.php");
    exit();
}
