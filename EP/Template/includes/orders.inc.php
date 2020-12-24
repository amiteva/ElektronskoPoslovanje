<?php
if(isset($_POST["submit"])){

    $userId = $_POST["userID"];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    bFromCart($conn,$userId);
    removeFromCart($conn, $userId);


}
else{
    header("location: ../../index.php?fail");
    exit();
}