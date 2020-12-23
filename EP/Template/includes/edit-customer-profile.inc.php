<?php
if(isset($_POST["submit"])){

    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    $customerID = $_POST["customerID"];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputEditProfile($name, $email, $username, $pwd, $pwdRepeat) !== false){
        header("location: ../../editCustomer.php?error=emptyinput");
        exit();
    }

    if(invalidUid($username) !== false){
        header("location: ../../editCustomer.php?error=invaliduid");
        exit();
    }

    if((!isset($_POST["pwdrepeat"]) && isset($_POST["pwd"])) || (isset($_POST["pwdrepeat"]) && !isset($_POST["pwd"])) || pwdMatch($pwd, $pwdRepeat) !== false){
        header("location: ../../editCustomer.php?error=passwordsdontmatch");
        exit();
    }

    updateCus($conn, $name, $email, $username, $pwd, $customerID);

}

if(isset($_POST["deac"])){

    $customerID = $_POST["customerID"];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    deactivateCustomer($conn, $customerID);

}

if(isset($_POST["act"])){

    $customerID = $_POST["customerID"];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    activateCustomer($conn, $customerID);

}

else{
    header("location: ../../editCustomersList.php");
    exit();
}
